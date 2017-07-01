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
    	$arr=array(); 
        $arr[0][]="311408000107";$arr[0][]="155506";$arr[1][]="311502020328";$arr[1][]="202570";
        $arr[2][]="311505000609";$arr[2][]="196443";$arr[3][]="311405040126";$arr[3][]="261037";
        $arr[4][]="311413030118";$arr[4][]="093815";$arr[5][]="311509020427";$arr[5][]="190137";
        $arr[6][]="311410040223";$arr[6][]="100624";$arr[7][]="311503000512";$arr[7][]="083715";
        $arr[8][]="311402010418";$arr[8][]="030019";$arr[9][]="311508071030";$arr[9][]="300012";
        $arr[10][]="311503020105";$arr[10][]="217724";$arr[11][]="311506001019";$arr[11][]="107016";
        $arr[12][]="311510040206";$arr[12][]="150020";$arr[13][]="311517060112";$arr[13][]="180023";
        $arr[14][]="311508001111";$arr[14][]="044018";$arr[15][]="311509060203";$arr[15][]="135722";
        $arr[16][]="311409080227";$arr[16][]="312117";$arr[17][]="311508000423";$arr[17][]="03391X";
        $arr[18][]="311509020114";$arr[18][]="257316";$arr[19][]="311406030105";$arr[19][]="132472";
        $arr[20][]="311406000709";$arr[20][]="067383";$arr[21][]="311510020315";$arr[21][]="080620";
        $arr[22][]="311510020316";$arr[22][]="125223";$arr[23][]="311504001504";$arr[23][]="146210";
        $arr[24][]="311508000801";$arr[24][]="21522X";$arr[25][]="311510060218";$arr[25][]="206607";
        $arr[26][]="311508000806";$arr[26][]="277047";$arr[27][]="311504001010";$arr[27][]="20331X";
        $arr[28][]="311503040203";$arr[28][]="17452X";$arr[29][]="311505000822";$arr[29][]="263919";
        $arr[30][]="311505000408";$arr[30][]="040060";$arr[31][]="311502010206";$arr[31][]="180019";
        $arr[32][]="311405001029";$arr[32][]="120610";$arr[33][]="311405000929";$arr[33][]="082510";
        $arr[35][]="311512010214";$arr[35][]="017921";$arr[34][]="311507000928";$arr[34][]="062417";
        $arr[37][]="311516010109";$arr[37][]="148428";$arr[36][]="311517040220";$arr[36][]="159810";
        $arr[39][]="311509080310";$arr[39][]="06543X";$arr[38][]="311517010213";$arr[38][]="25301X";
        $arr[41][]="311509020428";$arr[41][]="158514";$arr[40][]="311515010107";$arr[40][]="222032";
        $arr[43][]="311515010123";$arr[43][]="181911";$arr[42][]="311515010118";$arr[42][]="135418";
        $arr[45][]="311506000518";$arr[45][]="120618";$arr[44][]="311506000519";$arr[44][]="055896";
        $arr[47][]="311506000418";$arr[47][]="11313X";$arr[46][]="311506000625";$arr[46][]="209177";
        $arr[49][]="311506000408";$arr[49][]="230020";$arr[48][]="311506000602";$arr[48][]="18202X";
        $arr[51][]="311506000529";$arr[51][]="241519";$arr[50][]="311506000527";$arr[50][]="270050";
        $arr[52][]="311506000409";$arr[52][]="286021";$arr[53][]="311506000613";$arr[53][]="267963";
        $arr[54][]="311506000628";$arr[54][]="28661X";$arr[55][]="311506000324";$arr[55][]="145316";
        $arr[56][]="311506000412";$arr[56][]="181526";$arr[57][]="311506000522";$arr[57][]="121599";
        $arr[58][]="311506000604";$arr[58][]="266784";$arr[59][]="311506000310";$arr[59][]="282586";
        $arr[60][]="311506000624";$arr[60][]="120610";$arr[67][]="311506000510";$arr[67][]="056522";
        $arr[61][]="311506000514";$arr[61][]="312561";$arr[68][]="311506000627";$arr[68][]="253359";
        $arr[62][]="311506000330";$arr[62][]="02389X";$arr[69][]="311506000618";$arr[69][]="043512";
        $arr[63][]="311506000523";$arr[63][]="29243X";$arr[70][]="311502030329";$arr[70][]="225014";
        $arr[64][]="311502030327";$arr[64][]="290314";$arr[71][]="311506000322";$arr[71][]="125012";
        $arr[65][]="311507001211";$arr[65][]="064130";$arr[72][]="311506000321";$arr[72][]="29455X";
        $ran=rand(0,72);
    	try{
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
			        'svpn_name' => $arr[$ran][0],
			        'svpn_password' => $arr[$ran][1]
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
	        $this->logout($ch);
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
