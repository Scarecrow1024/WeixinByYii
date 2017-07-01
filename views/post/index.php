<?php
/* @var $this yii\web\View */
?>
<h1>post/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
    <form action="/post/login" method="post">
		<input type="text" name="s_id" value="" />
		<input type="text" name="pass" value="" />
		<input type="text" name="code" value="" />
		<img src="/post/verify" alt="">
		<input type="submit" value="提交" />
    </form>
</p>
