<!DOCTYPE html>
<html ng-app="priceListApp">
    <head>
    <meta charset="utf-8">
    <title>CherryStore Price List</title>   
      <center><h2>Search:&emsp;<input ng-model="query" type="text"/></h2></center><br>
        <script src="lib/jquery-1.10.2.min.js"></script>
        <script src="lib/angular.min.js"></script>          
         <script>
        var priceListApp = angular.module('priceListApp', []);
        priceListApp.controller('priceListCtrl', ['$scope', '$http', function(scope, http) {
            http.get('priceLists.json').success(function (data) {
                scope.priceLists = data;
            });                      
        }]);
        </script>        
   </head>   
<link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>   <body ng-controller="priceListCtrl">
   <style>
        table, th, td {
            border: 1px solid black;
        }
   </style>   
         <table class="table table-striped" style="width:100%">  
                  <tr>
                    <th>item_brand</th>  
                     <th>item</th>    
                     <th>item_description</th>                    
                     <th>quantity</th>    
                     <th>unit</th>   
                     <th>unit_price</th>    
                     <th>wholesale_price</th>  
                     <th>item_remaining</th>  
                     <th>item_image</th>                     
                  </tr>
                  <tr ng-repeat="priceList in priceLists | filter:query">
                     <th>{{ priceList.item_brand }}</th> 
                     <th>{{ priceList.item }}</th>    
                     <th>{{ priceList.item_description }}</th>                   
                     <th>{{ priceList.quantity }}</th>    
                     <th>{{ priceList.unit }}</th> 
                     <th>{{ priceList.unit_price }}</th> 
                     <th>{{ priceList.wholesale_price }}</th> 
                     <th>{{ priceList.item_remaining }}</th> 
                     <th><img src="{{ priceList.item_image }}" 
                     			alt="{{ priceList.item }}"
                     			style="height:45px; width:50px"/></th> 
                  </tr>
            </table>         
    </body>
</html>


