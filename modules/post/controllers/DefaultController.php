<?php

namespace app\modules\post\controllers;

use yii\web\Controller;

use app\modules\post\models\Post;
use yii\data\Pagination;
use yii\web\HttpException;

/**
 * Default controller for the `post` module
 */
class DefaultController extends Controller
{
    
    public function actionIndex()
    {
        $query = Post::getQuery();
        $pages = Post::getPages($query);
        $posts = Post::getPosts($query, $pages);
        if (empty($posts)) throw new HttpException(404, 'Такой страницы не существует');
        return $this->render('index',['posts' => $posts, 'pages' => $pages]);
    }

    public function actionView() {
        $post = Post::getPost();
        if (empty($post)) throw new HttpException(404, 'Такой страницы не существует');
        return $this->render('view', compact('post'));
    }
    public function actionAbout()
    {
        return $this->render('about');
    }
}
