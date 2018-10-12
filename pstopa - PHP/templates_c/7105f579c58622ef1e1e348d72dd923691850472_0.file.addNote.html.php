<?php
/* Smarty version 3.1.32-dev-1, created on 2017-09-25 21:48:01
  from "C:\xampp\htdocs\pstopa\app\games\note\addNote.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-1',
  'unifunc' => 'content_59c95d710e0698_91264215',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7105f579c58622ef1e1e348d72dd923691850472' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pstopa\\app\\games\\note\\addNote.html',
      1 => 1506368878,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c95d710e0698_91264215 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1404159c95d710d70f0_18294698', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"));
}
/* {block 'top'} */
class Block_1404159c95d710d70f0_18294698 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1404159c95d710d70f0_18294698',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
noteSave" method="post" class="pure-form pure-form-aligned" style="margin:0 auto; width: 400px; background-color: rgba(102, 102, 102, 0.6); border-radius: 5px; padding: 25px;">
        <fieldset>
            <legend>Oceń Grę!</legend>
            <div class="pure-control-group">
                <label for="note">Ocena</label>
                <input id="note" type="number" placeholder="ocena" name="note" min="1" max="10" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->note;?>
" required>
            </div>

            <div class="pure-controls" style="margin: 0 auto; width: 170px; margin-top: 25px;">
                <input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
                <a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
gameList">Powrót</a>
            </div>
        </fieldset>
        <input type="hidden" name="id_game" value='<?php echo $_smarty_tpl->tpl_vars['form']->value->id_game;?>
'>
        <input type="hidden" name="ID" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
    </form>
</div>

<?php
}
}
/* {/block 'top'} */
}
