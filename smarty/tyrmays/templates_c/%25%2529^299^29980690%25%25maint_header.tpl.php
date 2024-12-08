<?php /* Smarty version 2.6.26, created on 2010-05-04 14:37:57
         compiled from maint_header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'maint_header.tpl', 19, false),array('modifier', 'default', 'maint_header.tpl', 19, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
   <meta name="author" content="TYRMÄYS" />

   <title>TYRMÄYS ry - Tampereen Yliopiston Raskaan Musiikin Ystävien Seura</title>
   <link rel="stylesheet" type="text/css" href="maint_tyylit.css" media="all" />

   <script src="sortable/sortable.js"></script>
   
</head>
<body>
<p>TYRMÄYS Maintenance Application</p>
<?php if (( $this->_tpl_vars['firstname'] && $this->_tpl_vars['surname'] )): ?>
<p>You are logged in as <?php echo $this->_tpl_vars['firstname']; ?>
 <?php echo $this->_tpl_vars['surname']; ?>
.</p>
<?php endif; ?>
<h2><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['header'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "Somebody forgot the header!") : smarty_modifier_default($_tmp, "Somebody forgot the header!")); ?>
</h2>

