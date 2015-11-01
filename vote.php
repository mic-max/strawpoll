<?php
	$n = intval($_GET[n]);
	if(isset($_POST[v]) && isset($_POST[o])) {
		include "connect.php";
		$s = $m->prepare("SELECT ipv4 FROM votes WHERE poll_id = ? && ipv4 = INET_ATON(?)");
		$s->bind_param("is", $n, $_SERVER[REMOTE_ADDR]);
		$s->execute();
		$s->store_result();
		if($s->num_rows() === 0) {
			$s = $m->prepare("INSERT INTO votes VALUES (?, INET_ATON(?))");
			$s->bind_param("is", $n, $_SERVER[REMOTE_ADDR]);
			$s->execute();
			$s = $m->prepare("UPDATE options SET votes = votes + 1 WHERE poll_id = ? && id = ?");
			$s->bind_param("ii", $n, $_POST[o]);
			$s->execute();
		}
		$m->close();
	}
	header("Location: $n" . 'r');
?>