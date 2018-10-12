<?php
/* Smarty version 3.1.32-dev-1, created on 2017-09-25 22:12:18
  from "C:\xampp\htdocs\pstopa\app\games\list\gameList.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_59c9632277f780_14570487',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2999ced99b94761ba90f404a27da65d0b54b7118' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pstopa\\app\\games\\list\\gameList.html',
      1 => 1506370290,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c9632277f780_14570487 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3105959c9632276c8e9_78978938', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_884859c96322772617_88357643', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"));
}
/* {block 'top'} */
class Block_3105959c9632276c8e9_78978938 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_3105959c9632276c8e9_78978938',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form id="searchForm" class="pure-form pure-form-stacked" onsubmit="ajaxPostForm('searchForm','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
gameListPart','tab_games'); return false;">
	<legend>WYSZUKIWANIE</legend>
	<fieldset>
		<input type="text" placeholder="Tytuł gry" name="sf_tytul" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->name;?>
" /><br />
		<button type="submit" class="pure-button pure-button-primary">Szukaj!</button>
	</fieldset>
</form>
</div>

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_884859c96322772617_88357643 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_884859c96322772617_88357643',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if (in_array("admin",$_smarty_tpl->tpl_vars['conf']->value->roles)) {?>
<div class="bottom-margin">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
gameNew" style="float: right;">+Nowa gra</a>
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
devNew" style="float: right;">+Nowy developer</a>
</div>
<?php }
$_smarty_tpl->_subTemplateRender(($_smarty_tpl->tpl_vars['conf']->value->root_path).("/app/games/list/gameListPart.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<?php
}
}
/* {/block 'bottom'} */
}
