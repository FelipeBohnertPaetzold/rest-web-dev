angular.module('ExemploApp')
        .controller('ClienteListController', function ($scope, $http, $location) {
            $scope.clientes = [];

            $scope.init = function () {
                $scope.requestList();
            };

            $scope.remove = function (id) {
                if (confirm("Confirma a exclusão do Registro?"))
                    $scope.requestRemove(id);
            };

            $scope.edit = function (id) {
                $location.path("/Cliente/edit/" + (id));
            };

            $scope.requestList = function () {
                $http.get("../slim/aplicacao/cliente/").success(function (data) {
                    $scope.clientes = data;
                }).error(function (data, status) {
                    alert("Erro ao listar cliente: " + data + ' - ' + status);
                });
            };

            $scope.requestRemove = function (id) {
                $http.delete("../slim/aplicacao/cliente/" + id).success(function (data) {
                    $scope.requestList();
                }).error(function (data, status) {
                    alert("Erro ao excluir: " + data + ' - ' + status);
                });
            };
        })

        .controller('ClienteFormController', function ($scope, $http, $location, $routeParams) {

            $scope.cliente = {};

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
                if ($scope.cliente.id) {
                    $http.put("../slim/aplicacao/cliente/" + $scope.cliente.id, $scope.cliente).success(function (data) {
                        $location.path("/Cliente/list");
                    }).error(function (data, status) {
                        alert("Erro ao alterar cliente: " + data + ' - ' + status);
                    });
                } else {
                    $http.post("../slim/aplicacao/cliente/", $scope.cliente).success(function (data) {
                        $location.path("/Cliente/list");
                    }).error(function (data, status) {
                        alert("Erro ao criar cliente: " + data + ' - ' + status);
                    });
                }
            };

            $scope.requestEdit = function () {
                $http.get("../slim/aplicacao/cliente/" + $routeParams.id).success(function (data) {
                    $scope.cliente = data;
                }).error(function (data, status) {
                    alert("Erro ao editar cliente: " + data + ' - ' + status);
                });
            };
        });

