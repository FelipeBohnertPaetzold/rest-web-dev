angular.module('ExemploApp')
        .controller('CursoListController', function ($scope, $http, $location) {
            $scope.cursos = [];

            $scope.init = function () {
                $scope.requestList();
            };

            $scope.remove = function (id) {
                if (confirm("Confirma a exclusão do Registro?"))
                    $scope.requestRemove(id);
            };

            $scope.edit = function (id) {
                $location.path("/Curso/edit/" + (id));
            };

            $scope.requestList = function () {
                $http.get("../slim/emprestimos/curso/").success(function (data) {
                    $scope.cursos = data;
                }).error(function (data, status) {
                    alert("Erro ao listar cursos: " + data + ' - ' + status);
                });
            };

            $scope.requestRemove = function (id) {
                $http.delete("../slim/emprestimos/curso/" + id).success(function (data) {
                    $scope.requestList();
                }).error(function (data, status) {
                    alert("Erro ao excluir: " + data + ' - ' + status);
                });
            };
        })

        .controller('CursoFormController', function ($scope, $http, $location, $routeParams) {

            $scope.curso = {};

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
                if ($scope.curso.id) {
                    $http.put("../slim/emprestimos/curso/" + $scope.curso.id, $scope.curso).success(function (data) {
                        $location.path("/Curso/list");
                    }).error(function (data, status) {
                        alert("Erro ao alterar curso: " + data + ' - ' + status);
                    });
                } else {
                    $http.post("../slim/emprestimos/curso/", $scope.curso).success(function (data) {
                        $location.path("/Curso/list");
                    }).error(function (data, status) {
                        alert("Erro ao criar curso: " + data + ' - ' + status);
                    });
                }
            };

            $scope.requestEdit = function () {
                $http.get("../slim/emprestimos/curso/" + $routeParams.id).success(function (data) {
                    $scope.curso = data;
                }).error(function (data, status) {
                    alert("Erro ao editar curso: " + data + ' - ' + status);
                });
            };
        });

