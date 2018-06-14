<?php
/**
 * Routing and controllers.
 *
 * @copyright (c) 2016 Tomasz Chojna
 * @link      http://epi.chojna.info.pl
 */

use Controller\BookmarksController;
use Controller\HelloController;
use Controller\ViewController;
use Controller\TagsController;
use Controller\AuthController;

$app->mount('/bookmarks', new BookmarksController());
$app->mount('/bookmarks/{id}', new ViewController());
$app->mount('/hello', new HelloController());
$app->mount('/tags', new TagsController());
$app->mount('/auth', new AuthController());