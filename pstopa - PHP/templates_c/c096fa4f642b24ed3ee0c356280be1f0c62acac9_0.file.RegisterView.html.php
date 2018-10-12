<?php
/* Smarty version 3.1.32-dev-1, created on 2017-09-23 21:03:33
  from "C:\xampp\htdocs\pstopa\app\register\RegisterView.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_59c6b005c7f8f7_96633784',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c096fa4f642b24ed3ee0c356280be1f0c62acac9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pstopa\\app\\register\\RegisterView.html',
      1 => 1506190256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c6b005c7f8f7_96633784 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1382159c6b005c79286_43638389', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"));
}
/* {block 'top'} */
class Block_1382159c6b005c79286_43638389 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1382159c6b005c79286_43638389',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Rejestracja</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_login">Login: </label>
			<input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
"/>
		</div>
        <div class="pure-control-group">
			<label for="id_pass">Hasło: </label>
			<input id="id_pass" type="password" name="pass" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->pass;?>
" /><br />
		</div>
		<div class="pure-controls">
			<input type="submit" value="zarejestruj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>
<?php
}
}
/* {/block 'top'} */
}
