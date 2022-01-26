<!DOCTYPE html>
<html>
<head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Sarabun&display=swap');
div {
    text-align : left;
    display: block;
    margin: auto;
    font-size: 20px;
    
    
}
.block-1 {
	width: 1000px;
	height: 400px;
	background: #FFFFFF;
    box-shadow: 0 3px 6px rgba(0,0,0,0.75);
    border-radius: 10px;
}
.a {
  font-size: 40px;
  color:white;
}

* {
  box-sizing: border-box;
}
label {
  position:relative;
  left:200px;
  padding: 12px 12px 12px 0;
  display: inline-block;
}
input[type=text], select, textarea {
  width: 400px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=number] {
  width: 400px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
.col-25 {
  float: left;
  width: 50%;
  margin-top: -10px;
}
.col-75 {
  float: left;
  width: 20%;
  margin-top: 0px;
}

.buttonA {
  display: inline-block;
  text-decoration:none;
  font-family: 'Sarabun', sans-serif;
  padding: 10px 10px;
  font-size: 15px;
  color: #fff;
  background-color: #00CA12;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #009F0F;
  position:relative; 
  left:250px;
}

.buttonA:hover {background-color: #00A90F}

.buttonA:active {
  background-color: #00A90F;
  box-shadow: 0 5px #009F0F;
  transform: translateY(4px);
}
.buttonB {
  display: inline-block;
  text-decoration:none;
  font-family: 'Sarabun', sans-serif;
  padding: 10px 10px;
  font-size: 15px;
  color: #fff;
  background-color: #FF1B00;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #D81700;
  position:relative; 
  left:250px;
}

.buttonB:hover {background-color: #E31800}

.buttonB:active {
  background-color: #E31800;
  box-shadow: 0 5px #D81700;
  transform: translateY(4px);
}
</style>
</head>

<body>
<form method="get" action="">
<center><p class="a">เพิ่มจำนวนเตียง</p></center>
<br>
<div class="block-1">
<br>
<br>
<div class="col-25"><label>ชื่อโรงพยาบาลสนาม</label></div><div class="col-75"><select name="Name_Fh"><br><br><br>
<?php foreach($fieldhospitalList as $fh) {echo "<option value = $fh->ID_Fh>
    $fh->Name_Fh</option>";}?>
    </select></div><br><br><br>

    <div class="col-25"><label>รองรับสี</label></div><div class="col-75"><select name="C_Hb"><br><br><br>
<?php foreach($colourList as $c) {echo "<option value = $c->C_Id>
    $c->C_Name</option>";}?>
    </select></div><br><br><br>
    
<div class="col-25"><label>จำนวนรับสูงสุด</label></div><div class="col-75"><input type="number" name="Max_Hb"/>



<input type="hidden"name="controller"value="fieldhospitalbed"/><br><br><br>
<button class="buttonA" type= "submit"name="action"value="addFieldhospitalbed">ลงทะเบียน</button>
<button class="buttonB" type= "submit"name="action"value="index">ย้อนกลับ</button>

</form>
</body>
</html>