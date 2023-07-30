<?php

include 'connection.php';
				$p_query="select p_id,p_f_name,p_l_name from patient";

				$result= mysqli_query($cone,$p_query);
				
				while ($out= mysqli_fetch_array($result)) {
					?> <option value="<?php echo $out['p_id'] ?>"><?php echo $out['p_id'].".".$out['p_f_name']." ".$out['p_l_name']; ?></option>
					<?php
				}
				?>