
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

$this->title = '设计师详情页';
?>

<link rel="stylesheet" type="text/css" href="<?= \yii\helpers\Url::to('@web/css/base.css');?>" />
<link rel="stylesheet" type="text/css" href="<?= \yii\helpers\Url::to('@web/css/index.css');?>" />


<div class="header">
    <div class="w1200 header-content">
        <a href="/"><img class="fl" src="/img/slogan.png" alt="你身边的设计怪兽"></a>
        <div class='fr ring'>
            hi, <span>Janfer</span><span class="icon-mber1">
			</span>
			<ul>
				<li class="ring-title"><img src="/img/head.jpg" alt="" /><span>Janfer</span><br />
                <span class="ring-id">ID:17</span></li>
				<li class="icon-uli">
					<a href="javascript:;"><span></span>VIP记录</a>
				</li>
				<li>
					<a href="javascript:;"><span class="iconfont">&#xea12;</span>我的设计</a>
				</li>
				<li>
					<a href="javascript:;"><span class="iconfont">&#xe600;</span>我的收藏</a>
				</li>
				<li>
					<a href="javascript:;"><span class="iconfont">&#xe60f;</span>个人信息</a>
				</li>
				<li><form action="/logout" method="post">
<input type="hidden" name="_csrf" value="bmlrYUhuaUgsMCoQCRtEByAnKgg5DBAGQxlaNz0fATA3HSkROjYqIA=="><button type="submit" class="btn-logout"><span class="iconfont">&#xe60b;</span>退出登录</button></form></li></ul>        </div>
    </div>
</div>

<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>




<link rel="stylesheet" type="text/css" href="/css/index.css" />


<div class="message">
    本网站尚处在开发中,您看到的是测试页面
</div>


	<!--个人信息-->
	<div class="nav-solid clearfix">
		<div class="perage w1200">
			<div class="perage1 fl">
				<a class="perage1-head" href="javascript:;"><img src="/img/head.jpg" alt="" /></a>
				<span class='age1-describe'>图设计<span>（设计师）</span></span><br />
				<span>ID：123456</span>
				<a class="perage1-rapid" href="javascript:;">快速开启设计</a>
			</div>
			<ul class="perage2 fr">
				<li>
					<h2><span>12</span>张</h2>
					<p>待审核</p>
				</li>
				<li>
					<h2><span>122</span>张</h2>
					<p>总上传模板</p>
				</li>
				<li class="age2-last-li">
					<h2><span>100</span>%</h2>
					<p>通过率</p>
				</li>
			</ul>
		</div>
	</div>
