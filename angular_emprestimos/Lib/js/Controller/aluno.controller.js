angular.module('ExemploApp')
        .controller('AlunoListController', function ($scope, $http, $location) {
            $scope.alunos = [];

            $scope.init = function () {
                $scope.requestList();
            };

            $scope.remove = function (id) {
                if (confirm("Confirma a exclusão do Registro?"))
                    $scope.requestRemove(id);
            };

            $scope.edit = function (id) {
                $location.path("/Aluno/edit/" + (id));
            };

            $scope.requestList = function () {
                $http.get("../slim/emprestimos/aluno/").success(function (data) {
                    $scope.alunos = data;
                }).error(function (data, status) {
                    alert("Erro ao listar alunos: " + data + ' - ' + status);
                });
            };

            $scope.requestRemove = function (id) {
                $http.delete("../slim/emprestimos/aluno/" + id).success(function (data) {
                    $scope.requestList();
                }).error(function (data, status) {
                    alert("Erro ao excluir: " + data + ' - ' + status);
                });
            };
        })

        .controller('AlunoFormController', function ($scope, $http, $location, $routeParams) {

            $scope.aluno = {};
            $scope.cursos = [];

            $scope.init = function () {
                $scope.requestCursoList();
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

            $scope.requestCursoList = function () {
                $http.get("../slim/emprestimos/curso/").success(function (data) {
                    $scope.cursos = data;
                }).error(function (data, status) {
                    alert("Erro ao listar cursos: " + data + ' - ' + status);
                });
            };

            $scope.requestSave = function () {
                if ($scope.aluno.id) {
                    $http.put("../slim/emprestimos/aluno/" + $scope.aluno.id, $scope.aluno).success(function (data) {
                        $location.path("/Aluno/list");
                    }).error(function (data, status) {
                        alert("Erro ao alterar aluno: " + data + ' - ' + status);
                    });
                } else {
                    $http.post("../slim/emprestimos/aluno/", $scope.aluno).success(function (data) {
                        $location.path("/Aluno/list");
                    }).error(function (data, status) {
                        alert("Erro ao criar aluno: " + data + ' - ' + status);
                    });
                }
            };

            $scope.requestEdit = function () {
                $http.get("../slim/emprestimos/aluno/" + $routeParams.id).success(function (data) {
                    $scope.aluno = data;
                }).error(function (data, status) {
                    alert("Erro ao editar banco: " + data + ' - ' + status);
                });
            };
        });

