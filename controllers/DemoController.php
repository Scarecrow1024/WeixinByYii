<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class DemoController extends Controller
{
	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
    	return $this->render('index');
    }

    public function actionDemo(){
        $ch = curl_init();
        $post='url=http://wx.niool.com/img/11.jpg&service=OcrKingForCaptcha&language=eng&charset=11&apiKey=7a035b90a8142c343eq9CThVaZK2nbB9kYb1LrOeCxqtH0wl7upz8Hk8pii90sXv6e1kd6qHQ9&type=http://wx.niool.com/img/11.jpg';
        curl_setopt($ch,CURLOPT_URL,"http://lab.ocrking.com/ok.html");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch,CURLOPT_USERAGENT , "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0");
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
        $content=curl_exec($ch);
        //echo $content;
        curl_close ($ch);
        $ch=curl_init();

        /*$var = array (
                //非验证码类网络图片直接用图片url提交识别
                //如 http://t.51chuli.com/contact/d827323fa035a7729w060771msa9211z.gif
                'url' =>  'http://wx.niool.com/img/11.jpg',
                'language' => 'eng', 
                'service' => 'OcrKingForCaptcha', 
                'charset' => 7,
                // 服务器返回内容为utf-8  当需要在gbk页面输出时 为true 否则请设置false
                //或者把接口文件另存为utf-8
                'gbk'     => false,
        );

        //实例化OcrKing识别
        $ocrking = new OcrKing('7a035b90a8142c343eq9CThVaZK2nbB9kYb1LrOeCxqtH0wl7upz8Hk8pii90sXv6e1kd6qHQ9');

        //提交识别
        $ocrking->doOcrKing($var);
        //检查识别状态
        if (!$ocrking->getStatus()) {
            die ($ocrking->getError());
        }

        //获取识别结果
        $result = $ocrking->getResult();
        var_dump($result);*/
    }
}