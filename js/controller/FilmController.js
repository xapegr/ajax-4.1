//JQuery code


//Angular code
(function (){
	//Application module
	angular.module('videoclubApp').controller("FilmController", ['$http','$scope', '$window', '$cookies','accessService','$filter', function ($http, $scope, $window, $cookies, accessService, $filter){
		//scope variables
		$scope.shomForm=0;
		$scope.filmTypesArray = new Array();
		$scope.directorsArray = new Array();
		$scope.filmsArray = new Array();
		$scope.filteredData = [];
		$scope.filmsAllArray=[];

		//Pagination variables
		$scope.pageSize = 4;
		$scope.currentPage = 1;


		this.loadInitData = function (){
			//TODO
			//copy
			//Server conenction to get films and actors data, returns outPutData, 0 errors
			//1 filmsTypes 2 Directors
			var promise = accessService.getData("php/controllers/MainController.php",
      true, "POST", {controllerType: 1, action: 10000, jsonData: true});

			promise.then(function (outputData) {

				if(angular.isArray(outputData[1])) {
          //FilmType data
					for(var i=0;i<outputData[1].length;i++){
						var film = new FilmType();
						film.construct(outputData[1][i].id,outputData[1][i].name);
						$scope.filmTypesArray.push(film);
					}
				}
				else
				{
					alert("There has been an error in the server, try later");
				}
				if(angular.isArray(outputData[2]))
				{

					for(var i=0;i<outputData[2].length;i++){
						var op = outputData[2][i];
						var direc = new Director();
						direc.construct(op.id,op.name,op.surname1,op.surname2);
						$scope.directorsArray.push(direc);
					}
				}
				else
				{
					alert("There has been an error in the server, try later");
				}
			});
			//this.loadFilms();
		}



		this.addFilm = function () {
			var film = new Film();
			film.construct(0,$scope.filmTypesArray[0].getId(),$scope.directorsArray[0].getId(),"",0,"",false,false, []);
			$scope.filmsArray.push(film);
			console.log($scope.filmsArray);
		}

		this.removeFilm = function (indexFilm)
		{
			if($scope.filmsArray.length ==1) {alert("At least one film must be inserted")}
			else {$scope.filmsArray.splice(indexFilm,1);}
		}

		this.entryFilm = function () {

			$scope.filmsArray = angular.copy($scope.filmsArray);

			//First uploading cloths images
			var imagesArrayToSend = new FormData();

			for (var i = 0; i < $scope.filmsArray.length; i++) {
				var imageFile = $("#filmImageEntry"+i)[0].files[0];
				imagesArrayToSend.append('images[]', imageFile);
			}

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

		this.modFilms = function () {


		}



		this.loadFilms = function () {
			//TODO load films from DB
			//to select all films in DB
			var promise = accessService.getData("php/controllers/MainController.php",
			true, "POST", {controllerType: 1, action: 10020, jsonData: ""});

			promise.then(function (outputData) {

				if(angular.isArray(outputData[1])) {
          //FilmType data
					for(var i=0;i<outputData[1].length;i++){
						var film = new Film();
						var op = outputData[1][i];
						film.construct(op.id,op.idFilmType,op.idDirector,op.name,op.price,op.image,op.inSale,op.rented,op.reviews);
						$scope.filmsAllArray.push(film);
					}
					$scope.filteredData = $scope.filmsAllArray;
				}
			});
		}
	}]);

	/*$scope.$watch("filmTypeSearch+directorSearch+nameSearch",function (){
		$scope.filteredData = $filter('filter')
		($scope.eventsArray,
			{//tag to filter
				filmType: $scope.filmTypeSearch,
				director: $scope.directorSearch,
				name: $scope.nameSearch
			});
	});*/


	angular.module('videoclubApp').directive("filmsEntryForm", function (){
		return {
			restrict: 'E',
			templateUrl:"view/templates/films-entry-form.html",
			controller:function(){

			},
			controllerAs: 'filmsEntryForm'
		};
	});

	angular.module('videoclubApp').directive("filmsModForm", function (){
		return {
			restrict: 'E',
			templateUrl:"view/templates/films-mod-form.html",
			controller:function(){

			},
			controllerAs: 'filmsModForm'
		};
	});
})();
