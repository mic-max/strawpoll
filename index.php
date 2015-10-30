<?php include "header.php";?>
			<form action = "create.php" method = "post" autocomplete = "off">
				<textarea name = "q" maxlength = "154" autofocus placeholder = "Type your question here, options below"></textarea>
				<div id = "o">
				</div>
				<input type = "submit" value = "Create Poll">
<script>
var a=-1;
function d(){
	if(15>a){
		var b=document.querySelector("input[name='o"+a++ +"']");
		b&&b.removeEventListener("input",d);
		var b=document.createElement("div"),c=document.createElement("input"),e=document.createElement("span");
		c.setAttribute("name","o"+a);
		c.setAttribute("maxlength","77");
		c.setAttribute("placeholder","Enter poll option...");
		e.appendChild(document.createTextNode(a+1+"."));
		b.appendChild(c);
		b.appendChild(e);
		document.getElementById("o").appendChild(b);
		c.addEventListener("input",d,0);
	}
}
window.onload=d();d();
</script>
<?php include "footer.php";?>