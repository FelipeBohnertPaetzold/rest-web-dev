
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
                    //==================================================================
                    //Curso
                    .when('/Curso/list', {
                        templateUrl: 'View/CursoList.html',
                        controller: 'CursoListController'
                    })
                    .when('/Curso/create', {
                        templateUrl: 'View/CursoForm.html',
                        controller: 'CursoFormController'
                    })
                    .when('/Curso/edit/:id', {
                        templateUrl: 'View/CursoForm.html',
                        controller: 'CursoFormController'
                    })
                    //==================================================================
                    //Aluno
                    .when('/Aluno/list', {
                        templateUrl: 'View/AlunoList.html',
                        controller: 'AlunoListController'
                    })
                    .when('/Aluno/create', {
                        templateUrl: 'View/AlunoForm.html',
                        controller: 'AlunoFormController'
                    })
                    .when('/Aluno/edit/:id', {
                        templateUrl: 'View/AlunoForm.html',
                        controller: 'AlunoFormController'
                    })
                    //==================================================================
                    //Livro
                    .when('/Livro/list', {
                        templateUrl: 'View/LivroList.html',
                        controller: 'LivroListController'
                    })
                    .when('/Livro/create', {
                        templateUrl: 'View/LivroForm.html',
                        controller: 'LivroFormController'
                    })
                    .when('/Livro/edit/:id', {
                        templateUrl: 'View/LivroForm.html',
                        controller: 'LivroFormController'
                    })
                    //==================================================================
                    //Emprestimo
                    .when('/Emprestimo/list', {
                        templateUrl: 'View/EmprestimoList.html',
                        controller: 'EmprestimoListController'
                    })
                    .when('/Emprestimo/create', {
                        templateUrl: 'View/EmprestimoForm.html',
                        controller: 'EmprestimoFormController'
                    })
                    .when('/Emprestimo/edit/:id', {
                        templateUrl: 'View/EmprestimoForm.html',
                        controller: 'EmprestimoFormController'
                    })
                    




            // configure html5 to get links working on jsfiddle
            $locationProvider.html5Mode(false);
        });