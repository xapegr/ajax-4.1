/**
* The controller for Employment app
*
**/


(function (){
	angular.module('company').controller("AppController", ['$http','$scope', '$window', '$cookies','accessService', 'userConnected',function ($http, $scope, $window, $cookies, accessService, userConnected){

		//scope variables
		/*if(userConnected.user != undefined)
		{
			$scope.user = userConnected.user;
		}
		else {
			$scope.user = new User();
		}*/
		$scope.appOption=0;
		//scope with all positions available in company
		$scope.positions = ["CEO","The guy who hold the door","Batman","Humorist","Coach","Boss"];
		$scope.passwordValid = true;
		$scope.nickValid = true;

		$scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
		$scope.format = $scope.formats[0];
		$scope.dateOptions = {
			dateDisabled: "",
			formatYear: 'yyyy',
			maxDate: new Date(),
			minDate: "",
			startingDay: 1
		};

		$scope.startDate = {
			opened: false
		};

		$scope.openStartDate = function() {
			$scope.startDate.opened = true;
		};

		$scope.app = new Application();

		//adding the new request
		//TODO change all to add an app
		this.entryApp = function () {

			$scope.app = angular.copy($scope.app);

			//First uploading cloths images
			var imagesArrayToSend = new FormData();

			/*for (var i = 0; i < $scope.app.length; i++) {
				var imageFile = $("#filmImageEntry"+i)[0].files[0];
				imagesArrayToSend.append('images[]', imageFile);
			}*/

			//imagesArrayToSend['images[]']

			$http({
				method: 'POST',
				url: 'php/controllers/MainController.php?controllerType=2&action=10000&jsonData=""',
				headers: {'Content-Type': undefined},
				data: imagesArrayToSend,
				transformRequest: function (data, headersGetterFunction) {
					return data;
				}
			}).success(function (outPutData) {
				if (outPutData[0] === true) {
					//Files uploaded, next step insert films in database
					for (var i = 0; i < $scope.filmsArray.length; i++) {
						$scope.filmsArray[i].setImage(outPutData[1][i]);
					}
					$scope.filmsArray = angular.copy($scope.filmsArray);
					//to insert in DB
					var promise = accessService.getData("php/controllers/MainController.php",
		      true, "POST", {controllerType: 1, action: 10010, jsonData: JSON.stringify($scope.filmsArray)});

				} else
				{
					if (angular.isArray(outPutData[1]))
					{
						console.log(outPutData[1]);
					} else {
						alert("There has been an error in the server, try later");
					}
				}
			});
		}
	}]);

	//TODO change names to employment-application
	angular.module('company').directive("employmentApplication", function (){
		return {
			restrict: 'E',
			templateUrl:"view/templates/employment-application.html",
			controller:function(){

			},
			controllerAs: 'employmentApplication'
		};
	});

})();
