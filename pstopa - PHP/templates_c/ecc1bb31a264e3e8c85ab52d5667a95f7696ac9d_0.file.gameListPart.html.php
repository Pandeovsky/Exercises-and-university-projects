<?php
/* Smarty version 3.1.32-dev-1, created on 2017-09-25 21:13:34
  from "C:\xampp\htdocs\pstopa\app\games\list\gameListPart.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_59c9555e9a8c35_24726034',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ecc1bb31a264e3e8c85ab52d5667a95f7696ac9d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pstopa\\app\\games\\list\\gameListPart.html',
      1 => 1506366811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c9555e9a8c35_24726034 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table id="tab_games" class="pure-table pure-table-bordered"  style="margin: 0 auto; width: 80%; background-color: white;">
<thead>
	<tr>
		<th>Tytuł</th>
		<th>Gatunek</th>
		<th>Data wydania</th>
		<th>developer</th>
		<th>Ocena</th>
		<?php if ((in_array("admin",$_smarty_tpl->tpl_vars['conf']->value->roles) || in_array("user",$_smarty_tpl->tpl_vars['conf']->value->roles))) {?>
		<th>Opcje</th>
		<?php }?>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['games']->value, 'g');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['g']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['g']->value["tytul"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['g']->value["gatunek"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['g']->value["rok_produkcji"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['g']->value["developer"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['g']->value["ocena"];?>
</td><?php if (in_array("admin",$_smarty_tpl->tpl_vars['conf']->value->roles)) {?><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
gameEdit&id=<?php echo $_smarty_tpl->tpl_vars['g']->value['ID'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" onclick="confirmLink('<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
gameDelete&id=<?php echo $_smarty_tpl->tpl_vars['g']->value['ID'];?>
','Czy na pewno usunąć rekord ?')">Usuń</a></td><?php } elseif (in_array("user",$_smarty_tpl->tpl_vars['conf']->value->roles)) {?><td><!-- todo: fix "Add note" url--><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
gameNote&id_game=<?php echo $_smarty_tpl->tpl_vars['g']->value['ID'];?>
">Oceń</a></td><?php }?></tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

</tbody>
	<?php if (($_smarty_tpl->tpl_vars['cp']->value > 1)) {?>
	<a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
loadpages&current_page=<?php echo ($_smarty_tpl->tpl_vars['cp']->value-1);?>
"><</a>
	<?php }?>
	<?php if (($_smarty_tpl->tpl_vars['cp']->value < $_smarty_tpl->tpl_vars['tl']->value)) {?>
	<a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
loadpages&current_page=<?php echo ($_smarty_tpl->tpl_vars['cp']->value+1);?>
">></a>
	<?php }?>
</table>
<?php }
}
