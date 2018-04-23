<!DOCTYPE html>
<html>
<head>
	<title>Junjie Chat</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<style>
        #messages{height:300px;}
    </style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-sm-12">
                <h1 class="text-center">
                    JunjieChat 
                    <button id="clear" class="btn btn-danger">Clear</button>
                </h1>
                <div id="status"></div>
                <div id="chat">
                    <input type="text" id="username" class="form-control" placeholder="Enter name...">
                    <br>
                    <div class="card">
                        <div id="messages" class="card-block">

                        </div>
                    </div>
                    <br>
                    <textarea id="textarea" class="form-control" placeholder="Enter message..."></textarea>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>

    <script>
        (function(){
            var element = function(id){
                return document.getElementById(id);
            }

            // Get Elements
            var status = element('status');
            var messages = element('messages');
            var textarea = element('textarea');
            var username = element('username');
            var clearBtn = element('clear');

            // Set default status
            var statusDefault = status.textContent;

            var setStatus = function(s){
                // Set status
                status.textContent = s;

                if(s !== statusDefault){
                    var delay = setTimeout(function(){
                        setStatus(statusDefault);
                    }, 4000);
                }
            }

            // Connect to socket.io
            var socket = io.connect('http://127.0.0.1:4000');

            // Check for connection
            if(socket !== undefined){
                console.log('Connected to socket...');

                // Handle Output
                socket.on('output', function(data){
                    //console.log(data);
                    if(data.length){
                        for(var x = 0;x < data.length;x++){
                            // Build out message div
                            var message = document.createElement('div');
                            message.setAttribute('class', 'chat-message');
                            message.textContent = data[x].name+": "+data[x].message;
                            messages.appendChild(message);
                            messages.insertBefore(message, messages.firstChild);
                        }
                    }
                });

                // Get Status From Server
                socket.on('status', function(data){
                    // get message status
                    setStatus((typeof data === 'object')? data.message : data);

                    // If status is clear, clear text
                    if(data.clear){
                        textarea.value = '';
                    }
                });

                // Handle Input
                textarea.addEventListener('keydown', function(event){
                    if(event.which === 13 && event.shiftKey == false){
                        // Emit to server input
                        socket.emit('input', {
                            name:username.value,
                            message:textarea.value
                        });

                        event.preventDefault();
                    }
                })

                // Handle Chat Clear
                clearBtn.addEventListener('click', function(){
                    socket.emit('clear');
                });

                // Clear Message
                socket.on('cleared', function(){
                    messages.textContent = '';
                });
            }

        })();
    </script>
</body>
</html>


