<?php
	include "title.php";
	$s = $m->prepare("SELECT votes, `option` FROM options WHERE poll_id = ? ORDER BY votes DESC");
	$s->bind_param("i", $n);
	$s->execute();
	$s->bind_result($f, $e);
	while($s->fetch()) {
		$o[] = $e;
		$v[] = $f;
	}
	$s->close();
	$m->close();
?>
			<form>
				<textarea disabled><?= htmlspecialchars($t, ENT_QUOTES);?></textarea>
				<div id = "o">
<?php
	$c = count($o);
	$q = array_sum($v);
	for($i = 0; $i < $c; $i++) {
		$p = $v[$i] / $q;
		echo "\t\t\t\t\t<div>\n\t\t\t\t\t\t<span>", $i + 1, ".</span>\n\t\t\t\t\t\t<input id = 'i$i' value = '", htmlspecialchars($o[$i], ENT_QUOTES), "' disabled>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div>\n\t\t\t\t\t\t<meter id = 'm$i' value = ", number_format($p, 4), "></meter>\n\t\t\t\t\t\t<p id = 'p$i'>$v[$i] votes (", number_format($p * 100), "%)</p>\n\t\t\t\t\t</div>\n";
	}
?>
				</div>
				<input type = "submit" id = 'q' value = "<?= $q;?> total votes" disabled>
				<script>var n = <?= $n;?></script>
				<script src = "update.js"></script>
<?php include "footer.php";?>