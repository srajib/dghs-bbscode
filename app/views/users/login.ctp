	    <link href="<?php echo $this->base;?>/css/login_style.css" rel="stylesheet" type="text/css" />
<div id="wrapper">
<div id="content" style="width:300px;margin-left:470px;margin-right:auto;background: none;padding-top:50px;">

<h1><?php __('Administrator login'); ?></h1>
<div class="mt8 mb8"><?php // echo $this->Html->image('separetor.png'); ?></div>
<div class="search">
<?php
echo $form->create('User', array('action' => 'login','style'=>""));
echo $form->input('email_address', array('label'=>__('Username (your e-mail address)', true), 'after'=>''));
echo $form->input('password', array('label'=>__('Password', true), 'after'=>''));
echo "<div class='clear' style='height:10px;'></div>";
echo $form->submit('LOGIN');
echo $form->end();
?>
<?php echo $html->link(__('Forgot your username or password?', true), array('controller'=> 'users', 'action'=>'forgotpassword'), array('style'=>"
background:url(".$this->base."/img/btn_forgot_password.gif) no-repeat;
color:#fff;
font-weight:normal;
min-width:0;
padding:4px 8px;
margin-top:-20px;
text-decoration:none;")); ?>
</div>
<div>
</div>
</div>
</div>
