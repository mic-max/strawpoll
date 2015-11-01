<?php include "header.php";?>
			<form action = "create.php" method = "post" autocomplete = "off">
				<textarea name = "t" maxlength = "154" autofocus placeholder = "Type your question here, options below"></textarea>
				<div id = "o">
				</div>
				<input type = "submit" value = "Create Poll">
				<script src = "input.js"></script>
<?php include "footer.php";?>