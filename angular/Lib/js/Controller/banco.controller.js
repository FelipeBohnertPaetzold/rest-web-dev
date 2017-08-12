angular.module('ExemploApp')
        .controller('BancoListController', function ($scope, $http, $location) {
            $scope.bancos = [];

            $scope.init = function () {
                $scope.requestList();
            };

            $scope.remove = function (id) {
                if (confirm("Confirma a exclusão do Registro?"))
                    $scope.requestRemove(id);
            };

            $scope.edit = function (id) {
                $location.path("/Banco/edit/" + (id));
            };

            $scope.requestList = function () {
                $http.get("../slim/aplicacao/banco/").success(function (data) {
                    $scope.bancos = data;
                }).error(function (data, status) {
                    alert("Erro ao listar banco: " + data + ' - ' + status);
                });
            };

            $scope.requestRemove = function (id) {
                $http.delete("../slim/aplicacao/banco/" + id).success(function (data) {
                    $scope.requestList();
                }).error(function (data, status) {
                    alert("Erro ao excluir: " + data + ' - ' + status);
                });
            };
        })

        .controller('BancoFormController', function ($scope, $http, $location, $routeParams) {

            $scope.banco = {};

            $scope.init = function () {
                if ($routeParams.id)
                    $scope.requestEdit();
            };

            $scope.formValidate = function () {
                return $scope.form.$valid;
            };

            $scope.save = function () {
                $scope.submitted = true;
                if ($scope.formValidate())
                    $scope.requestSave();
            };

            $scope.requestSave = function () {
                if ($scope.banco.id) {
                    $http.put("../slim/aplicacao/banco/" + $scope.banco.id, $scope.banco).success(function (data) {
                        $location.path("/Banco/list");
                    }).error(function (data, status) {
                        alert("Erro ao alterar banco: " + data + ' - ' + status);
                    });
                } else {
                    $http.post("../slim/aplicacao/banco/", $scope.banco).success(function (data) {
                        $location.path("/Banco/list");
                    }).error(function (data, status) {
                        alert("Erro ao criar banco: " + data + ' - ' + status);
                    });
                }
            };

            $scope.requestEdit = function () {
                $http.get("../slim/aplicacao/banco/" + $routeParams.id).success(function (data) {
                    $scope.banco = data;
                }).error(function (data, status) {
                    alert("Erro ao editar banco: " + data + ' - ' + status);
                });
            };
        });

