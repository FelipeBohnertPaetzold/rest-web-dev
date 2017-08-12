angular.module('ExemploApp')
        .controller('LivroListController', function ($scope, $http, $location) {
            $scope.livros = [];

            $scope.init = function () {
                $scope.requestList();
            };

            $scope.remove = function (id) {
                if (confirm("Confirma a exclusão do Registro?"))
                    $scope.requestRemove(id);
            };

            $scope.edit = function (id) {
                $location.path("/Livro/edit/" + (id));
            };

            $scope.requestList = function () {
                $http.get("../slim/emprestimos/livro/").success(function (data) {
                    $scope.livros = data;
                }).error(function (data, status) {
                    alert("Erro ao listar livros: " + data + ' - ' + status);
                });
            };

            $scope.requestRemove = function (id) {
                $http.delete("../slim/emprestimos/livro/" + id).success(function (data) {
                    $scope.requestList();
                }).error(function (data, status) {
                    alert("Erro ao excluir: " + data + ' - ' + status);
                });
            };
        })

        .controller('LivroFormController', function ($scope, $http, $location, $routeParams) {

            $scope.livro = {};
            $scope.autores = [];
            $scope.editoras = [];

            $scope.init = function () {
                $scope.requestAutorList();
                $scope.requestEditoraList();
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

            $scope.requestAutorList = function () {
                $http.get("../slim/emprestimos/autor/").success(function (data) {
                    $scope.autores = data;
                }).error(function (data, status) {
                    alert("Erro ao listar autores: " + data + ' - ' + status);
                });
            };

            $scope.requestEditoraList = function () {
                $http.get("../slim/emprestimos/editora/").success(function (data) {
                    $scope.editoras = data;
                }).error(function (data, status) {
                    alert("Erro ao listar autores: " + data + ' - ' + status);
                });
            };
            
            $scope.requestSave = function () {
                if ($scope.livro.id) {
                    $http.put("../slim/emprestimos/livro/" + $scope.livro.id, $scope.livro).success(function (data) {
                        $location.path("/Livro/list");
                    }).error(function (data, status) {
                        alert("Erro ao alterar livro: " + data + ' - ' + status);
                    });
                } else {
                    $http.post("../slim/emprestimos/livro/", $scope.livro).success(function (data) {
                        $location.path("/Livro/list");
                    }).error(function (data, status) {
                        alert("Erro ao criar editora: " + data + ' - ' + status);
                    });
                }
            };

            $scope.requestEdit = function () {
                $http.get("../slim/emprestimos/livro/" + $routeParams.id).success(function (data) {
                    $scope.livro = data;
                }).error(function (data, status) {
                    alert("Erro ao editar editora: " + data + ' - ' + status);
                });
            };
        });

