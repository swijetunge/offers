$postModule = angular.module('postModule', []);
var base_path = document.getElementById('base_path').value;
$postModule.controller('PostController',function($scope, $http){
	$scope.post = {};
	$scope.post.users = [];
	$scope.tempUser = {};
	$scope.editMode = false;
	$scope.index = '';
	
	var url = base_path+'ajax.php';
	
	$scope.saveUser = function(){
	    $http({
	      method: 'post',
	      url: url,
	      data: $.param({'user' : $scope.tempUser, 'type' : 'save_user' }),
	      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	    }).
	    success(function(data, status, headers, config) {
	    	if(data.success){
	    		if( $scope.editMode ){
	    			$scope.post.users[$scope.index].id = data.id;
	    			$scope.post.users[$scope.index].name = $scope.tempUser.name;
	    			$scope.post.users[$scope.index].email = $scope.tempUser.email;
	    			$scope.post.users[$scope.index].companyName = $scope.tempUser.companyName;
	    			$scope.post.users[$scope.index].designation = $scope.tempUser.designation;
	    		}else{
	    			$scope.post.users.push({
		    			id : data.id,
		    			name : $scope.tempUser.name,
		    			email : $scope.tempUser.email,
		    			companyName : $scope.tempUser.companyName,
		    			designation : $scope.tempUser.designation
		    		});
	    		}
	    		$scope.messageSuccess(data.message);
	    		$scope.userForm.$setPristine();
	    		$scope.tempUser = {};
	    		
	    	}else{
	    		$scope.messageFailure(data.message);
	    	}
	    }).
	    error(function(data, status, headers, config) {
	        //$scope.codeStatus = response || "Request failed";
	    });
	    
	    $('.btn-save').button('reset');
	}
	
	$scope.addUser = function(){
		$('.btn-save').button('loading');
		$scope.saveUser();
		$scope.editMode = false;
		$scope.index = '';
	}
	
	$scope.updateUser = function(){
		$('.btn-save').button('loading');
		$scope.saveUser();
	}
	
	$scope.newUser = function(){
		$scope.editMode = false;
		$scope.tempUser = '';
		$scope.index 	= '';
	}
	
	$scope.editUser = function(user){
		$scope.tempUser = {
			id: user.id,
			name : user.name,
			email : user.email,
			companyName : user.companyName,
			designation : user.designation
		};
		$scope.editMode = true;
		$scope.index = $scope.post.users.indexOf(user);
	}
	
	$scope.deleteUser = function(user){
		var r = confirm("Are you sure want to delete this user!");
		if (r == true) {
			$http({
		      method: 'post',
		      url: url,
		      data: $.param({ 'id' : user.id, 'type' : 'delete_user' }),
		      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		    }).
		    success(function(data, status, headers, config) {
		    	if(data.success){
		    		var index = $scope.post.users.indexOf(user);
		    		$scope.post.users.splice(index, 1);
		    	}else{
		    		$scope.messageFailure(data.message);
		    	}
		    }).
		    error(function(data, status, headers, config) {
		    	//$scope.messageFailure(data.message);
		    });
		}
	}
	
	$scope.init = function(){
	    $http({
	      method: 'post',
	      url: url,
	      data: $.param({ 'type' : 'getUsers' }),
	      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	    }).
	    success(function(data, status, headers, config) {
	    	if(data.success && !angular.isUndefined(data.data) ){
	    		$scope.post.users = data.data;
	    	}else{
	    		$scope.messageFailure(data.message);
	    	}
	    }).
	    error(function(data, status, headers, config) {
	    		//$scope.messageFailure(data.message);
	    });
	}
	
	$scope.messageFailure = function (msg){
		$('.alert-failure-div > p').html(msg);
		$('.alert-failure-div').show();
		$('.alert-failure-div').delay(5000).slideUp(function(){
			$('.alert-failure-div > p').html('');
		});
	}
	
	$scope.messageSuccess = function (msg){
		$('.alert-success-div > p').html(msg);
		$('.alert-success-div').show();
		$('.alert-success-div').delay(5000).slideUp(function(){
			$('.alert-success-div > p').html('');
		});
	}
	
	$scope.getError = function(error, name){
		if(angular.isDefined(error)){
			if(error.required && name == 'name'){
				return "Please enter name";
			}else if(error.email && name == 'email'){
				return "Please enter valid email";
			}else if(error.required && name == 'company_name'){
				return "Please enter company name";
			}else if(error.required && name == 'designation'){
				return "Please enter designation";
			}else if(error.required && name == 'email'){
				return "Please enter email";
			}else if(error.minlength && name == 'name'){
				return "Name must be 3 characters long";
			}else if(error.minlength && name == 'company_name'){
				return "Company name must be 3 characters long";
			}else if(error.minlength && name == 'designation'){
				return "Designation must be 3 characters long";
			}
		}
	}
	
});