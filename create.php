<?php
	for($i = 0; $i < 16; $i++)
-		if(isset($_POST["o$i"]) && ($b = trim($_POST["o$i"])) !== "")
-			$o[] = $b;
	
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
