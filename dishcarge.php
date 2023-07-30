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
<body>
<div class="header">
<h1 align="center"><b>CHOOSE PATIENT</b></h1>
</div>
<form action="discharge_detail.php" method="POST">
<div class="table">
<table algin="center" border="0" width="700" height="500" cellpadding="5" cellspacing="5">
	<tr>
		<td><B>PATIENT ID<span class="star">*</span></B></td>
		<td>
			<select id="p_id" name="p_id">
				<?php


				$p_query="select p_id,p_name from patient where d_discharged is null";

				$result= mysqli_query($cone,$p_query);

				while ($out= mysqli_fetch_array($result)) {
					?> <option value="<?php echo $out['p_id'] ?>"><?php echo $out['p_id'].".".$out['p_name']; ?></option>
					<?php
				}
				?>
			</select>
		</td>
	</tr>
	<TR>
	<TD><button type="submit" name="submit">DISCHARGE</button>&nbsp&nbsp&nbsp&nbsp<button type="reset" name="reset">RESET</button></TD>
</TR>
</table>
</div>
</form>
<br><br><br><br><br><br><br>
<p id="demo"></p>
<div class="footer">
	<p><b><marquee>THE ABOVE INFORMATION IS HIGHLY CONFIDENTIAL AND NOT BE LEAKED IN ANY MANNER</marquee></b></p>
</div>
</body>
</html>


