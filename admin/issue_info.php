<?php
include('includes/header.php');
include('includes/security.php');
//include('security.php');




if (isset($_POST['approved_btn'])) {

    $_SESSION['reqid'] = $_POST['approved_id'];

    $id = $_SESSION['reqid'];
    $status = 'ACCEPTED';

    $query = oci_parse($connection, "declare
                            a varchar2(50);
                            b date;
                            begin
                            create_issue(a,'$id','$status',b);
                            end;");

    $result = oci_execute($query);
    if ($result) {
        header("Location: demand_info.php");
        echo "<script>alert('Data added Successfully !')</script>";
        exit();
    }
}




if (isset($_POST['pending_btn'])) {

    $_SESSION['reqid'] = $_POST['pending_id'];

    $id = $_SESSION['reqid'];
    $status = 'PENDING';

    $query = oci_parse($connection, "declare
                            a varchar2(50);
                            begin
                            create_issue_p(a,'$id','$status');
                            end;");

    $result = oci_execute($query);
    if ($result) {
        header("Location: demand_info.php");
        echo "<script>alert('Data added Successfully !')</script>";
        exit();
    }
}

?>


//$id=$_SESSION['reqid'];


//echo $id;