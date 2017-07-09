<?php 
namespace app\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    //https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET
    public function actionGetToken(){
        curl_setopt($ch,CURLOPT_URL,"https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch,CURLOPT_USERAGENT , "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36 MicroMessenger/6.5.2.501 NetType/WIFI WindowsWechat QBCore/3.43.556.400 QQBrowser/9.0.2524.400");
        curl_setopt($ch,CURLOPT_COOKIE,"$websvr_cookie;$enable_rand;$twfid");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $content=curl_exec($ch);
    }
}