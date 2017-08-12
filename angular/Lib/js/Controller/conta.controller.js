angular.module('ExemploApp')
        .controller('ContaListController', function ($scope, $http, $location) {
            $scope.contas = [];

            $scope.init = function () {
                $scope.requestList();
            };

            $scope.remove = function (id) {
                if (confirm("Confirma a exclusão do Registro?"))
                    $scope.requestRemove(id);
            };

            $scope.edit = function (id) {
                $location.path("/Conta/edit/" + (id));
            };

            $scope.requestList = function () {
                $http.get("../slim/aplicacao/conta/").success(function (data) {
                    $scope.contas = data;
                }).error(function (data, status) {
                    alert("Erro ao listar contas: " + data + ' - ' + status);
                });
            };

            $scope.requestRemove = function (id) {
                $http.delete("../slim/aplicacao/conta/" + id).success(function (data) {
                    $scope.requestList();
                }).error(function (data, status) {
                    alert("Erro ao excluir: " + data + ' - ' + status);
                });
            };
        })

        .controller('ContaFormController', function ($scope, $http, $location, $routeParams) {

            $scope.conta = {};
            $scope.agencias = [];
            $scope.clientes = [];

            $scope.init = function () {
                $scope.requestClienteList();
                $scope.requestAgenciaList();

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

            $scope.requestClienteList = function () {
                $http.get("../slim/aplicacao/cliente/").success(function (data) {
                    $scope.clientes = data;
                }).error(function (data, status) {
                    alert("Erro ao listar cliente: " + data + ' - ' + status);
                });
            };

            $scope.requestAgenciaList = function () {
                $http.get("../slim/aplicacao/agencia/").success(function (data) {
                    $scope.agencias = data;
                }).error(function (data, status) {
                    alert("Erro ao listar banco: " + data + ' - ' + status);
                });
            };

            $scope.requestSave = function () {
                if ($scope.conta.id) {
                    $http.put("../slim/aplicacao/conta/" + $scope.conta.id, $scope.conta).success(function (data) {
                        $location.path("/Conta/list");
                    }).error(function (data, status) {
                        alert("Erro ao alterar conta: " + data + ' - ' + status);
                    });
                } else {
                    $http.post("../slim/aplicacao/conta/", $scope.conta).success(function (data) {
                        $location.path("/Conta/list");
                    }).error(function (data, status) {
                        alert("Erro ao criar conta: " + data + ' - ' + status);
                    });
                }
            };

            $scope.requestEdit = function () {
                $http.get("../slim/aplicacao/conta/" + $routeParams.id).success(function (data) {
                    $scope.conta = data;
                }).error(function (data, status) {
                    alert("Erro ao editar conta: " + data + ' - ' + status);
                });
            };
        });

