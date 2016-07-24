<?php

namespace app\modules\post\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $author
 * @property integer $created_at
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'author', 'created_at'], 'required'],
            [['created_at'], 'integer'],
            [['title', 'content', 'author'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'author' => 'Author',
            'created_at' => 'Created At',
        ];
    }
    
    public static function getQuery(){
        return self::find()->select('id, title, content')->orderBy('id desc');
    }

    public static function getPages($query){
        return new Pagination(['totalCount' =>$query->count(), 'pageSize' =>1, 'pageSizeParam' => false, 'forcePageParam' => false]);
    }

    public static function getPosts($query, $pages){
        return $query->offset($pages->offset)->limit($pages->limit)->all();
    }
    
    public static function getPost(){
        $id = \Yii::$app->request->get('id');
        return self::findOne($id);
    }
}
