<?php

require 'vendor/autoload.php';
require 'posts.php';

define('TEMPLATES_DIR', '/var/www/templates');

$app = new \Slim\Slim(array('templates.path' => TEMPLATES_DIR));

$app->get('/', function () use($app) {
  return $app->render('home.php', array('posts' => get_posts()));
});

$app->get('/tag/:tag', function ($tag) use($app) {
  if (!($posts = get_posts_by_tag($tag)))
    return $app->render('404.php', array(), 404);

  return $app->render('home.php', array('posts' => $posts));
});

$app->get('/:slug', function($slug) use($app) {
  if (!($post = get_post($slug)))
    return $app->render('404.php', array(), 404);

  return $app->render('post.php', array('post' => $post));
});

$app->run();
