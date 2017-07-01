<?php

namespace app\controllers;

use yii;
use GuzzleHttp\Client;
use QL\QueryList;

class PostController extends \yii\web\Controller
{
	public function actionPing(){
		set_time_limit(0);
		while(true){
			$ch = curl_init ();
	        curl_setopt($ch,CURLOPT_URL,"http://ifreehand.hequanxi.com/index.php?s=/addon/Studentscore/Studentscore/getimg.html");
	        curl_setopt($ch, CURLOPT_HEADER, 0);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查 
	        curl_setopt($ch,CURLOPT_USERAGENT , "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0");
	        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	        $content=curl_exec($ch);
	        echo $content;
	        sleep(1);
	    }
		
	}
	
    public function actionVerify()
    {	
    	try{
    		$client = new Client(['base_uri' => 'https://vpn.hpu.edu.cn','cookies'=>true]);
			$jar = new \GuzzleHttp\Cookie\CookieJar();
			$response = $client->request('get', '/por/login_psw.csp', [
			    'headers' => [
			        'User-Agent' => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0',
			    ],
			    'cookies' => $jar,
			    'verify' => false,
			    'timeout' => 5,
			]);
			//获取到TWFID
			$twfid = [];
			foreach ($response->getHeaders() as $name => $values) {
			    $twfid[$name] = implode(', ', $values);
			}
			$twfid = explode('=',explode(';',$twfid['Set-Cookie'])[0])[1];
			$setcookie = new \GuzzleHttp\Cookie\SetCookie();
			$setcookie->setName('TWFID');
			$setcookie->setValue($twfid);
			$jar->setCookie($setcookie);
			$response = $client->request('post', '/por/login_psw.csp?sfrnd=2346912324982305', [
			    'headers' => [
			    	'REFERER' => 'https://vpn.hpu.edu.cn/por/login_psw.csp',
			        'User-Agent' => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0',
			    ],
			    'form_params' => [
			        'svpn_name' => '311309010125',
			        'svpn_password' => '190031'
			    ],
			    'cookies' => $jar,
			    'verify' => false,
			    'timeout' => 5,
			]);
			//获取到websvr_cookie
			$response = $client->request('get', 'https://vpn.hpu.edu.cn/web/1/http/0/218.196.240.97/', [
			    'headers' => [
			        'User-Agent' => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0',
			    ],
			    'cookies' => $jar,
			    'verify' => false,
			    'timeout' => 5,
			]);
			$websvr_cookie = [];
			foreach ($response->getHeaders() as $name => $values) {
			    $websvr_cookie[$name] = implode(', ', $values);
			}
			$websvr_cookie = explode('=',explode(';',$websvr_cookie['Set-Cookie'])[0])[1];
			$setcookie->setName('websvr_cookie');
			$setcookie->setValue($websvr_cookie);
			$jar->setCookie($setcookie);
			//获取到验证码
			$response = $client->request('get', 'https://vpn.hpu.edu.cn/web/1/http/1/218.196.240.97/validateCodeAction.do', [
			    'headers' => [
			    	'REFERER' => 'https://vpn.hpu.edu.cn/por/login_psw.csp',
			        'User-Agent' => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0',
			    ],
			    'cookies' => $jar,
			    'verify' => false,
			    'timeout' => 5,
			]);
			$body = $response->getBody();
			$enable = $jar->getCookieByName('ENABLE_RANDCODE')->toArray();
			$twfid = $jar->getCookieByName('TWFID')->toArray();
			$websvr_cookie = $jar->getCookieByName('websvr_cookie')->toArray();
			setcookie($twfid['Name'],$twfid['Value']);
			setcookie($enable['Name'],$enable['Value']);
			setcookie($websvr_cookie['Name'],$websvr_cookie['Value']);
			echo $body;
    	}catch(Exception $e){
    		echo $e->getMessage();
    	}
    }

    public function actionLogin(){
	    return $this->render('login');
    }

