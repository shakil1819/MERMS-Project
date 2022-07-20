<?php
include_once 'database.php';
if (isset($_POST['save'])) {
    $unit = $_POST['unit'];
    $item = $_POST['item'];
    $qty = $_POST['qty'];
    $pri = $_POST['pri'];


    $query = oci_parse($conn, "declare
								a varchar2(50);
                                b date;
							    begin
								create_demand(a,'$unit','$item','$qty','$pri',b);
								end;");

    $result = oci_execute($query);
    if ($result) {
        header("Location: user_demand.php");
        echo "<script>alert('Data added Successfully !')</script>";
        exit();
    }
}
