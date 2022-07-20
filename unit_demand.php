<!DOCTYPE html>
<html>
<head>
    <?php
include "navbar.php";
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
  background: linear-gradient(to right, #ff105f, #ffad06);
  border-radius: 30px;
  transition: 0.15s;
}
</style>
<body>
    <?php

$_SESSION['profile']=0;
$_SESSION['login']=0;
$_SESSION['donate']=0;
$_SESSION['buyer']=1;

    include "header-small.php";
    ?>
   <div class="butbox">
            <div id="bton"></div>
                <button type="button" class="togbtn" onclick="status()" style="width: 200px; color: black">Demand Status</button>
                <button type="button" class="togbtn" onclick="new_demand()" style="width: 213px;color: black">New Demand</button>
            </div>
	        <div id="status" style="display: block;">
                <?php
                    include "cbt_store.php"
                ?>
            </div>
            <div id="ndmd" style="display: none;">
                <?php
                    include "stc_store.php"
                ?>
            </div>
    </div>

        <!-- End Contact Section -->
    <script>
            var x = document.getElementById("status");
            var y = document.getElementById("ndmd");
            var z=  document.getElementById("bton");
        function new_demand(){
            z.style.left = "+213px"
            y.style.display="block";
            x.style.display = "none";
        }
        function status() {
            z.style.left = "+0px"
            x.style.display = "block";
            y.style.display = "none";
        }
    </script>    
    <?php
    include "footer.php"
    ?>
</body>
</html>