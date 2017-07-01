<?php 
namespace app\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Response;

class NewsController extends ActiveController
{
    public $modelClass = 'app\models\News';

    /*public function actions()
	{
	    $actions = parent::actions();

	    // 禁用"delete" 和 "create" 操作
	    unset($actions['delete']);

	    return $actions;
	}*/

	public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

	public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_HTML;
	    return $behaviors;
	}

    /*public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['authenticator'] = [
	        'class' => HttpBasicAuth::className(),
	    ];
	    return $behaviors;
	}*/

    public function actionView($id)
	{
	    return User::findOne($id);
	}
}