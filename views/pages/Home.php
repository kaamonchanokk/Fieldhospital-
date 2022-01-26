<!DOCTYPE html>
<style>
html,
body {
	height: 100%;
}

body {
	margin: 0;
	background: linear-gradient(45deg, #49a09d, #5f2c82);
	font-weight: 100;
}

.container {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}
div {
    text-align : center;
}
.block-1 {
	width: 200px;
	height: 180px;
	margin: 20px;
	background: #FFFFFF;
    display: inline-block;
    border-radius: 25px;
	box-shadow: 0 3px 6px rgba(0,0,0,0.75);
}
.block-2 {
	width: 200px;
	height: 180px;
	margin: 20px;
	background: #04FF00;
    display: inline-block;
    border-radius: 25px;
	box-shadow: 0 3px 6px rgba(0,0,0,0.75);
}
.block-3 {
	width: 200px;
	height: 180px;
	margin: 20px;
	background: #FFF700;
    display: inline-block;
    border-radius: 25px;
	box-shadow: 0 3px 6px rgba(0,0,0,0.75);
}
.block-4 {
	width: 200px;
	height: 180px;
	margin: 20px;
	background: #FF0000;
    display: inline-block;
    border-radius: 25px;
	box-shadow: 0 3px 6px rgba(0,0,0,0.75);
}
.a {
  font-size: 40px;
  color:black;
}
.b {
  font-size: 15px;
  color:black;
}
img {
	box-shadow: 0 3px 6px rgba(0,0,0,0.75);
}
</style>
<html>
    <body>
        <br>
        <center><img src="https://sv1.picz.in.th/images/2021/11/07/uXdMnv.png" width="1109" height="348" ></center><br>
        <div>
        <div class="block-1"> <p class="b"><?php echo "<br> จำนวนเตียงที่เหลือ"; ?></p><p class="a"><?php echo "$testlist[0]"; ?></p></div>
		<div class="block-2"> <p class="b"><?php echo "<br> จำนวนเตียงสีเขียวที่เหลือ"; ?></p><p class="a"><?php echo "$testlist[1]"; ?></p></div>
		<div class="block-3"> <p class="b"><?php echo "<br> จำนวนเตียงสีเหลืองที่เหลือ"; ?></p><p class="a"><?php echo "$testlist[2]"; ?></p></div>
        <div class="block-4"> <p class="b"><?php echo "<br> จำนวนเตียงสีแดงที่เหลือ"; ?></p><p class="a"><?php echo "$testlist[3]"; ?></p></div>
        </div>
    </body>
</html>