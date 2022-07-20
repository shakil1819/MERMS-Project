<!DOCTYPE html>
<html>

<head>
    <?php
    include "user_navbar.php";
    ?>
</head>
<style>
    .butbox {
        width: 426px;
        margin: 35px auto;
        position: relative;
        box-shadow: 0 0 20px 9px #ff61241f;
        border-radius: 30px;
    }

    .togbtn {
        padding: 10px 30px;
        cursor: pointer;
        background: transparent;
        border: 0;
        outline: none;
        position: relative;
    }

    #bton {
        top: 0;
        left: 0;
        position: absolute;
        width: 213px;
        height: 100%;
        background: linear-gradient(to right, #096b4f, #75DE87);
        border-radius: 30px;
        transition: 0.15s;
    }
</style>

<body style="background-color: #ffff;">
    <br><br>
    <div class="butbox">
        <div id="bton"></div>
        <button type="button" class="togbtn" onclick="status()" style="width: 200px; color: black">Repair Status</button>
        <button type="button" class="togbtn" onclick="repair()" style="width: 213px;color: black">New Order</button>
    </div>
    <div id="status" style="display: block;">
        <?php
        include "repair_status.php"
        ?>
    </div>
    <div id="dmd" style="display: none;">
        <?php
        include "repair.php"
        ?>
    </div>



    <!-- End Contact Section -->
    <script>
        var x = document.getElementById("status");
        var y = document.getElementById("dmd");
        var z = document.getElementById("bton");

        function repair() {
            z.style.left = "+213px"
            y.style.display = "block";
            x.style.display = "none";
        }

        function status() {
            z.style.left = "+0px"
            x.style.display = "block";
            y.style.display = "none";
        }
    </script>

</body>

</html>