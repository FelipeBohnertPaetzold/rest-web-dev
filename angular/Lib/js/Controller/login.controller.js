angular.module('ExemploApp')
        .controller('LoginController', function ($scope, $http, $location, $rootScope, $window) {

            $scope.init = function () {
            };

            $scope.login = function () {
                $scope.submitted = true;

                if (!$scope.formValidate())
                    return;

                $scope.requestLogin();
            };

            $scope.formValidate = function () {
                return $scope.form.$valid;
            };

            $scope.requestLogin = function () {
                $http.post("../slim/aplicacao/login/", $scope.usuario).success(function (data) {
                    $window.sessionStorage.setItem("token", data);
                    $location.path("/");
                }).error(function (data, status) {
                    alert("Erro ao realizar login: " + data + " - " + status)
                })

            };

        });

