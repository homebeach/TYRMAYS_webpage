<?php /* Smarty version 2.6.26, created on 2010-05-06 17:17:15
         compiled from contact.tpl */ ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="heading"><a> <?php echo $this->_config[0]['vars']['contact']; ?>
 </a>  </div>

<?php if ($this->_tpl_vars['lang'] == fi): ?>
	<div class="contact_contentfi">
	
	<p>Hallituksen tavoittaa osoitteesta tyrmays_hallitus (at) uta piste fi</p>

	<p>Tyrmäyksen sähköpostilista on osoiteessa tyrmays (at) uta piste fi. Se on avoin lista, jonne jokainen voi liittyä omatoimisesti. <br /><br />
	1. Lähetä postia yliopiston osoitteeseen listserv at uta.fi<br />
	2. Viestin aiheeksi (subject) ei tarvitse laittaa mitään.<br />
	3. Itse viestiin kirjoita ensimmäiselle riville: SUBSCRIBE tyrmays Etunimesi Sukunimesi.
	</p>
	
	<p>Kerhon IRC-kanava on #tyrmays IRCnetissä. Jos IRC ei ole tuttu, kanavalle pääsee käymään esimerkiksi <a href="http://webchat.xs4all.nl/">webchatilla</a>.</p>

	<p>
	Postiosoite:<br />
	TYRMÄYS ry<br />
	Hämeenpuisto 42 C 74<br />
	33200 Tampere<br />
	</p>
	</div>
    <?php else: ?>
	<div class="contact_contenten">
	<p>Board can be contacted via tyrmays_hallitus (at) uta dot fi</p>

	<p>E-mail list can be found at tyrmays (at) uta piste fi. It is an open list where everybody can join invdividually.<br /><br />
	1. Send an e-mail to the address listserv@uta.fi.
   	2. You can leave the Subject field empty.
   	3. On the first line of the Message field, write: SUBSCRIBE tyrmays First name Last name.
	</p>

	<p>
	IRC channel is #tyrmays at IRCnet. If you are not familiar with IRC you can use <a href="http://webchat.xs4all.nl/">webchat</a> to get there.
	</p>
	<p>
	TYRMÄYS is also in <a href="http://unitampere.facebook.com/group.php?gid=8020746252">Facebook</a>.
	</p>
	<p>
	Post address<br />
	TYRMÄYS ry<br />
	Hämeenpuisto 42 C 74<br />
	33200 Tampere<br />
	</p>
	</div>
    <?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
