<?php
namespace app\modules\main\controllers;
use yii\web\Controller;

use app\modules\main\models\Post;
use yii\data\Pagination;
use yii\web\HttpException;
class DefaultController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex()
    {
        $query = Post::find()->select('id, title, content')->orderBy('id desc');
        $pages = new Pagination(['totalCount' =>$query->count(), 'pageSize' =>1, 'pageSizeParam' => false, 'forcePageParam' => false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        if (empty($posts)) throw new HttpException(404, 'Такой страницы не существует');
        return $this->render('index',['posts' => $posts, 'pages' => $pages]);
    }

    public function actionView() {
        $id = \Yii::$app->request->get('id');
        $post = Post::findOne($id);
        if (empty($post)) throw new HttpException(404, 'Такой страницы не существует');
        return $this->render('view', compact('post'));
    }
    public function actionAbout()
    {
        return $this->render('about');
    }
}