
angular.module('ExemploApp')

        .config(function ($routeProvider, $locationProvider) {
            $routeProvider

                    .when('/', {
                        templateUrl: 'View/Home.html'
                    })
                    
                    //==================================================================
                    //Editora
                    .when('/Editora/list', {
                        templateUrl: 'View/EditoraList.html',
                        controller: 'EditoraListController'
                    })
                    .when('/Editora/create', {
                        templateUrl: 'View/EditoraForm.html',
                        controller: 'EditoraFormController'
                    })
                    .when('/Editora/edit/:id', {
                        templateUrl: 'View/EditoraForm.html',
                        controller: 'EditoraFormController'
                    })

                    //==================================================================
                    //Autor
                    .when('/Autor/list', {
                        templateUrl: 'View/AutorList.html',
                        controller: 'AutorListController'
                    })
                    .when('/Autor/create', {
                        templateUrl: 'View/AutorForm.html',
                        controller: 'AutorFormController'
                    })
                    .when('/Autor/edit/:id', {
                        templateUrl: 'View/AutorForm.html',
                        controller: 'AutorFormController'
                    })
                    
                    //CLIENTE
                    .when('/Cliente/list', {
                        templateUrl: 'View/ClienteList.html',
                        controller: 'ClienteListController'
                    })
                    .when('/Cliente/create', {
                        templateUrl: 'View/ClienteForm.html',
                        controller: 'ClienteFormController'
                    })
                    .when('/Cliente/edit/:id', {
                        templateUrl: 'View/ClienteForm.html',
                        controller: 'ClienteFormController'
                    })

                    //==================================================================
                    //AGÊNCIA
                    .when('/Agencia/list', {
                        templateUrl: 'View/AgenciaList.html',
                        controller: 'AgenciaListController'
                    })
                    .when('/Agencia/create', {
                        templateUrl: 'View/AgenciaForm.html',
                        controller: 'AgenciaFormController'
                    })
                    .when('/Agencia/edit/:id', {
                        templateUrl: 'View/AgenciaForm.html',
                        controller: 'AgenciaFormController'
                    })

                    //==================================================================
                    //CONTA
                    .when('/Conta/list', {
                        templateUrl: 'View/ContaList.html',
                        controller: 'ContaListController'
                    })
                    .when('/Conta/create', {
                        templateUrl: 'View/ContaForm.html',
                        controller: 'ContaFormController'
                    })
                    .when('/Conta/edit/:id', {
                        templateUrl: 'View/ContaForm.html',
                        controller: 'ContaFormController'
                    })

                    //==================================================================
                    //OPERAÇÕES
                    .when('/Operacao/:operacao/:id', {
                        templateUrl: 'View/ContaOperacaoForm.html',
                        controller: 'OperacaoFormController'
                    })




            // configure html5 to get links working on jsfiddle
            $locationProvider.html5Mode(false);
        });