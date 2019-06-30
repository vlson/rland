<?php
/**
 * Created by PhpStorm.
 * User: vlson
 * Date: 2019/5/5
 * Time: 15:20
 */

namespace frontend\controllers;


use common\models\Article;

class BlogController extends PublicController
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return parent::behaviors(); // TODO: Change the autogenerated stub
    }

    public function actionIndex(){
        $blog_list = Article::find()
            ->select(['id', 'title', 'abstract', 'cover', 'label', 'created_at'])
            ->where(['status'=>1])
            ->orderBy(["created_at"=>SORT_DESC])
            ->asArray()
            ->all();

        return $this->render('index', [
            "blog_list"  =>  $blog_list,
        ]);
    }

    public function actionArticle(){
        return $this->render('article');
    }
}