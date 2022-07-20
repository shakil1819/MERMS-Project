<?php
include('security.php');

if (isset($_POST['registerbtn'])) {
    $userid = $_POST['adminid'];
    $name = $_POST['name'];
    $rank = $_POST['rank'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    //$query=oci_parse($connection,"INSERT INTO admin (username,email,password) values ('$username','$email','$password')");
    //$query_run=oci_execute($query);

    $email_query = oci_parse($connection, "SELECT * FROM admin WHERE admin_id='$userid'");
    $email_query_run = oci_execute($email_query);
    if (($row = oci_fetch_array($email_query, OCI_BOTH)) != false) {
        $_SESSION['status'] = "ID Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    } else {
        if ($password === $cpassword && $name != "" && $rank != "") {
            $query = oci_parse($connection, "INSERT INTO admin (Admin_ID,name,rank,password) values ('$userid','$name','$rank','$password')");
            $query_run = oci_execute($query);

            if ($query_run) {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            } else {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');
            }
        } else {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');
        }
    }
}


//admin edit
if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $rank = $_POST['edit_rank'];
    $password = $_POST['edit_password'];

    $query = oci_parse($connection, "Update admin set name='$username',rank='$rank',password='$password' where admin_id='$id'");
    $query_run = oci_execute($query);

    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Updated';
        header('location:register.php');
    } else {
        $_SESSION['status'] = 'Your Data is Not Updated';
        header('location:register.php');
    }
}

if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];
    $query = oci_parse($connection, "Delete  from admin where id='$id'");
    $query_run = oci_execute($query);
    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Deleted';
        header('location:register.php');
    } else {
        $_SESSION['status'] = 'Your Data is Not Deleted';
        header('location:register.php');
    }
}

if (isset($_POST['login_btn'])) {
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = oci_parse($connection, "Select * from admin where email='$email_login' and password='$password_login'");
    $query_run = oci_execute($query);

    if (oci_fetch_all($query, $res)) {
        $_SESSION['username'] = $email_login;
        header('Location:index.php');
    } else {
        $_SESSION['status'] = 'Email id/ Password is Invalid';
        header('Location: login.php');
    }
}

if (isset($_POST['go_back_btn'])) {
    header('Location: ../index.php');
}

if (isset($_POST['logout_btn'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('Location:../login.php');
}


//Inserting new unit
if (isset($_POST['register_unit_btn'])) {
    $unitid = $_POST['unitid'];
    $unitname = $_POST['unitname'];
    $location = $_POST['location'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = oci_parse($connection, "SELECT * FROM unit WHERE unit_id='$unitid' ");
    $email_query_run = oci_execute($email_query);
    if (($row = oci_fetch_array($email_query, OCI_BOTH)) != false) {
        $_SESSION['status'] = "User Already Exists";
        $_SESSION['status_code'] = "error";
        header('Location: units.php');
    } else {
        if ($password === $cpassword && $unitname != "" && $unitid != "") {
            $query = oci_parse($connection, "INSERT into unit values('$unitid','$password','$unitname','$location')");
            $query_run = oci_execute($query);

            if ($query_run) {
                echo "Saved";
                $_SESSION['status'] = "Unit Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: units.php');
            } else {
                $_SESSION['status'] = "Unit Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: units.php');
            }
        } else {
            echo "Password and Confirm Password Does Not Match";
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: units.php');
        }
    }
}

//Inserting new shop
if (isset($_POST['register_shop_btn'])) {
    $shopid = $_POST['shopid'];
    $shopname = $_POST['shopname'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = oci_parse($connection, "SELECT * FROM shop WHERE shop_id='$shopid' ");
    $email_query_run = oci_execute($email_query);
    if (($row = oci_fetch_array($email_query, OCI_BOTH)) != false) {
        $_SESSION['status'] = "Shop Already Exists";
        $_SESSION['status_code'] = "error";
        header('Location: shops.php');
    } else {
        if ($password === $cpassword && $shopname != "" && $shopid != "") {
            $query = oci_parse($connection, "INSERT into shop(shop_id, shop_password, shop_name) values('$shopid','$password','$shopname')");
            $query_run = oci_execute($query);

            if ($query_run) {
                echo "Saved";
                $_SESSION['status'] = "Shop Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: shops.php');
            } else {
                $_SESSION['status'] = "Shop Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: shops.php');
            }
        } else {
            echo "Password and Confirm Password Does Not Match";
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: shops.php');
        }
    }
}

//Deleting medical officer
if (isset($_POST['delete_mo_btn'])) {
    $id = $_POST['delete_id'];
    $query = oci_parse($connection, "Delete  from medical_officer where medical_officer_id='$id'");
    $query_run = oci_execute($query);
    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Deleted';
        header('location: CreateMedicalOfficer.php');
    } else {
        $_SESSION['status'] = 'Your Data is Not Deleted';
        header('location: CreateMedicalOfficer.php');
    }
}

//Updating unit
if (isset($_POST['update_unit_btn'])) {
    $id = $_POST['edit_unit_id'];
    $unitname = $_POST['edit_unitname'];
    $loc = $_POST['edit_loc'];
    $password = $_POST['edit_password'];

    $query = oci_parse($connection, "Update unit set unit_name='$unitname', loc='$loc', unit_password='$password' where unit_id='$id'");
    $query_run = oci_execute($query);

    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Updated';
        header('location:units.php');
    } else {
        $_SESSION['status'] = 'Your Data is Not Updated';
        header('location:units.php');
    }
}

//Unit deletion
if (isset($_POST['delete_unit_btn'])) {
    $id = $_POST['delete_unit'];
    $query = oci_parse($connection, "Delete from unit where unit_id='$id'");
    $query_run = oci_execute($query);
    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Deleted';
        header('location: units.php');
    } else {
        $_SESSION['status'] = 'Your Data is Not Deleted';
        header('location: units.php');
    }
}

//Unit deletion
if (isset($_POST['delete_shop_btn'])) {
    $id = $_POST['delete_shop'];
    $query = oci_parse($connection, "Delete from shop where shop_id='$id'");
    $query_run = oci_execute($query);
    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Deleted';
        header('location: shops.php');
    } else {
        $_SESSION['status'] = 'Your Data is Not Deleted';
        header('location: shops.php');
    }
}
//updating shop

