<!DOCTYPE html>
<html ng-app="waterRatesApp">
    <head>
    <meta charset="utf-8">
    <title>TELEPHONE|CELLPHONE NUMBER</title>
    </head>
     <body ng-controller="WaterRateCtrl">
      <center><h2>Search:&emsp;<input ng-model="query" type="text"/></h2></center><br>
        <script src="lib/jquery-1.10.2.min.js"></script>
        <script src="lib/angular.min.js"></script>          
         <script>
        var WaterRateApp = angular.module('waterRatesApp', []);
        WaterRateApp.controller('WaterRateCtrl', function ($scope, $http) {
            $http.get('waterRates.json').success(function (data) {
                $scope.waterRates = data;
            });                          
        });
        </script>
            <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <table class="table table-striped" style="width:100%">  
            <tr>
                <th>NAME</a></th>
                <th>CONTACT NO.</th>
               <!--  <th>AMOUNT IN DOMESTIC</a></th>
                <th>RATE PER TEN CUBIC IN COMMERCIAL</th>
                <th>AMOUNT IN COMMERCIAL</a></th>  -->             
            </tr>
            <tr ng-repeat="WaterRate in waterRates | filter:query" align="center">
                 <td>{{WaterRate.cubicMeter}}</td>
                 <td>{{WaterRate.rateDom }}</td>
               <!--   <td>{{WaterRate.amtDom | number }}</td>
                 <td>{{WaterRate.rateCom | number }}</td>
                 <td>{{WaterRate.amtCom | number }}</td>     -->            
        </tr>
        </table>
    </body>
</html>


