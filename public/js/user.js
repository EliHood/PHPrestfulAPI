angular.module('usernameScope.directive', [])
.directive('userScope', function (){

	return{
		restrict: 'E',
		scope:{
			username: '='
		},

		controller: function($scope){
			console.log($scope.username);
		}
	
	}



});