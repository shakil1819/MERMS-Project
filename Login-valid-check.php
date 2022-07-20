<?php
include_once 'database.php';
include "session.php";
if (isset($_POST['save'])) {
    $userid = $_POST['userid'];
    $pass = $_POST['pass'];
    $res = 0;
    $stid = oci_parse($conn, 'SELECT * FROM shop');
    oci_execute($stid);
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
        if ($row['SHOP_ID'] == $userid && $row['SHOP_PASSWORD'] == $pass) {
            $res = 1;
            $id = $row['SHOP_ID'];
            break;
        }
    }
    if ($res == 1) {
        //session_start();
        $_SESSION['slogin'] = true;
        $_SESSION['sid'] = $id;
        $_SESSION['suserid'] = $userid;
        $_SESSION['spass'] = $password;
        $_SESSION['sname'] = $row['SHOP_NAME'];
        header("Location: manager.php");
        echo "<script>alert('Sign in successful as a Shop')</script>";
        exit();
    }
    $stid = oci_parse($conn, 'SELECT * FROM unit');
    oci_execute($stid);
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
        if ($row['UNIT_ID'] == $userid && $row['UNIT_PASSWORD'] == $pass) {
            $res = 2;
            //session_start();
            $_SESSION['uid'] = $row['UNIT_ID'];
            $_SESSION['uname'] = $row['UNIT_NAME'];
            $_SESSION['uloc'] = $row['LOC'];
            $_SESSION[$_SESSION['uid']] = $_SESSION['uid'];
            break;
        }
    }
    if ($res == 2) {
        $_SESSION['ulogin'] = true;
        $_SESSION['uuserid'] = $userid;
        header("Location: user_home.php");
        echo "<script>alert('Sign in successful as a Unit')</script>";
        exit();
    }
    $stid = oci_parse($conn, 'SELECT * FROM store');
    oci_execute($stid);
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
        if ($row['STORE_ID'] == $userid && $row['STORE_PASSWORD'] == $pass) {
            $res = 3;
            //session_start();
            $_SESSION['srid'] = $row['STORE_ID'];
            $_SESSION['srname'] = $row['STORE_NAME'];
            break;
        }
    }
    if ($res == 3) {
        $_SESSION['srlogin'] = true;
        $_SESSION['srserid'] = $userid;
        header("Location: manager.php");
        echo "<script>alert('Sign in successful as a Store')</script>";
        exit();
    }
    $stid = oci_parse($conn, 'SELECT * FROM admin');
    oci_execute($stid);
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
        //echo $row[''];
        if ($row['ADMIN_ID'] == $userid && $row['PASSWORD'] == $pass) {
            $res = 4;
            //session_start();
            $_SESSION['id'] = $row['ADMIN_ID'];
            break;
        }
    }
    if ($res == 4) {
        //$_SESSION['mlogin'] = true;
        $_SESSION['username'] = $userid;
        header("Location: admin/index.php");
        echo "<script>alert('Sign in successful as admin...')</script>";
        exit();
    } else {
        //header("Location: login.php");

        header("Location: index.php");
        echo "Wrong username or userid";
        exit();
    }
}
