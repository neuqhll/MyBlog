<?php
namespace frontend\controllers;

use common\models\PostExtendsModel;
use yii;
use common\models\CatsModel;
use frontend\models\PostForm;
use frontend\controllers\base\BaseController;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class PostController extends BaseController
{
    public function actions()
    {
        return [
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',
                'config' => [
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ],
//            'ueditor'=>[
//                'class' => 'common\widgets\ueditor\UeditorAction',
//                'config'=>[
//                    'imageUrlPrefix' => "",
//                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}",
//                ]
//            ]

        ];
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create',],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    '*'=>['get','post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $model = new PostForm();
        $model->setScenario(PostForm::CREATE);
        if($model->load(yii::$app->request->post()) && $model->validate()){
            if(!$model->create()){
                yii::$app->session->setFlash('warning',$model->_lastError);
            }else{
                return $this->redirect(['post/view','id'=>$model->id]);
            }
        }
        $cat =CatsModel::getAllCats();
        return $this->render('create',['model'=>$model,'cat'=>$cat]);
    }


    /**
     * 文章详情
     */
    public function actionView($id)
    {
        $model = new PostForm();
        $data = $model->getViewById($id);
        $model = new PostExtendsModel();
        $model->upCounter(['post_id'=>$id],'browser',1);
        return $this->render('view',['data'=>$data]);
    }

    public function actionUpdate()
    {
        $model = new PostForm();
        return $this->render('update',['model'=>$model]);
    }

}