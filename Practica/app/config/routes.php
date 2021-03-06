<?php
$app->get('/', 'SilexApp\Controller\HomeController::home');
$app->get('/home', 'SilexApp\Controller\HomeController::home');
$app->get('/signin', 'SilexApp\Controller\HomeController::signIn');
$app->get('/hello/{name}', 'SilexApp\Controller\HelloController::indexAction');

// USER
$app->get('/users/get/{id}', 'SilexApp\Controller\UserController::getAction');
$app->match('/register', 'SilexApp\Controller\UserController::postAction');

//SESSION
$before = function(Request $request, Application $app){
    if (!$app['session']->has('name')){
        $response = new Response();
        $content = $app['twig']->render('error.twig', [
            'message' => 'You must be logged'
        ]);
        $response->setContent($content);
        $response->setStatusCode(Response::HTTP_FORBIDDEN);
        return $response;
    }
};
//$app->get('/', 'SilexApp\Controller\BaseController::indexAction');
$app->get('/admin','SilexApp\Controller\BaseController::adminAction');
