<html>
<head>
<title>DETAILS OF THE STUDENTS</title>
<?php
include 'connection.php';
?>
<?php


	if (isset($_POST['submit']))
	{
		$p_id = $_POST['p_id'];

		$query = "update patient set d_discharged=now() where p_id='$p_id'";
		$res = mysqli_query($cone,$query);

		$query2="update rooms set pa_id=null where pa_id=$p_id";
		mysqli_query($cone,$query2);
	}
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
<body>
<div class="header">
<h1 align="center"><b>DISCHARGE FORM</b></h1>
</div>
<div class="table">
<h3>PATIENT DETAILS</h3>
<FORM action="dishcarge.php">
<table style="text-align: center; " border="0" width="700" cellpadding="5" cellspacing="5">
		<tr align="center" bgcolor="#864ede">
			<td><font color="white">PATIENT ID</font></td>
			<td><font color="white">PATIENT NAME</font></td>
			<td><font color="white">GENDER</font></td>
			<td><font color="white">TREATMENT</font></td>
			<td><font color="white">DOCTOR NAME</font></td>
			<td><font color="white">JOINING DATE</font></td>
			<td><font color="white">DISCHARGE DATE</font></td>


		</tr>
		<?php 

		$pat="select p_id,p_name,p_gender,t_name,d_id,d_addmitted,d_discharged from patient where p_id='$p_id'";
		$query1=mysqli_query($cone,$pat);
		$tupple1=mysqli_fetch_array($query1);
		$docname="select d_f_name,d_l_name from doctor where d_id=".$tupple1['d_id'];
		$query2=mysqli_query($cone,$docname);
		$tupple2=mysqli_fetch_array($query2);
		//$roombill="select cost_p_d from rooms where pa_id=".$tupple1['p_id'];
		//$query3=mysqli_query($cone,$roombill);
		//$tupple3=mysqli_fetch_array($query3);
	//	$t_c="select t_cost from treatment where t_name=".$tupple1['t_name'];
	//	$query4=mysqli_query($cone,$t_c);
	//	$tupple4=mysqli_fetch_array($query4);
	//	$nfd="select DATEDIFF(ifnull(p.d_discharged,NOW()),p.d_addmitted) AS DIFF FROM patient WHERE p_id =".$tupple1['p_id'];
	//	$query5=mysqli_query($cone,$nfd);
	//	$tupple5=mysqli_fetch_array($query5);
	//	$rent= $roombill['cost_p_d']*$nfd['DIFF'] + $t_c['t_cost'];
			?>
			<tr align="center" bgcolor="#C0C0C0">
				<td><?php echo $tupple1['p_id']; ?></td>
				<td><?php echo $tupple1['p_name']; ?></td>
				<td><?php echo $tupple1['p_gender']; ?></td>
				<td><?php echo $tupple1['t_name']; ?></td>
				<td><?php echo "Dr.".$tupple2['d_f_name']." ".$tupple2['d_l_name']; ?></td>
				<td><?php echo $tupple1['d_addmitted']; ?></td>
				<td><?php echo $tupple1['d_discharged']; ?></td>
			</tr>
</table>
<button type="submit" onclick="window.print()">PRINT</button>
</FORM>
</div>
</body>
</html>
