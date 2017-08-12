angular.module('ExemploApp')
        .controller('AutorListController', function ($scope, $http, $location) {
            $scope.autores = [];

            $scope.init = function () {
                $scope.requestList();
            };

            $scope.remove = function (id) {
                if (confirm("Confirma a exclusão do Registro?"))
                    $scope.requestRemove(id);
            };

            $scope.edit = function (id) {
                $location.path("/Autor/edit/" + (id));
            };

            $scope.requestList = function () {
                $http.get("../slim/emprestimos/autor/").success(function (data) {
                    $scope.autores = data;
                }).error(function (data, status) {
                    alert("Erro ao listar autores: " + data + ' - ' + status);
                });
            };

            $scope.requestRemove = function (id) {
                $http.delete("../slim/emprestimos/autor/" + id).success(function (data) {
                    $scope.requestList();
                }).error(function (data, status) {
                    alert("Erro ao excluir: " + data + ' - ' + status);
                });
            };
        })

        .controller('AutorFormController', function ($scope, $http, $location, $routeParams) {

            $scope.autor = {};

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
                if ($scope.autor.id) {
                    $http.put("../slim/emprestimos/autor/" + $scope.autor.id, $scope.autor).success(function (data) {
                        $location.path("/Autor/list");
                    }).error(function (data, status) {
                        alert("Erro ao alterar autor: " + data + ' - ' + status);
                    });
                } else {
                    $http.post("../slim/emprestimos/autor/", $scope.autor).success(function (data) {
                        $location.path("/Autor/list");
                    }).error(function (data, status) {
                        alert("Erro ao criar autor: " + data + ' - ' + status);
                    });
                }
            };

            $scope.requestEdit = function () {
                $http.get("../slim/emprestimos/autor/" + $routeParams.id).success(function (data) {
                    $scope.autor = data;
                }).error(function (data, status) {
                    alert("Erro ao editar autor: " + data + ' - ' + status);
                });
            };
        });

