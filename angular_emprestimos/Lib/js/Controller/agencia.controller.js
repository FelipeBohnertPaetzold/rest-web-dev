angular.module('ExemploApp')
        .controller('AgenciaListController', function ($scope, $http, $location) {
            $scope.agencias = [];

            $scope.init = function () {
                $scope.requestList();
            };

            $scope.remove = function (id) {
                if (confirm("Confirma a exclusão do Registro?"))
                    $scope.requestRemove(id);
            };

            $scope.edit = function (id) {
                $location.path("/Agencia/edit/" + (id));
            };

            $scope.requestList = function () {
                $http.get("../slim/aplicacao/agencia/").success(function (data) {
                    $scope.agencias = data;
                }).error(function (data, status) {
                    alert("Erro ao listar banco: " + data + ' - ' + status);
                });
            };

            $scope.requestRemove = function (id) {
                $http.delete("../slim/aplicacao/agencia/" + id).success(function (data) {
                    $scope.requestList();
                }).error(function (data, status) {
                    alert("Erro ao excluir: " + data + ' - ' + status);
                });
            };
        })

        .controller('AgenciaFormController', function ($scope, $http, $location, $routeParams) {

            $scope.agencia = {};
            $scope.bancos = [];

            $scope.init = function () {
                $scope.requestBancoList();
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

            $scope.requestBancoList = function () {
                $http.get("../slim/aplicacao/banco/").success(function (data) {
                    $scope.bancos = data;
                }).error(function (data, status) {
                    alert("Erro ao listar banco: " + data + ' - ' + status);
                });
            };

            $scope.requestSave = function () {
                if ($scope.agencia.id) {
                    $http.put("../slim/aplicacao/agencia/" + $scope.agencia.id, $scope.agencia).success(function (data) {
                        $location.path("/Agencia/list");
                    }).error(function (data, status) {
                        alert("Erro ao alterar agencia: " + data + ' - ' + status);
                    });
                } else {
                    $http.post("../slim/aplicacao/agencia/", $scope.agencia).success(function (data) {
                        $location.path("/Agencia/list");
                    }).error(function (data, status) {
                        alert("Erro ao criar agencia: " + data + ' - ' + status);
                    });
                }
            };

            $scope.requestEdit = function () {
                $http.get("../slim/aplicacao/agencia/" + $routeParams.id).success(function (data) {
                    $scope.agencia = data;
                }).error(function (data, status) {
                    alert("Erro ao editar banco: " + data + ' - ' + status);
                });
            };
        });

