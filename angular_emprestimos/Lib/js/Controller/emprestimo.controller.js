angular.module('ExemploApp')
        .controller('EmprestimoListController', function ($scope, $http, $location) {
            $scope.emprestimos = [];

            $scope.init = function () {
                $scope.requestList();
            };

            $scope.remove = function (id) {
                if (confirm("Confirma a exclusão do Registro?"))
                    $scope.requestRemove(id);
            };

            $scope.edit = function (id) {
                $location.path("/Emprestimo/edit/" + (id));
            };

            $scope.requestList = function () {
                $http.get("../slim/emprestimos/emprestimo/").success(function (data) {
                    $scope.emprestimos = data;
                }).error(function (data, status) {
                    alert("Erro ao listar emprestimos: " + data + ' - ' + status);
                });
            };

            $scope.requestRemove = function (id) {
                $http.delete("../slim/emprestimos/emprestimo/" + id).success(function (data) {
                    $scope.requestList();
                }).error(function (data, status) {
                    alert("Erro ao emprestimos: " + data + ' - ' + status);
                });
            };
        })

        .controller('EmprestimoFormController', function ($scope, $http, $location, $routeParams) {

            $scope.emprestiomo = {};
            $scope.livros = [];
            $scope.alunos = [];

            $scope.init = function () {
                $scope.requestLivroList();
                $scope.requestAlunoList();
                if ($routeParams.id)
                    $scope.requestEdit();
            };

            $scope.formValidate = function () {
                return $scope.form.$valid;
            };

            $scope.save = function () {
                $scope.submitted = true;
                $scope.requestSave();
            };

            $scope.requestLivroList = function () {
                $http.get("../slim/emprestimos/livro/").success(function (data) {
                    $scope.livros = data;
                }).error(function (data, status) {
                    alert("Erro ao listar livros: " + data + ' - ' + status);
                });
            };

            $scope.requestAlunoList = function () {
                $http.get("../slim/emprestimos/aluno/").success(function (data) {
                    $scope.alunos = data;
                }).error(function (data, status) {
                    alert("Erro ao listar alunos: " + data + ' - ' + status);
                });
            };
            
            $scope.requestSave = function () {
                if ($scope.emprestimo.id) {
                    $http.put("../slim/emprestimos/emprestimo/" + $scope.emprestimo.id, $scope.emprestimo).success(function (data) {
                        $location.path("/Emprestimo/list");
                    }).error(function (data, status) {
                        alert("Erro ao alterar emprestimo: " + data + ' - ' + status);
                    });
                } else {
                    $http.post("../slim/emprestimos/emprestimo/", $scope.emprestimo).success(function (data) {
                        $location.path("/Emprestimo/list");
                    }).error(function (data, status) {
                        alert("Erro ao criar emprestimo: " + data + ' - ' + status);
                    });
                }
            };

            $scope.requestEdit = function () {
                $http.get("../slim/emprestimos/emprestimo/" + $routeParams.id).success(function (data) {
                    $scope.emprestimo = data;
                }).error(function (data, status) {
                    alert("Erro ao editar emprestimo: " + data + ' - ' + status);
                });
            };
        });

