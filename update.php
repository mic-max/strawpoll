<?php
	include "connect.php";
	$s = $m->prepare("SELECT id, votes FROM options WHERE poll_id = ?");
	$s->bind_param("i", $_GET[n]);
	$s->execute();
	$s->bind_result($i, $v);
	while ($s->fetch())
		$r .= "$i~$v~";
	echo substr($r, 0, -1);
	$s->close();
	$m->close();
?>