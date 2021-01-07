<?php
/* Smarty version 3.1.30, created on 2021-01-07 17:16:41
  from "C:\xampp\htdocs\zadanie6\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ff733e9d89869_27310132',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccd88b39eeaab78bdb648bdbb5ae3c7c9152f7c6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadanie6\\app\\views\\CalcView.tpl',
      1 => 1610036171,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_5ff733e9d89869_27310132 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18657924825ff733e9d7d1d2_80630046', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2205006935ff733e9d894a9_56947702', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_18657924825ff733e9d7d1d2_80630046 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_2205006935ff733e9d894a9_56947702 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h3>Prosty kalkulator</h3>
    <form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post">
        <fieldset>
            <label>Kwota: </label>
            <input type="number" placeholder="Kwota pożyczki" min="1" name="creditValue" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->creditValue;?>
"/><br/>
            <label>Ilość lat: </label>
            <input type="number" min="1" placeholder="Okres" name="years" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->years;?>
"/><br/>
            <label>Oprocentowanie: </label>
            <input type="number" min="1" placeholder="Oprocentowanie" name="percent" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->percent;?>
"/><br/>
        </fieldset>
        <button type="submit" class="pure-button pure-button-primary">Oblicz</button>
    </form>
    <div class="messages">

        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
            <h4>Wystąpiły błędy: </h4>
            <ol class="err">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
                    <li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ol>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
            <h4>Informacje: </h4>
            <ol class="inf">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
                    <li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ol>
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
            <h4>Wynik</h4>
            <p class="res">
                Miesięczna rata wynosi: <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>
zł
            </p>
        <?php }?>

    </div>
<?php
}
}
/* {/block 'content'} */
}
