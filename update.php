<?php
	include "connect.php";
	$s = $m->prepare("SELECT `option`, votes FROM options WHERE poll_id = ? ORDER BY votes DESC");
	$s->bind_param("i", intval($_GET[n]));
	$s->execute();
	$s->bind_result($e, $f);
	while ($s->fetch())
		$r .= "$e\n$f\n";
	echo substr($r, 0, -1);
	$s->close();
	$m->close();
?>