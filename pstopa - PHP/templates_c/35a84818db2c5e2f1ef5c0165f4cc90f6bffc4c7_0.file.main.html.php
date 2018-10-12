<?php
/* Smarty version 3.1.32-dev-1, created on 2017-09-23 21:05:23
  from "C:\xampp\htdocs\pstopa\templates\main.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_59c6b073e3bab1_81679637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35a84818db2c5e2f1ef5c0165f4cc90f6bffc4c7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pstopa\\templates\\main.html',
      1 => 1506193484,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c6b073e3bab1_81679637 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8"/>
	<title>Projekt zaliczeniowy JPDSI</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css">
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/functions.js"><?php echo '</script'; ?>
>
</head>

<body style="margin: 20px; background-image: url(https://newevolutiondesigns.com/images/freebies/city-wallpaper-18.jpg)">
<div class="pure-menu pure-menu-horizontal">
<!--<div class="pure-menu pure-menu-horizontal bottom-margin">-->
 <ul class="pure-menu-list" style="float: right;">
	<li class="pure-menu-item"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
gameList" class="pure-menu-heading pure-menu-link" style="color: white;">Lista</a></li>
<?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
	<li class="pure-menu-item"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" class="pure-menu-heading pure-menu-link" style="color: white;">Wyloguj</a></li></li>
<?php } else { ?>
	<li class="pure-menu-item"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow" class="pure-menu-heading pure-menu-link" style="color: white;">Zaloguj</a></li>
	<li class="pure-menu-item"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
registerShow" class="pure-menu-heading pure-menu-link" style="color: white;">Rejestracja</a></li>
<?php }?>
</ul>
</div>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2797159c6b073e1f932_93656682', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_812859c6b073e22566_55868315', 'messages');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1356159c6b073e39bb7_67428731', 'bottom');
?>


</body>

</html>
<?php }
/* {block 'top'} */
class Block_2797159c6b073e1f932_93656682 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_2797159c6b073e1f932_93656682',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'top'} */
/* {block 'messages'} */
class Block_812859c6b073e22566_55868315 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'messages' => 
  array (
    0 => 'Block_812859c6b073e22566_55868315',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
<div class="messages bottom-margin">
	<ul>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
	<li class="msg <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>info<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	</ul>
</div>
<?php }?>

<?php
}
}
/* {/block 'messages'} */
/* {block 'bottom'} */
class Block_1356159c6b073e39bb7_67428731 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_1356159c6b073e39bb7_67428731',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'bottom'} */
}