</div>
<!--content-->
 <div class="content w1200">
	<ul class="content-left fl">
		<li class="contl-lis">
			<a class="contli-no" href="javascript:;"><span class="iconfont">&#xe698;</span>审核管理</a>
		</li>
		<li class="contl-lis">
			<a href="javascript:;"><span class="iconfont">&#xea12;</span>我的设计</a>
		</li>
		<li class="contl-lis">
			<a href="javascript:;"><span class="iconfont">&#xe60f;</span>设计师信息</a>
		</li>
	</ul>
	<div class="content-right fr">
		<div class="contr-hei">
		
		<ul class="contr-nav clearfix">
			<li class="contr-navno">
				<a href="javascript:void(0);">待审核</a>
			</li>
			<li>
				<a href="javascript:void(0);">被驳回/待修改<span>new</span></a>
			</li>
			<li>
				<a href="javascript:void(0);">已通过<span>new</span></a>
			</li>
			<li>
				<a href="javascript:void(0);">未通过<span>new</span></a>
			</li>
		</ul>

		<div class="contr-message">
			<div class="contr-classify">
				<span class='contr-ify1'>预览图</span>
				<span class='contr-ify2'>图片信息</span>
				<span class='contr-ify3'>提交时间</span>
				<span class='contr-ify4'>操作</span>
			</div>
			<ul class="contr-ul clearfix">
				<li class="clearfix">
					<ul class="clearfix">
						<li class="contr-limg "><img src="/img/3.jpg" alt="" /></li>
						<li class="contr-age contr-ify2">
							<p>标题：<span class="conrage-color">图怪兽图怪兽图怪兽图怪兽图怪</span></p>
							<p class="clearfix"><span class="fl">关键词：</span><span class="conrage-color">
							<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								</span>
							</p>
							<p>分类：<span>背景 > 电商淘宝</span></p>
							<p>标签：<span>艺术字/文案集</span></p>
							<p>用途：<span>节日热点</span></p>
							<p>风格：<span class="span-padding">大气 简约</span>板式：<span>横</span></p>
							<p>快捷编辑：<span class="conrage-color">公司，电话，</span><span class="conrage-color2">二维码，LOGO</span></p>
							<p>尺寸：<span class="span-padding">600px*600px</span>分辨率：<span>72DPI</span></p>
						</li>
						<li class="contr-age2">2017.06.01</li>
						<li class="contr-age3">
							<a href="javascript:;">撤回</a>
						</li>
					</ul>
				</li>
				<li class="clearfix">
					<ul class="clearfix">
						<li class="contr-limg "><img src="/img/images/commodity_03.jpg" alt="" /></li>
						<li class="contr-age contr-ify2">
							<p>标题：<span class="conrage-color">图怪兽图怪兽图怪兽图怪兽图怪</span></p>
							<p class="clearfix"><span class="fl">关键词：</span><span class="conrage-color">
							<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								</span>
							</p>
							<p>分类：<span>背景 > 电商淘宝</span></p>
							<p>标签：<span>艺术字/文案集</span></p>
							<p>用途：<span>节日热点</span></p>
							<p>风格：<span class="span-padding">大气 简约</span>板式：<span>横</span></p>
							<p>快捷编辑：<span class="conrage-color">公司，电话，</span><span class="conrage-color2">二维码，LOGO</span></p>
							<p>尺寸：<span class="span-padding">600px*600px</span>分辨率：<span>72DPI</span></p>
						</li>
						<li class="contr-age2">2017.06.01</li>
						<li class="contr-age3">
							<a href="javascript:;">撤回</a>
						</li>
					</ul>
				</li>
				<li class="clearfix">
					<ul class="clearfix">
						<li class="contr-limg "><img src="/img/0.jpg" alt="" /></li>
						<li class="contr-age contr-ify2">
							<p>标题：<span class="conrage-color">图怪兽图怪兽图怪兽图怪兽图怪</span></p>
							<p class="clearfix"><span class="fl">关键词：</span><span class="conrage-color">
							<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								</span>
							</p>
							<p>分类：<span>背景 > 电商淘宝</span></p>
							<p>标签：<span>艺术字/文案集</span></p>
						<p>用途：<span>节日热点</span></p>
							<p>风格：<span class="span-padding">大气 简约</span>板式：<span>横</span></p>
							<p>快捷编辑：<span class="conrage-color">公司，电话，</span><span class="conrage-color2">二维码，LOGO</span></p>
							<p>尺寸：<span class="span-padding">600px*600px</span>分辨率：<span>72DPI</span></p>
						</li>
						<li class="contr-age2">2017.06.01</li>
						<li class="contr-age3">
							<a href="javascript:;">撤回</a>
						</li>
					</ul>
				</li>
				<li class="clearfix">
					<ul class="clearfix">
						<li class="contr-limg "><img src="/img/2.jpg" alt="" /></li>
						<li class="contr-age contr-ify2">
							<p>标题：<span class="conrage-color">图怪兽图怪兽图怪兽图怪兽图怪</span></p>
							<p class="clearfix"><span class="fl">关键词：</span><span class="conrage-color">
							<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								</span>
							</p>
							<p>分类：<span>背景 > 电商淘宝</span></p>
							<p>标签：<span>艺术字/文案集</span></p>
							<p>用途：<span>节日热点</span></p>
							<p>风格：<span class="span-padding">大气 简约</span>板式：<span>横</span></p>
							<p>快捷编辑：<span class="conrage-color">公司，电话，</span><span class="conrage-color2">二维码，LOGO</span></p>
							<p>尺寸：<span class="span-padding">600px*600px</span>分辨率：<span>72DPI</span></p>
						</li>
						<li class="contr-age2">2017.06.01</li>
						<li class="contr-age3">
							<a href="javascript:;">撤回</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="contr-message" style="display: none;">
			<div class="contr-classify">
				<span class='contr-ify1'>预览图</span>
				<span class='contr-ify2'>图片信息</span>
				<span class='contr-ify3'>驳回信息</span>
				<span class='contr-ify4'>操作</span>
			</div>
			<ul class="contr-ul clearfix">
				<li class="clearfix">
					<ul class="clearfix">
						<li class="contr-limg "><img src="/img/0.jpg" alt="" /></li>
						<li class="contr-age contr-ify2">
							<p>标题：<span class="conrage-color">图怪兽图怪兽图怪兽图怪兽图怪</span>
								<a class="iconfont conrage-titleg" href="javascript:;">&#xe77d;</a>
							</p>
							<p class="clearfix"><span class="fl">关键词：</span><span class="conrage-color">
							<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								</span>
								<a class="iconfont" href="javascript:;">&#xe77d;</a>
							</p>
							<p>分类：<span>背景 > 电商淘宝</span></p>
							<p>标签：<span>艺术字/文案集</span></p>
							<p>用途：<span>节日热点</span>
								<a class="iconfont conrage-titleg" href="javascript:;">&#xe77d;</a>
							</p>
							<p>风格：<span class="span-padding">大气 简约</span>板式：<span>横</span></p>
							<p>快捷编辑：<span class="conrage-color">公司，电话，</span><span class="conrage-color2">二维码，LOGO</span></p>
							<p>尺寸：<span class="span-padding">600px*600px</span>分辨率：<span>72DPI</span></p>
						</li>
						<li class="contr-age2 contr-age2bg">
							<div>
								<p>信息填写不规范</p>
								<p>信息填写不规范</p>
								<p>信息填写不规范</p>
								<p class="age2-reject">驳回时间</p>
								<p>2017.06.02</p>
							</div>
						</li>
						<li class="contr-age3 ">
							<a class="age3-no1" href="javascript:;">重新提交</a>
							<a href="javascript:;">重新设计</a>
							<a class="age3-no2" href="javascript:;">删除</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="contr-message" style="display: none;">
			<div class="contr-classify">
				<span class='contr-ify1'>预览图</span>
				<span class='contr-ify2'>图片信息</span>
				<span class='contr-ify3'>提交时间</span>
				<span class='contr-ify4'>通过时间</span>
			</div>
			<ul class="contr-ul clearfix">
				<li class="clearfix">
					<ul class="clearfix">
						<li class="contr-limg "><img src="/img/0.jpg" alt="" /></li>
						<li class="contr-age contr-ify2">
							<p>标题：<span class="conrage-color">图怪兽图怪兽图怪兽图怪兽图怪</span>
							</p>
							<p class="clearfix"><span class="fl">关键词：</span><span class="conrage-color">
							<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								</span>
							</p>
							<p>分类：<span>背景 > 电商淘宝</span></p>
							<p>标签：<span>艺术字/文案集</span></p>
							<p>用途：<span>节日热点</span>
							</p>
							<p>风格：<span class="span-padding">大气 简约</span>板式：<span>横</span></p>
							<p>快捷编辑：<span class="conrage-color">公司，电话，</span><span class="conrage-color2">二维码，LOGO</span></p>
							<p>尺寸：<span class="span-padding">600px*600px</span>分辨率：<span>72DPI</span></p>
						</li>
						<li class="contr-age2 contr-age2bg">
							2017.06.01
						</li>
						<li class="contr-age3 ">
							2017.06.01
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="contr-message" style="display: none;">
			<div class="contr-classify">
				<span class='contr-ify1'>预览图</span>
				<span class='contr-ify2'>图片信息</span>
				<span class='contr-ify3'>未通过原因<span class="iconfont">&#xe66d;
				<div>抱歉您的作品没有通过审核，若有异议请联系客服</div>
			</span></span>
				<span class='contr-ify4'>时间</span>
			</div>
			<ul class="contr-ul clearfix">
				<li class="clearfix">
					<ul class="clearfix">
						<li class="contr-limg "><img src="/img/0.jpg" alt="" /></li>
						<li class="contr-age contr-ify2">
							<p>标题：<span class="conrage-color">图怪兽图怪兽图怪兽图怪兽图怪</span>
							</p>
							<p class="clearfix"><span class="fl">关键词：</span><span class="conrage-color">
							<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								<span>图怪兽</span>
								<span>图怪兽图</span>
								</span>
							</p>
							<p>分类：<span>背景 > 电商淘宝</span></p>
							<p>标签：<span>艺术字/文案集</span></p>
							<p>用途：<span>节日热点</span>
							</p>
							<p>风格：<span class="span-padding">大气 简约</span>板式：<span>横</span></p>
							<p>快捷编辑：<span class="conrage-color">公司，电话，</span><span class="conrage-color2">二维码，LOGO</span></p>
							<p>尺寸：<span class="span-padding">600px*600px</span>分辨率：<span>72DPI</span></p>
						</li>
						<li class="contr-age2 contr-age2bg">
							<div class="age2-xinx">
								<p>信息填写不规</p>
								<p>信息填写不规</p>
							</div>
						</li>
						<li class="contr-age3 contr4-age3">
							<div>
								<div>
									<p class="age3-date">驳回时间</p>
									<p>2017.06.02</p>
								</div>
								<div>
									<p class="age3-date">提交时间</p>
									<p>2017.06.02</p>
								</div>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		</div>
	</div>
	<div class="content-right fr" style="display: none;">
		<div class="contr-hei">
		<div class="contr2-list">

			<ul class="con-details clearfix">
				<li>
					<a class="con-img" href="javascript:void(0);"><img src="/img/images/commodity_03.jpg" alt="" /></a>
					<div>
						<h4>六一儿童节卡通创意公众号封面图</h4>
						<a href="javascript:void(0)"><span class="iconfont">&#xea12;</span>重新设计</a>
						<a class="collect" href="javascript:void(0)"><span class="iconfont">&#xe605;</span>删除 </a>
					</div>
				</li>
				<li>
					<a class="con-img" href="javascript:void(0);"><img src="/img/images/commodity_03.jpg" alt="" /></a>
					<div>
						<h4>六一儿童节卡通创意公众号封面图</h4>
						<a href="javascript:void(0)"><span class="iconfont">&#xea12;</span>重新设计</a>
						<a class="collect" href="javascript:void(0)"><span class="iconfont">&#xe605;</span>删除 </a>
					</div>
				</li>
				<li>
					<a class="con-img" href="javascript:void(0);"><img src="/img/images/commodity_03.jpg" alt="" /></a>
					<div>
						<h4>六一儿童节卡通创意公众号封面图</h4>
						<a href="javascript:void(0)"><span class="iconfont">&#xea12;</span>重新设计</a>
						<a class="collect" href="javascript:void(0)"><span class="iconfont">&#xe605;</span>删除 </a>
					</div>
				</li>
				<li>
					<a class="con-img" href="javascript:void(0);"><img src="/img/images/commodity_03.jpg" alt="" /></a>
					<div>
						<h4>六一儿童节卡通创意公众号封面图</h4>
						<a href="javascript:void(0)"><span class="iconfont">&#xea12;</span>重新设计</a>
						<a class="collect" href="javascript:void(0)"><span class="iconfont">&#xe605;</span>删除 </a>
					</div>
				</li>
				<li>
					<a class="con-img" href="javascript:void(0);"><img src="/img/images/commodity_03.jpg" alt="" /></a>
					<div>
						<h4>六一儿童节卡通创意公众号封面图</h4>
						<a href="javascript:void(0)"><span class="iconfont">&#xea12;</span>重新设计</a>
						<a class="collect" href="javascript:void(0)"><span class="iconfont">&#xe605;</span>删除 </a>
					</div>
				</li>
				<li>
					<a class="con-img" href="javascript:void(0);"><img src="/img/images/commodity_03.jpg" alt="" /></a>
					<div>
						<h4>六一儿童节卡通创意公众号封面图</h4>
						<a href="javascript:void(0)"><span class="iconfont">&#xea12;</span>重新设计</a>
						<a class="collect" href="javascript:void(0)"><span class="iconfont">&#xe605;</span>删除 </a>
					</div>
				</li>

			</ul>
		</div>
		</div>
	</div>
	<div class="content-right fr" style="display: none;">
		<div class="contr-hei">
		<div class="contr3-msage">
			<h3>设计师信息<span>（仅用于工资结算）</span></h3>
			<p><span class="cr3age-name">真名：</span><span>图设计</span></p>
			<p><span class="cr3age-name">支付宝：</span><span>188****3333</span></p>
		</div>
		</div>
	</div>
