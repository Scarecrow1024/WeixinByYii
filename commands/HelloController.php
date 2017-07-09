<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }
    public function actionPing1(){
        while(true){
            $ch = curl_init();
            $url = 'http://ifreehand.hequanxi.com/index.php?s=/addon/Studentscore/Studentscore/vpnloginjwc.html';
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
            curl_setopt($ch,CURLOPT_USERAGENT , "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0");
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_exec($ch);
            curl_close($ch);
            sleep(1);
            echo 'ping1';
        }
    }

    public function actionPing2(){
        while(true){
            $ch = curl_init();
            $url = 'http://wx.donghy.cn/app/index.php?i=4&c=entry&do=verify&m=cj_cx';
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
            curl_setopt($ch,CURLOPT_USERAGENT , "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0");
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_exec($ch);
            curl_close($ch);
            sleep(1);
            echo 'ping2';
        }
    }

    public function actionPing3(){
        while(true){
            $ch = curl_init();
            $url = 'http://m.souhpu.com/souhpu/index.php?s=/addon/BxqScore/BxqScore/verify.html';
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
            curl_setopt($ch,CURLOPT_USERAGENT , "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0");
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_exec($ch);
            curl_close($ch);
            sleep(1);
            echo 'ping3';
        }
    }
    	
}
