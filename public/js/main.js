var app = angular.module('eli',['usernameScope.directive']);

app.config(['$interpolateProvider', function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
  }]);


app.controller('myCtrl', function($scope, $http, $location){


$scope.deleteTask = function(id){

	$http.delete('/todo/' + id).then(function(data){
		    //This function is not being executed since you are getting a 405 response 
		}, function(data){
		    $( '#task' + id ).fadeOut(100, function(){
		        $(this).remove();
		    });
		});

 }



$scope.addTask = function(taskdata){


	$http.post('/todo', taskdata).then(function(response){
		taskdata.task = '';
		console.log("it works");
	}, function(rejection){
		console.log("it didn't work");
	});


}




 
});







