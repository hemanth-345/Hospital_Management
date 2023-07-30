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
<form action="" method="POST">
<div class="table">
<table algin="center" border="0" width="700" height="500" cellpadding="5" cellspacing="5">
	<tr>
		<td><b>TOKEN<span class="star">*</span></b></td>
		<td>
		<?php
		$token='select count(record_no) token_no from record where app_date = CAST(CURRENT_TIMESTAMP AS DATE)';
			$ans= mysqli_query($cone,$token);
			$output= mysqli_fetch_array($ans);
			$token_ans=$output['token_no']+1;
			if($output['token_no']<11)
			{
				echo $token_ans;
			}
			else
			{
				echo "TOKENS ARE OVER";
			}
		?></td>
	</tr>
	<tr>
		<td><B>RECEPTIONIST<span class="star">*</span></B></td>
		<td>
			<select id="receptionist" name="receptionist">
				<?php


				$rec_query="select r_id,r_f_name,r_l_name from receptionist";

				$result1= mysqli_query($cone,$rec_query);

				while ($out1= mysqli_fetch_array($result1)) {

					?> <option value="<?php echo $out1['r_id'] ?>"><?php echo $out1['r_id'].".".$out1['r_f_name']." ".$out1['r_l_name']; ?>
					</option>
					<?php
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td><b>PATIENT NAME<span class="star">*</span></b></td>
		<td><input type="text" id="name" placeholder="PATIENT NAME" name="name" required></td>
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
		$rec=$_POST['receptionist'];
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$doc_id = $_POST['doc_id'];

		$query = "insert into record(r_id,patient_id,patient_name,pat_gender,d_id) values('$rec','$token_ans','$name','$gender','$doc_id')";
		$res = mysqli_query($cone,$query);

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