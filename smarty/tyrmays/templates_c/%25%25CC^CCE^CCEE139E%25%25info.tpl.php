<?php /* Smarty version 2.6.26, created on 2010-05-04 15:37:47
         compiled from info.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="heading"><a> <?php echo $this->_config[0]['vars']['general']; ?>
 </a>  </div>

<?php if ($this->_tpl_vars['lang'] == fi): ?>

<div class="infocontentfi">

<p>TYRMÄYS on Tampereen yliopiston raskaan musiikin yhdistys. Nimi tulee sanoista: Tampereen Yliopiston Raskaan Musiikin Ystävien Seura. Tyrmäyksen tarkoitus on yhdistää samanhenkisiä ihmisiä ja järjestää asianmukaisia tapahtumia sekä muuta hevariystävällistä toimintaa.
</p>

</div>

<?php else: ?>

<div class="infocontenten">

<p>Shortly TYRMÄYS is a heavy metal association targeted for those who study in University of Tampere. We try to unite all the students who are interested in listening to heavy metal music.
</p>

</div>

<?php endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>