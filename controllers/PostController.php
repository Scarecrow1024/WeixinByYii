<?php

namespace app\controllers;

use yii;
use GuzzleHttp\Client;
use QL\QueryList;
use app\components\SimpleHtmlController;

class PostController extends \yii\web\Controller
{
    public function actionVerify()
    {	
    	try{
    		$redis = Yii::$app->redis;
    		$val = $this->_get($redis);
    		$res = explode(':',$val);
    		$uid = $res[0];
    		$pass = $res[1];
    		$client = new Client(['base_uri' => 'https://vpn.hpu.edu.cn','cookies'=>true]);
			$jar = new \GuzzleHttp\Cookie\CookieJar();
			$response = $client->request('get', '/por/login_psw.csp', [
			    'headers' => [
			        'User-Agent' => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0',
			    ],
			    'cookies' => $jar,
			    'verify' => false,
			    'timeout' => 3,
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
			        'svpn_name' => $uid,
			        'svpn_password' => $pass
			    ],
			    'cookies' => $jar,
			    'verify' => false,
			    'timeout' => 1,
			]);
			//获取到websvr_cookie
			$response = $client->request('get', 'https://vpn.hpu.edu.cn/web/1/http/0/218.196.240.97/', [
			    'headers' => [
			        'User-Agent' => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0',
			    ],
			    'cookies' => $jar,
			    'verify' => false,
			    'timeout' => 1,
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
			    'timeout' => 1,
			]);
			$body = $response->getBody();
			$enable = $jar->getCookieByName('ENABLE_RANDCODE')->toArray();
			$twfid = $jar->getCookieByName('TWFID')->toArray();
			$websvr_cookie = $jar->getCookieByName('websvr_cookie')->toArray();
			setcookie($twfid['Name'],$twfid['Value']);
			setcookie($enable['Name'],$enable['Value']);
			setcookie($websvr_cookie['Name'],$websvr_cookie['Value']);
			setcookie('info',$uid.":".$pass);
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
    		try{
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
		        $content = $this->getScore($ch);
		        $html=new SimpleHtmlController();
		        $html->load($content);
		        $table=$html->find('table')[5];
		        $arr=$this->get_td_array($table);//执行函数
		        $data=array();
		        foreach($arr as $k=>$v){
		            if(count($v)>2){
		                $data['kcm'][]=$v[2];
		                $data['xf'][]=$v[4];
		                $data['kcsx'][]=$v[5];
		                $data['zgf'][]=$v[6];
		                $data['zdf'][]=$v[7];
		                $data['pjf'][]=$v[8];
		                $data['cj'][]=$v[9];
		                $data['mc'][]=$v[10];
		            } 
		        }
		        return $this->render('index',['data'=>$data]);
    		}catch(Exception $e){
    			echo $e->getMessage();
    		}
    		
    	}
    }

    public function logout($ch){
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
	        $redis = Yii::$app->redis;
	        $val = $_COOKIE['info'];
	        $this->_set($redis,$val);
	        $this->logout($ch);
	        $html = iconv("gbk", "utf-8", $content);
	        return $html;
    	}catch(Exception $e){
    		throw new Exception("连接超时请稍后重试", 1);
    	}
    	
    }

    //初始化列表list1存有记录,list2为空列表
    public function _init(){
        $redis = Yii::$app->redis;
    	$result = $redis->executeCommand('lpush', ['list1','311605000502:249645','311502020328:202570','311505000609:196443','311623010301:083821','311510060121:142529','311504000825:240715','311503050201:221263','311506000407:05932X','311614010120:110206','311606001502:126523','311610010411:275022','311502020101:077967','311605040128:183718','311502020102:109806','311510030210:200527','311609000514:015816','311609030117:24003X','311513020216:142632','311503050205:032521','311611000124:151813','311604000712:054316','311622000408:040567','311506000529:241519','311611000419:022674','311603000508:284523','311621020321:196411']);
    	return $result;
    }

    //从list1列表中pop出一条记录并将获取到的记录push到list2中
    public function _get($redis){
    	if($this->getNum($redis)){
    		$val = $redis->lpop('list1');
	    	return $val;
    	}else{
    		$this->reset($redis);
    		$val = $redis->lpop('list1');
	    	return $val;
    	}
    }

    public function _set($redis,$val){
    	return $redis->rpush('list2',$val);
    }

    //获取list1中的资源数量
    public function getNum($redis){
    	$num = $redis->executeCommand('llen',['list1']);
    	return $num;
    }

    //当list1为空时重新初始化列表,将list2中的记录转移到list1
    public function reset($redis){
    	$num = $redis->executeCommand('llen',['list2']);
    	while($num){
    		$val = $redis->lpop('list2');
    		$redis->rpush('list1',$val);
    		$num--;
    	}
    }

    public function actionRedis(){
    	$redis = Yii::$app->redis;
    	$val = $this->_get($redis);
    	if($this->_set($redis,$val)){
    		echo $val;
    	}
    }

    //正则匹配表格
    public function get_td_array($table) { 
        $table = preg_replace("'<table[^>]*?>'si","",$table); 
        $table = preg_replace("'<tr[^>]*?>'si","",$table); 
        $table = preg_replace("'<td[^>]*?>'si","",$table); 
        $table = str_replace("</tr>","{tr}",$table); 
        //PHP开源代码
        $table = str_replace("</td>","{td}",$table); 
        //去掉 HTML 标记  
        $table = preg_replace("'<[/!]*?[^<>]*?>'si","",$table); 
        //去掉空白字符   
        $table = preg_replace("'([rn])[s]+'","",$table); 
        $table = str_replace(" ","",$table); 
        $table = str_replace("&nbsp;","",$table); 
        $table = str_replace(" ","",$table);
        $table = explode('{tr}', $table); 
        array_pop($table);  
        foreach ($table as $key=>$tr) { 
            $td = explode('{td}', $tr); 
            array_pop($td); 
            $td_array[] = $td; 
        } 
        return $td_array; 
    }

}
