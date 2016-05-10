<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

 <!-- JS dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- bootbox code -->
    <script src="js/bootbox.min.js"></script>
<body>

<script type="text/javascript">
var app = angular.module("myShoppingList", []); 
app.controller("myCtrl", function($scope, $window, $timeout) {
    $scope.products = ["Milk", "Bread", "Cheese"];
    $scope.addItem = function () {
        $scope.errortext = "";
        if (!$scope.addMe) {return;}
        if ($scope.products.indexOf($scope.addMe) == -1) {
            $scope.products.push($scope.addMe);
        } else {
            $scope.errortext = "The item is already in your shopping list.";
        }
    }
    $scope.removeItem = function (x) {
       bootbox.confirm("Are you sure?", function(result) {

          if(result)
          {
            $scope.errortext = "";    
            $timeout($scope.products.splice(2, 1));
          }
        }); 
    }
});
</script>

 


<div ng-app="myShoppingList" ng-cloak ng-controller="myCtrl" class="w3-card-2 w3-margin" style="max-width:400px;">
  <header class="w3-container w3-light-grey w3-padding-hor-16">
    <h3>My Shopping List</h3>
  </header>
  <ul class="w3-ul">
    <li ng-repeat="x in products" class="w3-padding-hor-16">{{x}}<span ng-click="removeItem($index)" confirm="Are you sure to delete?" style="cursor:pointer;" class="w3-right w3-margin-right">×</span></li>
  </ul>
  <div class="w3-container w3-light-grey w3-padding-hor-16">
    <div class="w3-row w3-margin-top">
      <div class="w3-col s10">
        <input placeholder="Add shopping items here" ng-model="addMe" class="w3-input w3-border w3-padding">
      </div>
      <div class="w3-col s2">
        <button ng-click="addItem()" class="w3-btn w3-padding w3-green">Add</button>
      </div>
    </div>
    <p class="w3-padding-left w3-text-red">{{errortext}}</p>
  </div>
</div>

</body>
</html>
