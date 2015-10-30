<?php
	include "header.php";
	include "connect.php";
	$s = $m->prepare("SELECT question FROM polls WHERE id = ?");
	$s->bind_param("i", $_GET[n]);
	$s->execute();
	$s->bind_result($q);
	$s->fetch();
	$s->close();
?>