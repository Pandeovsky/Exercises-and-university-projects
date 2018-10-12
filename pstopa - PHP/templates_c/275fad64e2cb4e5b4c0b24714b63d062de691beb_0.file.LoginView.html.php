<?php
/* Smarty version 3.1.32-dev-1, created on 2017-09-19 20:32:05
  from "C:\xampp\htdocs\pstopa\app\login\LoginView.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_59c162a56f4a87_75880413',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '275fad64e2cb4e5b4c0b24714b63d062de691beb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pstopa\\app\\login\\LoginView.html',
      1 => 1505845619,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c162a56f4a87_75880413 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1339659c162a56ee139_13740246', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"));
}
/* {block 'top'} */
class Block_1339659c162a56ee139_13740246 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1339659c162a56ee139_13740246',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Logowanie</legend>
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
			<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>
<?php
}
}
/* {/block 'top'} */
}
