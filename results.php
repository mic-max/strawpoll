<?php
	include "question.php";
	$s = $m->prepare("SELECT votes, `option` FROM options WHERE poll_id = ? ORDER BY votes DESC");
	$s->bind_param("i", $_GET[n]);
	$s->execute();
	$s->bind_result($f, $e);
	while($s->fetch()) {
		$v[] = $f;
		$o[] = str_replace("'", "&#39;", $e);
	}
	$s->close();
	$t = array_sum($v);
	$m->close();
?>
			<form>
				<textarea disabled><?php echo $q;?></textarea>
				<div id = "o">
<?php
	$c = count($o);
	for($i = 0; $i < $c; $i++) {
		$x = $v[$i] / $t;
		echo "\t\t\t\t\t<div>\n\t\t\t\t\t\t<span>", $i + 1, ".</span>\n\t\t\t\t\t\t<input id = 'i$i' value = '$o[$i]' disabled>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div>\n\t\t\t\t\t\t<meter id = 'm$i' value = ", number_format($x, 4), "></meter>\n\t\t\t\t\t\t<p id = 'p$i'>$v[$i] votes (", number_format($x * 100), "%)</p>\n\t\t\t\t\t</div>\n";
	}
?>
				</div>
				<input type = "submit" id = 't' value = "<?php echo $t;?> total votes" disabled>
<script>
var b;
b=new XMLHttpRequest;
setInterval(function(){
	b.onreadystatechange=function(){
		if(b.readyState==XMLHttpRequest.DONE&&200==b.status){
			for(var c=0,d=b.responseText.split("~").map(String),a=1;a<d.length;a+=2)
				c+=parseInt(d[a]);
			if(0!=c)
				for(a=0;a<d.length;a++){
					var e=document.getElementById("m"+a/2),f=document.getElementById("t");
					var t = document.getElementById("i"+a/2);
					t.setAttribute("value", d[a]);
					document.getElementById("p"+a/2).innerHTML=d[++a]+" votes ("+(parseInt(d[a])/c*100).toFixed()+"%)";
					f.setAttribute("value",c+" total votes");
					e.setAttribute("value",parseInt(d[a])/c.toFixed(4));
				}
		}
	};
	b.open("GET","update.php?n=<?php echo $_GET[n];?>",1);
	b.send();
},2E3);
</script>
<?php include "footer.php";?>