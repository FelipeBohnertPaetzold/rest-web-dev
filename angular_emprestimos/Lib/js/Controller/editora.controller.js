angular.module('ExemploApp')
        .controller('EditoraListController', function ($scope, $http, $location) {
            $scope.editoras = [];

            $scope.init = function () {
                $scope.requestList();
            };

            $scope.remove = function (id) {
                if (confirm("Confirma a exclusão do Registro?"))
                    $scope.requestRemove(id);
            };

            $scope.edit = function (id) {
                $location.path("/Editora/edit/" + (id));
            };

            $scope.requestList = function () {
                $http.get("../slim/emprestimos/editora/").success(function (data) {
                    $scope.editoras = data;
                }).error(function (data, status) {
                    alert("Erro ao listar editoras: " + data + ' - ' + status);
                });
            };

            $scope.requestRemove = function (id) {
                $http.delete("../slim/emprestimos/editora/" + id).success(function (data) {
                    $scope.requestList();
                }).error(function (data, status) {
                    alert("Erro ao excluir: " + data + ' - ' + status);
                });
            };
        })

        .controller('EditoraFormController', function ($scope, $http, $location, $routeParams) {

            $scope.editora = {};

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
                if ($scope.editora.id) {
                    $http.put("../slim/emprestimos/editora/" + $scope.editora.id, $scope.editora).success(function (data) {
                        $location.path("/Editora/list");
                    }).error(function (data, status) {
                        alert("Erro ao alterar editora: " + data + ' - ' + status);
                    });
                } else {
                    $http.post("../slim/emprestimos/editora/", $scope.editora).success(function (data) {
                        $location.path("/Editora/list");
                    }).error(function (data, status) {
                        alert("Erro ao criar editora: " + data + ' - ' + status);
                    });
                }
            };

            $scope.requestEdit = function () {
                $http.get("../slim/emprestimos/editora/" + $routeParams.id).success(function (data) {
                    $scope.editora = data;
                }).error(function (data, status) {
                    alert("Erro ao editar editora: " + data + ' - ' + status);
                });
            };
        });

