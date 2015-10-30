<?php
	for($i = 0; $i < 16; $i++)
		if(isset($_POST["o$i"]) && ($b = trim($_POST["o$i"])) !== "")
			$o[] = $b;
	$c = count($o);
	if($c > 1 && ($z = str_replace(array("\r", "\n"), '', trim($_POST[q]))) !== "") {
		include "connect.php";
		$s = $m->prepare("INSERT INTO polls VALUES (NULL, ?)");
		$s->bind_param("s", $z);
		$s->execute();
		$s->close();
		$r = $m->query("SELECT MAX(id) FROM polls");
		$w = $r->fetch_array();
		$r->free();
		$n = $w[0];
		for($i = 0; $i < $c; $i++) {
			$s = $m->prepare("INSERT INTO options VALUES (?, ?, ?, 0)");
			$s->bind_param("iis", $n, $i, $o[$i]);
			$s->execute();
			$s->close();
		}
		$m->close();
		header("Location: $n");
	} else
		header("Location: /strawpoll");
?>