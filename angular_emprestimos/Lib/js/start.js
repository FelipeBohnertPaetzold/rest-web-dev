
var AppName = angular.module('ExemploApp', ['ngRoute']);

AppName.factory('AuthInterceptor', function ($window, $q, $location) {
    return {
        request: function (config) {
            config.headers = config.headers || {};
            if ($window.sessionStorage.getItem("token")) {
                config.headers.token = $window.sessionStorage.getItem("token");
            }
            return config || $q.when(config);
        },
        response: function (response) {
            return response || $q.when(response);
        },
        responseError: function (rejection) {
            if (rejection.status === 401) {
                $location.path("/Entrar");
            }
            return $q.reject(rejection);
        }
    };
});

AppName.config(function ($httpProvider) {
    $httpProvider.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded; charset=UTF-8";
    $httpProvider.defaults.withCredentials = true;
    $httpProvider.interceptors.push('AuthInterceptor');
});