<?php
/* Smarty version 3.1.32-dev-1, created on 2017-09-25 20:11:00
  from "C:\xampp\htdocs\pstopa\app\dev\addDev.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_59c946b44fe549_96662959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb516f84609251a7f428169db968629d84a603d9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pstopa\\app\\dev\\addDev.html',
      1 => 1506362940,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c946b44fe549_96662959 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2997159c946b44f7908_22553616', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"));
}
/* {block 'top'} */
class Block_2997159c946b44f7908_22553616 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_2997159c946b44f7908_22553616',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
devSave" method="post" class="pure-form pure-form-aligned" style="margin:0 auto; width: 400px; background-color: rgba(102, 102, 102, 0.6); border-radius: 5px; padding: 25px;">
	<fieldset>
		<legend>Dodaj Developera</legend>
		<div class="pure-control-group">
            <label for="name">Developer</label>
            <input id="name" type="text" placeholder="developer" name="dev" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
">
        </div>

		<div class="pure-controls" style="margin: 0 auto; width: 170px; margin-top: 25px;">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
gameList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="ID" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
</form>
</div>

<?php
}
}
/* {/block 'top'} */
}
