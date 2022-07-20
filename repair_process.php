<?php
include_once 'database.php';
if (isset($_POST['save'])) {
    $eqpt = $_POST['eqpt'];
    $pri = $_POST['pri'];


    $query = oci_parse($conn, "declare
								a varchar2(12);
                                b date;
							    begin
								create_repair(a,'$eqpt','$pri',b);
								end;");

    $result = oci_execute($query);
    if ($result) {
        header("Location: user_repair.php");
        echo "<script>alert('Data added Successfully !')</script>";
        exit();
    }
}
