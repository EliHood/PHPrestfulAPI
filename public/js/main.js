var app = angular.module('eli',[]);

app.controller('myCtrl', function($scope, $http, $location){
 	
$scope.deleteTask = function(id){

   //  $http.get('/todo/' + id).then(function(data, status, headers, config){
   //  	    $http.delete('/todo/' + id);
   //          $scope.activePath = $location.path('/');
   //      });
  	// }
	  $http({
	      method: 'DELETE',
	      url: '/todo/' + id
	   }).then(function (response){
	   	console.log("it works");
	   },function (rejection){
	   	 console.log("Task didn't delete");
	   });
}

 

});

$(document).ready(function(){

	$('#disappear').click(function(){
		$('#gone').fadeOut(1000);

	});



});
