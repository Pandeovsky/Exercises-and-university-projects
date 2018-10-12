<?php
/* Smarty version 3.1.32-dev-1, created on 2017-09-23 22:07:20
  from "C:\xampp\htdocs\pstopa\app\games\edit\gameEdit.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_59c6bef86f5f71_11149760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1bf19b46982e12ac9853c5f4ea3333b25f5070cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pstopa\\app\\games\\edit\\gameEdit.html',
      1 => 1506197234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c6bef86f5f71_11149760 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1474859c6bef86dd428_59424444', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"));
}
/* {block 'top'} */
class Block_1474859c6bef86dd428_59424444 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1474859c6bef86dd428_59424444',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
gameSave" method="post" class="pure-form pure-form-aligned" style="margin:0 auto; width: 400px; background-color: rgba(102, 102, 102, 0.6); border-radius: 5px; padding: 25px;">
	<fieldset>
		<legend>Dane gry</legend>
		<div class="pure-control-group">
            <label for="name">Tytuł</label>
            <input id="name" type="text" placeholder="Tytuł" name="tytul" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
">
        </div>
		<div class="pure-control-group">
            <label for="genre">Gatunek</label>
            <input id="genre" type="text" placeholder="Gatunek" name="gatunek" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->genre;?>
">
        </div>
	<div class="pure-control-group">
            <label for="birthdate">Data wydania</label>
            <input id="birthdate" type="text" placeholder="Data utworzenia" name="rok_produkcji" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->birthdate;?>
">
        </div>
		<div class="pure-control-group">
		        <label for="dev">Developer</label>
						<select id="dev" type="text" placeholder="Developer" name="developer" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->dev;?>
">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['devs']->value, 'dev');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dev']->value) {
?>
							<option value='<?php echo $_smarty_tpl->tpl_vars['dev']->value["ID"];?>
'><?php echo $_smarty_tpl->tpl_vars['dev']->value["nazwa"];?>
</option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

						</select>
		        <!--<input id="dev" type="text" placeholder="Developer" name="developer" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->dev;?>
">-->
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
