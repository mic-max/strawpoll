<?php
	include "connect.php";
	$s = $m->prepare("SELECT `option`, votes FROM options WHERE poll_id = ? ORDER BY votes DESC");
	$s->bind_param("i", $_GET[n]);
	$s->execute();
	$s->bind_result($i, $v);
	while ($s->fetch())
		$r .= "$i~$v~";
	echo substr($r, 0, -1);
	$s->close();
	$m->close();
?>