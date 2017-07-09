<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>期末成绩查询</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="telephone=no,email=no" name="format-detection">
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <!-- <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
    <script type="text/javascript">
        //禁止显示连接
        function onBridgeReady(){
            WeixinJSBridge.call('hideOptionMenu');
        } 
        if (typeof WeixinJSBridge == "undefined"){
        if(document.addEventListener ){
            document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
        }else if (document.attachEvent){
                document.attachEvent('WeixinJSBridgeReady', onBridgeReady); 
                document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
            }
        }else{
            onBridgeReady();
        }
    </script>
    <style>
        .row{margin: 0px;}
        #navid{background-color: #B9D3EE;height: 50px;} 
        #navid span{color: #ffffff;font-size: 18px; line-height: 35px;}
        #content{margin: 15px 10px 0px 10px;border-top: 1px solid #B9D3EE;}
        .glyphicon-user, .glyphicon-education, .glyphicon-eye-open{line-height: 32px;font-size: 27px;color: #B9D3EE;}
        .btn-success{width: 100%;background-color: #B9D3EE;border-color:#B9D3EE; }
        footer{background-color:#BCD2EE;color:#666;position: fixed;bottom: 0px;width: 100%;padding: 10px;text-align: center;}
    </style>

    <script>
        $(document).ready(function() {
            /* 验证码刷新 */
            /*$('#imgId').click(function() {
                $("#imgId").attr('src',"/post/verify");
            });*/
            $('#verify').click(function() {
                $("#imgId").attr('src','/redis/verify');
            });

            /* 数据校验 */
            $('#buttonId').click(function() {
                var zjh= $("#input1").val();
                var mm = $("#input2").val();
                var v_yzm = $("#input3").val();
                if (zjh == '') {alert('请输入学号'); return false;}
                if (mm == '') {alert('请输入密码'); return false;}
                if (v_yzm == '') {alert('请输入验证码'); return false;}
            });
        });
    </script>

</head>

<body>
    <!-- 头部 -->
    <div class="row" id="navid">
        <div class="col-xs-12" style="text-align: center;">
            <span>河南理工大学</span>
        </div>
    </div>
    <!-- 表单 -->
    <div class="row">
        <div class="panel panel-default" id="content">
            <div class="panel-body">
                <form class="form-horizontal" action="/redis/index" method="post">
                <literal>
                    <div class="form-group">
                        <label for="input1" class="col-xs-2 control-label">
                            <span class="glyphicon glyphicon-user"></span>
                        </label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" name="s_id" value="" id="input1" placeholder="学号">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input2" class="col-xs-2 control-label">
                            <span class="glyphicon glyphicon-education"></span>
                        </label>
                        <div class="col-xs-10">
                            <input type="password" class="form-control" value="" name="pass" id="input2" placeholder="教务处密码">
                            <input type="hidden" name="openid" value=""> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input3" class="col-xs-2 control-label">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </label>
                        <div class="col-xs-6">
                            <input type="text" class="form-control" value="" name="code" id="input3"  placeholder="验证码">
                        </div>
                        </literal>
                        <div class="col-xs-4" style="line-height: 30px;padding: 0px;">
                            <img src="" alt="点击获取验证码" id="imgId" style="height: 27px;" onclick="this.src='/redis/verify?'+Math.random()">
                        </div>
                        <!-- <div class="col-xs-4" style="line-height: 30px;padding: 0px;">
                            <input type="button" id="verify" class="btn btn-info btn-sm " onclick="this.src='/post/verify?'+Math.random()" value="看不见换张">                      
                        </div> -->
                    </div>

                    <input type="submit" class="btn btn-success" id="buttonId" name="submit" value="查询">
                </literal>
                </form>
            </div>          
        </div>
    </div>
    <br>
    <div class="col-xs-12" style="text-align: left;">          
        <strong style="color: gray">1.服务器资源紧张并且教务处有登录人数限制,所以会出现登录不成功的情况</strong><br>  
        <strong style="color: blue">2.手快有手慢无输完学号密码后再点击验证码,验证码请尽量在5秒内输完</strong><br>   
    </div>

    <div class="panel panel-info">
      <div class="panel-heading" onclick="adviced(this)" style="
    margin-top: 15%;">
        <span style="float: right;" class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        <h3 class="panel-title">为了不影响体验广告默认隐藏，点我可查看广告</h3>
      </div>
      <div class="panel-body" hidden="hidden">
        <a href="http://mp.weixin.qq.com/s/liDD-2PxOh271K0Pu1JMvQ "><img style="width: 100%;height: 100px;" src="/img/20170709233749.jpg" alt=""></a>
      </div>
    </div>
    <footer>
        &copy;HPU小微提供<br>
    </footer>
</body>
<script>
    function adviced(panel){
        if($(panel).next().attr('hidden')=="hidden"){
            $(panel).next().removeAttr('hidden');
            $('.glyphicon-plus').attr('class', 'glyphicon glyphicon-minus');
        }else{
            $(panel).next().attr('hidden','hidden');
            $('.glyphicon-minus').attr('class', 'glyphicon glyphicon-plus');
        }
        
    }
</script>
</html>