<?php

//die($_SERVER['REMOTE_ADDR']);

//include "soulnbeauty.php";

// On charge le framework Silex
require_once 'vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;

// On définit des noms utiles
use Silex\Application;

// On crée l'application et on la configure en mode debug
$app = new Application();
$app['debug'] = true;

 /*
 *inclusion de module
 */

////------------------------session---------------------------------------
$app->register(new Silex\Provider\SessionServiceProvider());
if(isset($_GET['lang']))
{
    $app['session']->set('lang',$_GET['lang']);
    
}

if(! $app['session']->get('lang'))
{
   $app['session']->set('lang','fr');
}

////----------------twig-----------------------------------------------------
$app->register(new Silex\Provider\TwigServiceProvider(), 
	       array('twig.path' => '.',));
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale_fallbacks' => array( $app['session']->get('lang')),
));
////----------------translation-----------------------------------------------------
use Symfony\Component\Translation\Loader\YamlFileLoader;

$app['translator'] = $app->share($app->extend('translator', function($translator, $app) {
    $translator->addLoader('yaml', new YamlFileLoader());

    $translator->addResource('yaml', __DIR__.'/locales/en.yml', 'en');
    $translator->addResource('yaml', __DIR__.'/locales/nl.yml', 'nl');
    $translator->addResource('yaml', __DIR__.'/locales/fr.yml', 'fr');

    return $translator;
}));
////----------------------------variable global------------------
$page=array();
$page['titre']='';
$page['sous_titre']='';
$page['description']='';
$page['key']='';
//$page["soulnbeauty"] = $soulnbeauty;


/*
 *fin inclusion module
 */
 
 
 
 /*--------------------------------------------------------------------------------------------------------------------------------------*/
 //                                                                                                                                      //
 //                                               DEBUT DES ROUTES                                                                       //
 //                                                                                                                                      //
 /*--------------------------------------------------------------------------------------------------------------------------------------*/
// On définit une route pour l'url /
$app->get('/', function(Application $app , Request $req) {
    global $page;
    $page['titre']='SOUL & BEAUTY';
    $page['description']='ACCUEIL';
    $page['key']='';
    if($req->query->get('scroll'))
       {
	$page['scroll']=$req->query->get('scroll');
       }
    
  //return print_r($page);
    return $app['twig']->render('web/pages/index.html',array('page'=>$page));
});
 
 /*
  *Books
  *
  */
 $app->get('/books', function(Application $app) {
    global $page;
    $page['titre']='BOOK | SOUL & BEAUTY';
	$page['sous_titre']='Book';
    $page['description']='';
    $page['key']='';
    
    return $app['twig']->render('web/pages/photos.html',array('page'=>$page));
});
 /*
  *videos
  *
  */
 $app->get('/videos', function(Application $app) {
    global $page;
    $page['titre']='VIDEOS | SOUL & BEAUTY';
	$page['sous_titre']='Videos';
    $page['description']='';
    $page['key']='';
    
    return $app['twig']->render('web/pages/videos.html',array('page'=>$page));
});

/*
  *blog
  *
  */
 $app->get('/blog', function(Application $app, Request $req) {
    global $page;
	$page["article"] = "accueil";
	
    $page['titre']='BLOG | Soul & Beauty';
	$page['sous_titre']='Blog';
    $page['description']='';
    $page['key']='';
    
    return $app['twig']->render('web/pages/blog.html',array('page'=>$page));
});

/*
  *Agenda
  *
  */
 $app->get('/event', function(Application $app, Request $req) {
    global $page;
	$page["article"] = "accueil";
	
    $page['titre']='EVENT | Soul & Beauty';
	$page['sous_titre']='Agenda';
    $page['description']='';
    $page['key']='';
    
    return $app['twig']->render('web/pages/agenda.html',array('page'=>$page));
});
 
/*
  *Agency
  *
  */
 $app->get('/agency', function(Application $app, Request $req) {
    global $page;
	$page["article"] = "accueil";
	
    $page['titre']='AGENCY | Soul & Beauty';
	$page['sous_titre']='Agency';
    $page['description']='';
    $page['key']='';
    
    return $app['twig']->render('web/pages/agency.html',array('page'=>$page));
});
 
 
 /*
  *Detail album
  *
  */
 $app->get('/{album}', function(Application $app, Request $req, $album) {
    global $page;
	$page["article"] = "{album}";
        $page['titre']=$album;
	$page['sous_titre']='Album';
        $page['description']='';
        $page['key']='';
    
    return $app['twig']->render('web/pages/album.html',array('page'=>$page));
});
 
// On lance l'application
$app->run();

?>
