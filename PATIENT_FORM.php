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
<h1 align="center"><b>FILL THE FOLLOWING FORM</b></h1>
</div>
<form action="acadamics.php" method="POST">
<div class="table">
<table algin="center" border="0" width="700" height="500" cellpadding="5" cellspacing="5">
	<tr>
		<td><b>PATIENT NAME<span class="star">*</span></b></td>
		<td><input type="text" id="name" placeholder="PATIENT NAME" name="name" required></td>
	</tr>
	<tr>
		<td><B>ADDRESS<span class="star">*</span></B></td>
		<td><input type="text" id="address" name="address" placeholder="ADDRESS"  required></TEXTAREA></td>
	</tr>
	<tr>
		<td><B>BIRTH DATE<span class="star">*</span></B></td>
		<td><input type="date" id="dob" name="dob" required></td>
	</tr>
	<tr>
		<td><B>MOBILE NUMBER 1<span class="star">*</span></B></td>
		<td><input type="tel" name="mobile" id="mobile" pattern="[0-9]{10}" required></td>
	</tr>
	<tr>
		<td><B>GENDER<span class="star">*</span></B></td>
		<td><select id="gender" name="gender">
				<option>MALE</option>
				<option>FEMALE</option>
			</select></td>
	</tr>
	<tr>
		<td><B>DOCTOR NAME<span class="star">*</span></B></td>
		<td>
			<select id="doc_id" name="doc_id">
				<?php


				$doc_query="select d_id,d_f_name,d_l_name from doctor";

				$result= mysqli_query($cone,$doc_query);

				while ($out= mysqli_fetch_array($result)) {
					?> <option value="<?php echo $out['d_id'] ?>"><?php echo $out['d_id'].".".$out['d_f_name']." ".$out['d_l_name']; ?></option>
					<?php
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td><B>TREATMENT<span class="star">*</span></B></td>
		<td>
			<select id="treatment" name="treatment">
				<?php

				$tre_temp="select t_name from treatment";

				$query_tre=mysqli_query($cone,$tre_temp);

				while ($re=mysqli_fetch_array($query_tre)) {
					?> <option value="<?php echo $re['t_name'] ?>"><?php echo $re['t_name']; ?></option>
					<?php
				}

				?>
			</select>
		</td>
	</tr>
	<tr>
		<td><B>ROOM NO<span class="star">*</span></B></td>
		<td>
			<select onclick="num()" id="room_no" name="room_no">
				<?php

				$room_temp="select room_no from rooms where pa_id is null";

				$query_room=mysqli_query($cone,$room_temp);

				while ($results=mysqli_fetch_array($query_room)) {
					?> <option value="<?php echo $results['room_no'] ?>"><?php echo $results['room_no']; ?></option>
					<?php
				}

				?>
			</select>
		</td>
	</tr>
	<TR>
	<TD><button type="submit" name="submit">SUBMIT</button>&nbsp&nbsp&nbsp&nbsp<button type="reset" name="reset">RESET</button></TD>
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



<?php


	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$dob = $_POST['dob'];
		$mobile = $_POST['mobile'];
		$gender = $_POST['gender'];
		$doc_id = $_POST['doc_id'];
		$treatment = $_POST['treatment'];
		$room_no = $_POST['room_no'];

		$query = "insert into patient(p_name,p_address,dob,contact_no,p_gender,d_id,t_name,room_no) values('$name','$address','$dob','$mobile','$gender','$doc_id','$treatment','$room_no')";
		mysqli_query($cone,$query);

		$query2="update rooms set pa_id=(select p_id from patient where room_no='$room_no') where room_no='$room_no'";

		$res = mysqli_query($cone,$query2);

		if($res){
			?>
			<script type="text/javascript">
				
				alert("DATA INSERTED SUCCESSFULLY!!");
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
				
				alert("DATA NOT INSERTED SUCCESSFULLY!!");
			</script>
			<?php
		}

	}
?>