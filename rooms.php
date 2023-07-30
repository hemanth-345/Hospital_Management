<html>
<head>
<title>DETAILS OF THE STUDENTS</title>
<?php
include 'connection.php';
?>
<style>
	*{
		 font-family: Verdana,Arial,Helvetica;
	}
	.header
	{
		height: 70px;
		width: 100%;
		border: 2px solid black;
		color: #864ede;
	}
	.table
	{
		height: 580x;
		width: 60%;
		left: 20%;
		right: 20%;
		top: 25px;
		position: relative;
		float: center;
	}
	.footer
	{
		background-color: #864ede;
		height: 20px;
		top: 20PX;
		width:100%;
		position: relative;
		color: white;
	}
	button{
		background-color: #864ede;
		color: white;
		border-radius:  20px solid black;
        padding: 5px;
        cursor: pointer;
        border-color: unset;
        font-size: 20px;
        font-family: monospace;
	}
	.star{
		color: red;
	}
	input{
		border: 2px solid #864ede;
		border-radius: 5PX;
	}
</style>
</head>
<body style="text-align: center">
<div class="header">
<h1 align="center"><b>FILL THE FOLLOWING FORM</b></h1>
</div>
<div class="table">
<table style="text-align: center; " border="0" width="700" cellpadding="5" cellspacing="5">
		<tr align="center" bgcolor="#864ede">
			<td><font color="white">ROOM NO</font></td>
			<td><font color="white">COST(PER DAY)</font></td>
			<td><font color="white">PATIENT ID</font></td>
		</tr>
		<?php 

		$rooms="select * from rooms";

		$query=mysqli_query($cone,$rooms);

		while ($tupple=mysqli_fetch_array($query)) {
			?>
			<tr align="center" bgcolor="#C0C0C0">
				<td><?php echo $tupple['room_no']; ?></td>
				<td><?php echo $tupple['cost_p_d']; ?></td>
				<td><?php
				if(is_null($tupple['pa_id'])){
					echo "-";
				}
				else{
					echo $tupple['pa_id'];
				}
				?></td>
			</tr>
			<?php
		}

		?>
</table>
</div>
</body>
</html>
