<!DOCTYPE html>
<html>

<head>
    <?php
    include "navbar.php";
    ?>
</head>
<style>
    .butbox {
        width: 639px;
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
        <button type="button" class="togbtn" onclick="cbt()" style="width: 200px; color: black">Combat Store</button>
        <button type="button" class="togbtn" onclick="stc()" style="width: 213px;color: black">Static Store</button>
        <button type="button" class="togbtn" onclick="add_new()" style="width: 213px;color: black">Add Item</button>

    </div>
    <div id="cbt" style="display: block;">
        <?php
        include "cbt_store.php"
        ?>
    </div>
    <div id="stc" style="display: none;">
        <?php
        include "stc_store.php"
        ?>
    </div>
    <div id="add_new" style="display: none;">
        <?php
        include "add_item.php"
        ?>
    </div>
    </div>

    <!-- End Contact Section -->
    <script>
        var x = document.getElementById("cbt");
        var y = document.getElementById("stc");
        var a = document.getElementById("add_new");
        var z = document.getElementById("bton");

        function stc() {
            z.style.left = "+213px"
            y.style.display = "block";
            x.style.display = "none";
            a.style.display = "none";
        }

        function cbt() {
            z.style.left = "+0px"
            x.style.display = "block";
            y.style.display = "none";
            a.style.display = "none";
        }

        function add_new() {
            z.style.left = "+426px"
            x.style.display = "none";
            y.style.display = "none";
            a.style.display = "block";
        }
    </script>

</body>

</html>