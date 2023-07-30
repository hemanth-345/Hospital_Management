<?php
include 'connection.php';

$function="delimeter $$
CREATE FUNCTION bill (pid int)
returns int
begin
	declare
	ans int;
	CURSOR costperday IS SELECT cost_p_d FROM rooms ;
	CURSOR treatmentcost IS SELECT t_cost FROM treatment WHERE t_name = (SELECT t_name FROM patient WHERE p_id = pid  );
	CURSOR noofdays IS SELECT DATEDIFF(ifnull(p.d_discharged,NOW()),p.d_addmitted) AS DIFF FROM patient p WHERE p_id =pid;

	temp int;
	temp1 int;
	temp2 number;
	answer number;

        open costperday;
            fetch costperday into temp;
        close costperday;
        open treatmentcost;
            fetch treatmentcost into temp1;
        close treatmentcost;
        open noofdays;
            fetch npoofdays into temp3;
        close noofdays;

        answer := (temp*temp2)+temp1;
        ans := answer;
    
Return ans;
end $$
delimeter ;";

$name=mysqli_query($cone,$function);
if(!$name) {
    echo "function not created".mysqli_error($cone);
}

$trigger="create or replace trigger datavalidation
befor insert on patient for each row
declare
     temp1 patient.d_id%type;
     temp1 patient.t_name%type;

begin
    select depatment_name into temp1 from doctor where d_id = :new.d_id;
    select depatment_name into temp2 from treatment where T_name = :new.T_name;
    
    if(temp1 != temp2) then
        delete from patient where pid = :new.pid;
        dbms_output.put_line('validation error for treatment and doctor');
    end if;
end datavalidation;";

mysqli_query($cone,$trigger);
?>