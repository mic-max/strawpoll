<?php
	include "header.php";
	include "connect.php";
	$n = intval($_GET[n]);
	$s = $m->prepare("SELECT title FROM polls WHERE id = ?");
	$s->bind_param("i", $n);
	$s->execute();
	$s->bind_result($t);
	$s->fetch();
	$s->close();
?>