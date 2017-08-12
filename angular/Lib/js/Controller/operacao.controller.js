angular.module('ExemploApp')

        .controller('OperacaoFormController', function ($scope, $http, $location, $routeParams) {

            $scope.operacao = {tipo: $routeParams.operacao, conta: {id: $routeParams.id}};
            $scope.contas = [];

            $scope.init = function () {
                $scope.requestContaList();
            };

            $scope.formValidate = function () {
                return $scope.form.$valid;
            };

            $scope.save = function () {
                $scope.submitted = true;
                if ($scope.formValidate())
                    $scope.requestSave();
            };

            $scope.requestContaList = function () {
                $http.get("../slim/aplicacao/conta/").success(function (data) {
                    $scope.contas = data;
                }).error(function (data, status) {
                    alert("Erro ao listar contas: " + data + ' - ' + status);
                });
            };

            $scope.requestSave = function () {
                $http.post("../slim/aplicacao/operacao/", $scope.operacao).success(function (data) {
                    $location.path("/Conta/list");
                }).error(function (data, status) {
                    alert("Erro ao salvar operacao: " + data + " - " + status);
                })

            };
        });

