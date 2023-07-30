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
<h3>DOCTORS</h3>
<table style="text-align: center; " border="0" width="700" cellpadding="5" cellspacing="5">
		<tr align="center" bgcolor="#864ede">
			<td><font color="white">DOC ID</font></td>
			<td><font color="white">DOCTOR NAME</font></td>
			<td><font color="white">GENDER</font></td>
			<td><font color="white">QUALIFICATION</font></td>
			<td><font color="white">DEPARTMENT</font></td>


		</tr>
		<?php 

		$docs="select d_id,d_f_name,d_l_name,d_gender,qualification,dep_name from doctor";

		$query1=mysqli_query($cone,$docs);

		while ($tupple1=mysqli_fetch_array($query1)) {
			?>
			<tr align="center" bgcolor="#C0C0C0">
				<td><?php echo $tupple1['d_id']; ?></td>
				<td><?php echo "Dr.".$tupple1['d_f_name']." ".$tupple1['d_l_name']; ?></td>
				<td><?php echo $tupple1['d_gender']; ?></td>
				<td><?php echo $tupple1['qualification']; ?></td>
				<td><?php echo $tupple1['dep_name']; ?></td>
			</tr>
			<?php
		}

		?>
</table>
</div>
<div class="table">
<h3>RECEPTIONIST</h3>
<table style="text-align: center; " border="0" width="700" cellpadding="5" cellspacing="5">
		<tr align="center" bgcolor="#864ede">
			<td><font color="white">ID</font></td>
			<td><font color="white">RECEPTIONIST NAME</font></td>
			<td><font color="white">GENDER</font></td>


		</tr>
		<?php 

		$recs="select r_id,r_f_name,r_l_name,r_gender from receptionist";

		$query2=mysqli_query($cone,$recs);

		while ($tupple2=mysqli_fetch_array($query2)) {
			?>
			<tr align="center" bgcolor="#C0C0C0">
				<td><?php echo $tupple2['r_id']; ?></td>
				<td><?php echo $tupple2['r_f_name']." ".$tupple2['r_l_name']; ?></td>
				<td><?php echo $tupple2['r_gender']; ?></td>
			</tr>
			<?php
		}

		?>
</table>
</div>
<div class="table">
<h3>NURSE</h3>
<table style="text-align: center; " border="0" width="700" cellpadding="5" cellspacing="5">
		<tr align="center" bgcolor="#864ede">
			<td><font color="white">ID</font></td>
			<td><font color="white">NURSE NAME</font></td>
			<td><font color="white">GENDER</font></td>
			<td><font color="white">ROOM NO</font></td>


		</tr>
		<?php 

		$nurs="select n_id,n_f_name,n_l_name,n_gender,room_no from nurse";

		$query3=mysqli_query($cone,$nurs);

		while ($tupple3=mysqli_fetch_array($query3)) {
			?>
			<tr align="center" bgcolor="#C0C0C0">
				<td><?php echo $tupple3['n_id']; ?></td>
				<td><?php echo $tupple3['n_f_name']." ".$tupple3['n_l_name']; ?></td>
				<td><?php echo $tupple3['n_gender']; ?></td>
				<td><?php echo $tupple3['room_no']; ?></td>
			</tr>
			<?php
		}

		?>
</table>
</div>
<div class="table">
<h3>DRIVER</h3>
<table style="text-align: center; " border="0" width="700" cellpadding="5" cellspacing="5">
		<tr align="center" bgcolor="#864ede">
			<td><font color="white">ID</font></td>
			<td><font color="white">DRIVER NAME</font></td>
			<td><font color="white">GENDER</font></td>
			<td><font color="white">SHIFT</font></td>
			<td><font color="white">AMBULANCE NUM</font></td>
			<td><font color="white">CONTACT</font></td>


		</tr>
		<?php 

		$DRIV="select dr_id,dr_f_name,dr_l_name,dr_gender,am_num,dri_contact,shift from driver natural join dr_contact";

		$query4=mysqli_query($cone,$DRIV);

		while ($tupple4=mysqli_fetch_array($query4)) {
			?>
			<tr align="center" bgcolor="#C0C0C0">
				<td><?php echo $tupple4['dr_id']; ?></td>
				<td><?php echo $tupple4['dr_f_name']." ".$tupple4['dr_l_name']; ?></td>
				<td><?php echo $tupple4['dr_gender']; ?></td>
				<td><?php echo $tupple4['shift']; ?></td>
				<td><?php echo $tupple4['am_num']; ?></td>
				<td><?php echo $tupple4['dri_contact']; ?></td>
			</tr>
			<?php
		}

		?>
</table>
</div>
</body>
</html>