    public function actionIndex(){
    	if(Yii::$app->request->isPost){
    		//模拟登陆
            $websvr_cookie="websvr_cookie"."=".$_COOKIE['websvr_cookie'];
            $enable_rand="ENABLE_RANDCODE"."=".$_COOKIE['ENABLE_RANDCODE'];
            $twfid="TWFID"."=".$_COOKIE['TWFID'];
	        $params = array (
	            'zjh' => $_POST['s_id'],
				'mm' => $_POST['pass'],
				'v_yzm' => $_POST['code'],
	            ); 
	        $ch = curl_init ();
	        curl_setopt($ch,CURLOPT_URL,"https://vpn.hpu.edu.cn/web/1/http/1/218.196.240.97/loginAction.do");
	        curl_setopt($ch,CURLOPT_REFERER,"https://vpn.hpu.edu.cn/web/1/http/0/218.196.240.97/");
	        curl_setopt($ch, CURLOPT_HEADER, 1);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查 
	        curl_setopt($ch,CURLOPT_USERAGENT , "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0");
	        curl_setopt($ch,CURLOPT_COOKIE,"$websvr_cookie;$enable_rand;$twfid");
	        curl_setopt($ch,CURLOPT_POST,1);
	        curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
	        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	        curl_exec($ch);
	        echo $this->getScore($ch);
    	}
    }

    public function actionLogout(){
        $ch=curl_init();
        $url="https://vpn.hpu.edu.cn/por/logout.csp?rnd=9161307384583139";
        $websvr_cookie="websvr_cookie"."=".$_COOKIE['websvr_cookie'];
        $enable_rand="ENABLE_RANDCODE"."=".$_COOKIE['ENABLE_RANDCODE'];
        $twfid="TWFID"."=".$_COOKIE['TWFID'];
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查 
        curl_setopt($ch,CURLOPT_REFERER,"https://vpn.hpu.edu.cn/por/login_psw.csp");
        curl_setopt($ch,CURLOPT_USERAGENT , "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0");
        curl_setopt($ch,CURLOPT_COOKIE,"$websvr_cookie;$enable_rand;$twfid");
        setcookie("TWFID","deleted");
        setcookie("expires","Saturday, 16-Jan-16 13:41:29 GMT");
        setcookie("path","/");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_exec($ch);
        curl_close($ch);
    }

    public function getInfo($ch){
    	try{
    		$twfid="TWFID"."=".$_COOKIE['TWFID'];
	        $websvr_cookie="websvr_cookie"."=".$_COOKIE['websvr_cookie'];
	        $enable_rand="ENABLE_RANDCODE"."=".$_COOKIE['ENABLE_RANDCODE'];
	        curl_setopt($ch,CURLOPT_URL,"https://vpn.hpu.edu.cn/web/1/http/2/218.196.240.97/xjInfoAction.do?oper=xjxx");
	        curl_setopt($ch,CURLOPT_REFERER,"https://vpn.hpu.edu.cn/web/1/http/1/218.196.240.97/loginAction.do");
	        curl_setopt($ch, CURLOPT_HEADER, 1);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查 
	        curl_setopt($ch,CURLOPT_USERAGENT , "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0");
	        curl_setopt($ch,CURLOPT_COOKIE,"$websvr_cookie;$enable_rand;$twfid");
	        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	        $content=curl_exec($ch);
	        curl_close ( $ch );
	        $content = iconv("gbk", "utf-8", $content);
	        return $content;
    	}catch(Exception $e){
    		throw new Exception("连接超时请稍后重试");
    	}
    	
    }

    public function getScore($ch){
    	try{
    		$twfid="TWFID"."=".$_COOKIE['TWFID'];
	        $websvr_cookie="websvr_cookie"."=".$_COOKIE['websvr_cookie'];
	        $enable_rand="ENABLE_RANDCODE"."=".$_COOKIE['ENABLE_RANDCODE'];
	        curl_setopt($ch,CURLOPT_URL,"https://vpn.hpu.edu.cn/web/1/http/2/218.196.240.97/bxqcjcxAction.do");
	        curl_setopt($ch,CURLOPT_REFERER,"https://vpn.hpu.edu.cn/web/1/http/1/218.196.240.97/loginAction.do");
	        curl_setopt($ch, CURLOPT_HEADER, 0);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查 
	        curl_setopt($ch,CURLOPT_USERAGENT , "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0");
	        curl_setopt($ch,CURLOPT_COOKIE,"$websvr_cookie;$enable_rand;$twfid");
	        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	        $content=curl_exec($ch);
	        curl_close ($ch);
	        $html = iconv("gbk", "utf-8", $content);
	        return $html;
	        $data = QueryList::Query($html,array(
		        'text' => array('table:eq(6) tr','text')
		    ))->getData(function($item){
		        return $item;
		    });
		    return $data;
    	}catch(Exception $e){
    		throw new Exception("连接超时请稍后重试", 1);
    	}
    	
    }

}
