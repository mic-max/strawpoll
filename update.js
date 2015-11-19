var b = new XMLHttpRequest;
setInterval(function() {
	b.onreadystatechange = function() {
		if(b.readyState == XMLHttpRequest.DONE && b.status == 200) {
			var c = 0;
			var d = b.responseText.split("\n").map(String);
			for(a = 1; a < d.length; a += 2)
				c += parseInt(d[a]);
			if(c != 0)
				for(a = 0; a < d.length; a++) {
					var e = document.getElementById("m" + a / 2);
					var f = document.getElementById("q");
					var t = document.getElementById("i" + a / 2);
					t.setAttribute("value", d[a]);
					document.getElementById("p" + a / 2).innerHTML = d[++a] + " votes (" + (parseInt(d[a]) / c * 100).toFixed() + "%)";
					f.setAttribute("value", c + " total votes");
					e.setAttribute("value", parseInt(d[a]) / c).toFixed(4);
				}
		}
	};
	b.open("GET", "update.php?n=" + n, true);
	b.send();
}, 3E3);