if (isset($_POST['update_shop_btn'])) {
    $shopid = $_POST['edit_shopid'];
    $shopname = $_POST['edit_shopname'];
    $password = $_POST['edit_password'];


    $query = oci_parse($connection, "Update shop set shop_password='$password', shop_name='$shopname' where shop_id='$shopid'");
    $query_run = oci_execute($query);

    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Updated';
        header('location:shops.php');
    } else {
        $_SESSION['status'] = 'Your Data is Not Updated';
        header('location:shops.php');
    }
}

//Creating a new event
if (isset($_POST['register_event_btn'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    $query = oci_parse($connection, "SELECT * FROM event WHERE event_name='$name' ");
    $query_run = oci_execute($query);
    if (($row = oci_fetch_array($query, OCI_BOTH)) != false) {
        $_SESSION['status'] = "Name Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: Event.php');
    } else {
        if ($name != "" && $location != "" && $startdate != "" && $enddate != "") {
            $query = oci_parse($connection, "declare
            a nvarchar2(50);
            begin
            create_event(a,upper('$name'),upper('$location'),to_date('$startdate','yyyy-mm-dd'),to_date('$enddate','yyyy-mm-dd'));
            end;");
            $query_run = oci_execute($query);

            if ($query_run) {
                // echo "Saved";
                $_SESSION['status'] = "New Event Added";
                $_SESSION['status_code'] = "success";
                header('Location: events.php');
            } else {
                $_SESSION['status'] = "Event Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: events.php');
            }
        } else {
            $_SESSION['status'] = "Please fill up the all the information";
            $_SESSION['status_code'] = "warning";
            header('Location: events.php');
        }
    }
}

//Delete event
if (isset($_POST['delete_event_btn'])) {
    $id = $_POST['delete_id'];
    $query = oci_parse($connection, "Delete  from event where event_id='$id'");
    $query_run = oci_execute($query);
    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Deleted';
        header('location: events.php');
    } else {
        $_SESSION['status'] = 'Your Data is Not Deleted';
        header('location: events.php');
    }
}

//Updating Event
if (isset($_POST['update_event_btn'])) {
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $location = $_POST['edit_location'];
    $starttime = $_POST['edit_starttime'];
    $endtime = $_POST['edit_endtime'];

    $query = oci_parse($connection, "Update event set event_name='$name',event_location='$location',event_startdate=to_date('$starttime','dd-mon-yyyy'),event_enddate=to_date('$endtime','dd-mon-yyyy')
    where event_id='$id'");
    $query_run = oci_execute($query);

    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Updated';
        header('location:events.php');
    } else {
        $_SESSION['status'] = 'Your Data is Not Updated';
        header('location:events.php');
    }
}


if (isset($_POST['approved_btn'])) {
    $id = $_POST['approved_id'];
    $reqid = $id;

    //$username=$_POST['edit_username'];
    //$email=$_POST['edit_email'];
    //$password=$_POST['edit_password'];

    $query = oci_parse($connection, "Update PURCHASE_REQUEST set purchase_request_status='ACCEPTED' where purchase_request_id='$id'");
    $query_run = oci_execute($query);

    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Updated';
        header('location:purchaseinfo.php');
    } else {
        $_SESSION['status'] = 'Your Data is Not Updated';
        header('location:purchaseinfo.php');
    }
}

if (isset($_POST['declined_btn'])) {
    $id = $_POST['declined_id'];
    //$username=$_POST['edit_username'];
    //$email=$_POST['edit_email'];
    //$password=$_POST['edit_password'];

    $query = oci_parse($connection, "Update PURCHASE_REQUEST set purchase_request_status='DECLINED' where purchase_request_id='$id'");
    $query_run = oci_execute($query);

    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Updated';
        header('location:purchaseinfo.php');
    } else {
        $_SESSION['status'] = 'Your Data is Not Updated';
        header('location:purchaseinfo.php');
    }
}

