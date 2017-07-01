<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use app\models\Customer;
use yii\data\ActiveDataProvider;
use yii\mongodb\Query;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge([
            [
                'class' => Cors::className(),
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['*'],
                ],
                'actions' => [
                    'login' => [
                        'Access-Control-Allow-Credentials' => true,
                    ]
                ]
            ],
        ], parent::behaviors());
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        
        $query = new Query();
        $query->from('col')->where(['title' => 'MongoDB']);
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);
        $models = $provider->getModels();
        var_dump($models);die;
        //视图
        //return 'index';
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        //header('Access-Control-Allow-Origin:*');
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        //return json_encode($_POST);
        $model->username = $_POST['username'];
        $model->password = $_POST['password'];
        //return json_encode($_POST);
        $res = $model->login();
        return $res;
        //return (setcookie("foo3", "bar3", time() + 3600, "/", ".yiidemo.com"));
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return json_encode($_COOKIE);
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionSetCookie(){
        header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
        //header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"'); 
        echo setcookie("demo", 123, time()+3600, "/");
    }

    public function actionGetCookie(){
        header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
        var_dump($_SESSION);
    }

    public function actionSetLogin(){
        header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
        //return json_encode($_GET);
        $redis = Yii::$app->redis;
        //$redis->set('name',$_GET['username']);
        //$redis->set('pass',$_GET['password']);
        echo $redis->get('pass');
        /*$cookies = Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
            'name' => 'name',
            'value' => $_GET['username'],
            'expire' => time() + 1800
        ]));*/
        /*$session = Yii::$app->session;
        $session->set('name',$_GET['username']);
        $session->set('pass',$_GET['pass']);*/
        return true;
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        if (!Yii::$app->user->isGuest) {
            //return $this->goHome();
            return $this->render('about');
        }else{
            echo "请登录";
        }
        //return $this->render('about');
    }
    public function actionJson()
    {
        $json='
        {
        "code": 0,
        "data": [
            {
                "id": 90,
                "per_controller": "inventory",
                "per_action": "void",
                "per_parent": 0,
                "per_name": "库存管理",
                "per_show": 1,
                "per_sort": 3,
                "flag": true,
                "per_son": [
                    {
                        "id": 100,
                        "per_controller": "partsout",
                        "per_action": "index",
                        "per_parent": 90,
                        "per_name": "维修材料出库",
                        "per_show": 1,
                        "per_sort": 3,
                        "per_son": [
                            {
                                "id": 179,
                                "per_controller": "partsout",
                                "per_action": "export",
                                "per_parent": 178,
                                "per_name": "维修材料导出",
                                "per_show": 1,
                                "per_sort": 7
                            }
                        ]
                    },
                    {
                        "id": 99,
                        "per_controller": "warehouse",
                        "per_action": "index",
                        "per_parent": 90,
                        "per_name": "仓库管理",
                        "per_show": 1,
                        "per_sort": 5,
                        "flag": true,
                        "per_son": [
                            {
                                "id": 169,
                                "per_controller": "warehouse",
                                "per_action": "add",
                                "per_parent": 99,
                                "per_name": "仓库管理新增",
                                "per_show": 1,
                                "per_sort": 7,
                                "flag": true
                            },
                            {
                                "id": 161,
                                "per_controller": "warehouse",
                                "per_action": "export",
                                "per_parent": 99,
                                "per_name": "仓库管理导出",
                                "per_show": 1,
                                "per_sort": 2,
                                "flag": true
                            },
                            {
                                "id": 162,
                                "per_controller": "warehouse",
                                "per_action": "edit",
                                "per_parent": 99,
                                "per_name": "仓库管理编辑",
                                "per_show": 1,
                                "per_sort": 4,
                                "flag": true
                            }
                        ]
                    }
                ]
            },
            {
                "id": 180,
                "per_controller": "financial",
                "per_action": "void",
                "per_parent": 0,
                "per_name": "财务管理",
                "per_show": 1,
                "per_sort": 4,
                "per_son": [
                    {
                        "id": 95,
                        "per_controller": "receivables",
                        "per_action": "index",
                        "per_parent": 180,
                        "per_name": "维修收款",
                        "per_show": 1,
                        "per_sort": 6,
                        "flag": true,
                        "per_son": [
                            {
                                "id": 119,
                                "per_controller": "receivables",
                                "per_action": "receivables",
                                "per_parent": 95,
                                "per_name": "收款操作",
                                "per_show": 1,
                                "per_sort": 2,
                                "flag": true
                            },
                            {
                                "id": 120,
                                "per_controller": "receivables",
                                "per_action": "export",
                                "per_parent": 95,
                                "per_name": "收款导出",
                                "per_show": 1,
                                "per_sort": 1,
                                "flag": true
                            }
                        ]
                    }
                ]
            },
            {
                "id": 91,
                "per_controller": "systemmanagement ",
                "per_action": "void",
                "per_parent": 0,
                "per_name": "系统管理",
                "per_show": 1,
                "per_sort": 0,
                "flag": false,
                "per_son": [
                    {
                        "id": 101,
                        "per_controller": "payment",
                        "per_action": "void",
                        "per_parent": 91,
                        "per_name": "支付配置",
                        "per_show": 1,
                        "per_sort": 9,
                        "flag": false,
                        "per_son": [
                            {
                                "id": 169,
                                "per_controller": "payment",
                                "per_action": "index",
                                "per_parent": 101,
                                "per_name": "支付类型展示",
                                "per_show": 1,
                                "per_sort": 8,
                                "flag": false
                            },
                            {
                                "id": 170,
                                "per_controller": "payment",
                                "per_action": "edit",
                                "per_parent": 101,
                                "per_name": "支付配置项编辑",
                                "per_show": 1,
                                "per_sort": 3,
                                "flag": false
                            }
                        ]
                    },
                    {
                        "id": 106,
                        "per_controller": "payment",
                        "per_action": "void",
                        "per_parent": 91,
                        "per_name": "支付配置",
                        "per_show": 1,
                        "per_sort": 5,
                        "flag": false,
                        "per_son": [
                            {
                                "id": 169,
                                "per_controller": "payment",
                                "per_action": "index",
                                "per_parent": 101,
                                "per_name": "支付类型展示",
                                "per_show": 1,
                                "per_sort": 8,
                                "flag": false
                            },
                            {
                                "id": 169,
                                "per_controller": "payment",
                                "per_action": "index",
                                "per_parent": 101,
                                "per_name": "支付类型展示",
                                "per_show": 1,
                                "per_sort": 5,
                                "flag": false
                            },
                            {
                                "id": 170,
                                "per_controller": "payment",
                                "per_action": "edit",
                                "per_parent": 101,
                                "per_name": "支付配置项编辑",
                                "per_show": 1,
                                "per_sort": 4,
                                "flag": false
                            }
                        ]
                    },
                    {
                        "id": 106,
                        "per_controller": "payment",
                        "per_action": "void",
                        "per_parent": 91,
                        "per_name": "支付配置",
                        "per_show": 1,
                        "per_sort": 2,
                        "flag": false,
                        "per_son": [
                            {
                                "id": 169,
                                "per_controller": "payment",
                                "per_action": "index",
                                "per_parent": 101,
                                "per_name": "支付类型展示",
                                "per_show": 1,
                                "per_sort": 8,
                                "flag": false
                            },
                            {
                                "id": 170,
                                "per_controller": "payment",
                                "per_action": "edit",
                                "per_parent": 101,
                                "per_name": "支付配置项编辑",
                                "per_show": 1,
                                "per_sort": 4,
                                "flag": false
                            }
                        ]
                    }
                ]
            }
        ],
        "msg": "",
        "version": "123",
        "request": "/"
    }';
        $data = json_decode($json, true);
        echo "<pre>";
        foreach($data['data'] as $k=>$v){
            $per_sort[$k]  = $v['per_sort'];
            foreach($v as $kk=>$vv){
                foreach($v['per_son'] as $kk=>$vv){
                    $per_son[$k][$kk] = $vv['per_sort'];
                    foreach($vv['per_son'] as $kkk=>$vvv){
                        //print_r($data['data'][$k]['per_son'][$kk]['per_son']);
                        $son[$k][$kk][$kkk] = $vvv['per_sort'];
                    }
                    array_multisort($son[$k][$kk], SORT_ASC, $data['data'][$k]['per_son'][$kk]['per_son']);
                }
                array_multisort($per_son[$k], SORT_ASC, $data['data'][$k]['per_son']);  
            }
        }
        array_multisort($per_sort, SORT_ASC, $data['data']);
        //print_r($son);die;
        print_r($data['data']);
        //print_r($this->my_array_multisort($data['data'], 'per_sort'));
        echo "</pre>";
    }

    function my_array_multisort($data,$sort_order_field,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC){
        foreach($data as $val){
            $key_arrays[]=$val[$sort_order_field];
        }
        array_multisort($key_arrays,SORT_ASC,SORT_NUMERIC,$data);
        return $data;
    }

}
