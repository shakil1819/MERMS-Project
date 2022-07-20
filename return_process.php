<?php
include('database.php');
//include('security.php');




if (isset($_POST['complete_btn'])) {

    $_SESSION['reqid'] = $_POST['complete_id'];

    $id = $_SESSION['reqid'];
    $state = $_POST['state'];

    $query = oci_parse($conn, "declare
                            a varchar2(12);
                            b date;
                            begin
                            create_return(a,'$id','$state',b);
                            end;");

    $result = oci_execute($query);
    if ($result) {
        header("Location: repair_info.php");
        echo "<script>alert('Data added Successfully !')</script>";
        exit();
    }
}
