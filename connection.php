<?php

$cone= mysqli_connect('localhost','root','','hospital');

if ($cone) {
	?>
	<script>
	alert("WELL COME :)");
	</script>
	<?php
}
else{
	echo "connection failure";
	die('no connection'.mysql_connect_error());
}

?>