</div>
<!--bottom-->
<div class="bottom">
	<div class="w1200 bot-content clearfix">
		<div class="bot-logo fl"></div>
		<ul class="bot-list fl">
			<li>
				<a href="javascript:void(0)">关于我们</a>
			</li>
			<li>
				<a href="javascript:void(0)">免费模板</a>
			</li>
			<li>
				<a href="javascript:void(0)">新手指南</a>
			</li>
			<li>
				<a href="javascript:void(0)">联系客服</a>
			</li>
			<li>
				<a href="javascript:void(0)">在线设计</a>
			</li>
		</ul>
		<ul class="bot-list2 fl">
			<li class="fl friendship">友情链接</li>
			<li>
				<a href="//588ku.com" target="_blank">千库网</a>
			</li>
			<li>
				<a href="//699pic.com" target="_blank">摄图网</a>
			</li>
			<li>
				<a href="//58pic.com" target="_blank">千图网</a>
			</li>
            <li>
				<a href="//shareweapp.com" target="_blank">ShareWe</a>
			</li>
		</ul>
	</div>
	<div class="bot-records">
		&copy; 2017&nbsp;图怪兽 沪ICP备17020445号-1
	</div>
</div>
<script type="text/javascript" src="<?= \yii\helpers\Url::to('@web/js/jquery-1.11.0.js');?>"></script>
<script type="text/javascript">
	$(function() {
		var cont = {};
		cont.lis = $('.contr-age'),
			cont.lis2 = $('.contr-age2'),
			cont.lis3 = $('.contr-age3'),
			cont.imgs = $('.contr-limg>img'),
			cont.lihei,
			cont.llis = $('.contl-lis'),
			cont.lirg = $('.content-right'),
			cont.navli = $('.contr-nav>li'),
			cont.meage = $('.contr-message'),
			cont.uls = $('.contr-ul'),
			cont.contrh=$('.contr-hei')
		//列表图片文字高度设置
		lihei();

		function lihei() {
			cont.lis.each(function(i) {
				cont.lihei = cont.lis.eq(i).height();
				cont.imgs.eq(i).css('max-height', cont.lihei + 'px');
				cont.lis2.eq(i).css({
					'height': cont.lihei + 'px',
					'line-height': cont.lihei + 'px'
				});
				cont.lis3.eq(i).css({
					'height': cont.lihei + 'px',
					'line-height': cont.lihei + 'px'
				});
			});
		}
		//tap栏切换
		cont.llis.click(function(e) {
			cont.lirg.each(function(i) {
				cont.llis.eq(i).find('a').removeClass('contli-no');
				cont.lirg.eq(i).hide();
			})
			cont.llis.eq($(this).index()).find('a').addClass('contli-no');
			cont.lirg.eq($(this).index()).show();
			contr();
		});
		cont.navli.click(function(e) {
			var thisi = $(this).index();
			if(thisi >= 1) {
				cont.navli.eq(thisi).find('span').hide();
			}
			cont.navli.each(function(i) {
				cont.navli.eq(i).removeClass('contr-navno');
				cont.meage.eq(i).hide();
			})
			cont.navli.eq(thisi).addClass('contr-navno');
			cont.meage.eq(thisi).show();
			lihei();
			contul();
			contr();
		})
		contul();
		//如果为空显示背景
		function contul() {
			cont.uls.each(function(i) {
				var cotent = $.trim(cont.uls.eq(i).html()).length;
				if(cotent === 0) {
					cont.uls.eq(i).css({
						'background':'url(img/bg.png) left top no-repeat',
						'height':'350px'
					});
				}
			})
		}
		contr();
		//右边高度小于600让他等于600
		function contr() {
			cont.contrh.each(function(i) {
				if((cont.contrh.eq(i).height()) < 600) {
					cont.lirg.eq(i).css('height', '600px')
				}else{
					cont.lirg.eq(i).css('height', cont.contrh.eq(i).height()+70+"px")
				}
			})

		}
	})
</script>