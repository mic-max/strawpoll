<?php
	$o = array_slice($_POST, 1, 16);
	for($i = 0; i < count($o); i++)) {
		if ($o[$i] == "") {
			unset($o[$i]);
		}
	}
	
	$c = count($o);
	if($c > 1 && ($z = str_replace(array("\r", "\n"), "", trim($_POST[t]))) !== "") {
		include "connect.php";
		$s = $m->prepare("INSERT INTO polls VALUES (NULL, ?)");
		$s->bind_param("s", $z);
		$s->execute();
		$s->close();
		$n = $m->insert_id;
		foreach ($o as $option) {
			$s = $m->prepare("INSERT INTO options VALUES (?, ?, ?, 0)");
			$s->bind_param("iis", $n, $i, $option);
			$s->execute();
			$s->close();
		}
		$m->close();
		header("Location: $n");
	} else
		header("Location: /");
?>