if (isset($_POST['appointed_btn'])) {
    $bagid = $_POST['appointed_id'];
    $reqbagid = $_POST['reqbagid'];
    $reqtype = $_POST['reqtype'];
    $reqgroup = $_POST['reqbloods'];


    //$username=$_POST['edit_username'];
    //$email=$_POST['edit_email'];
    //$password=$_POST['edit_password'];

    //echo "anika";
    $query = oci_parse($connection, "Update BLOOD_BANK set blood_request_id='$reqbagid' wherE blood_bank_blood_bag_id='$bagid'");
    $query_run = oci_execute($query);

    $query_string = "select MAX(blood_bank_total_no) from blood_bank
    where blood_bank_blood_type='$reqtype' and blood_bank_blood_group='$reqgroup'";
    $query = oci_parse($connection, $query_string);
    $query_run = oci_execute($query);

    echo $query_string;
    $row = oci_fetch_array($query);
    $noofblood = $row['MAX(BLOOD_BANK_TOTAL_NO)'] - 1;
    echo $noofblood;


    $query = oci_parse($connection, "UPDATE BLOOD_BANK SET blood_bank_total_no=$noofblood
                      where blood_bank_blood_type='$reqtype' and blood_bank_blood_group='$reqgroup'");
    $query_run = oci_execute($query);


    if ($_SESSION['pid'] == $_SESSION[$_SESSION['pid']]) {
        $query = oci_parse($connection, "update blood_bank set blood_bank_patient_id =(select purchase_person_id
                                  from purchase_request
                                  where purchase_request_id='$reqbagid') where blood_bank_blood_bag_id='$bagid'");
    } else {
        $patientid = $_SESSION[$_SESSION['pid']];
        $query = oci_parse($connection, "update blood_bank set blood_bank_patient_id ='$patientid' where blood_bank_blood_bag_id='$bagid'");
    }


    $query_run2 = oci_execute($query);

    if ($query_run2) {
        $_SESSION['success'] = 'Your Data is Updated';
        header('location:bloodbank.php');
    } else {
        $_SESSION['status'] = 'Your Data is Not Updated';
        header('location:bloodbank.php');
    }
}



if (isset($_POST['orgapproved_btn'])) {
    $id = $_POST['orgapproved_id'];
    $reqid = $id;

    //$username=$_POST['edit_username'];
    //$email=$_POST['edit_email'];
    //$password=$_POST['edit_password'];

    $query = oci_parse($connection, "Update PURCHASE_REQUEST set purchase_request_status='ACCEPTED' where purchase_request_id='$id'");
    $query_run = oci_execute($query);

    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Updated';
        header('location:orgpurchaseinfo.php');
    } else {
        $_SESSION['status'] = 'Your Data is Not Updated';
        header('location:orgpurchaseinfo.php');
    }
}

if (isset($_POST['orgdeclined_btn'])) {
    $id = $_POST['orgdeclined_id'];
    //$username=$_POST['edit_username'];
    //$email=$_POST['edit_email'];
    //$password=$_POST['edit_password'];

    $query = oci_parse($connection, "Update PURCHASE_REQUEST set purchase_request_status='DECLINED' where purchase_request_id='$id'");
    $query_run = oci_execute($query);

    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Updated';
        header('location:orgpurchaseinfo.php');
    } else {
        $_SESSION['status'] = 'Your Data is Not Updated';
        header('location:orgpurchaseinfo.php');
    }
}
