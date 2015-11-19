var a = -1;
function d() {
	if(a < 15) {
		var b = document.querySelector("input[name='o" + a++ + "']");
		b && b.removeEventListener("input", d);
		var b = document.createElement("div");
		var c = document.createElement("input");
		var e = document.createElement("span");
		c.setAttribute("name", "o" + a);
		c.setAttribute("maxlength", "77");
		c.setAttribute("placeholder", "Enter poll option...");
		e.appendChild(document.createTextNode(a + 1 + "."));
		b.appendChild(c);
		b.appendChild(e);
		document.getElementById("o").appendChild(b);
		c.addEventListener("input", d, false);
	}
}
window.onload = d();d() ;