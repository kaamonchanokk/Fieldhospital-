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
	width: 700px;
	height: 450px;
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
input[type=date] {
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
  left:290px;
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
  left:290px;
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
<center><p class="a">ลบบันทึกอาการผู้ป่วย</p></center>
<br>
<div class="block-1">
<br><br>
<center><img src="https://sv1.picz.in.th/images/2021/11/08/uXGJQZ.png" width="163" height="169" ></center>
<center><p><b><?php echo "คุณต้องการลบรายการนี้หรือไม่?"; ?></b></p></center>
<center><p><?php echo "วันที่บันทึก : $telemedicineList->Date_Te"; ?></p></center>
<center><p><?php echo "ชื่อผู้ป่วย : $telemedicineList->PS_name"; ?></p></center>
<form method="get" action="">

    <input type="hidden" name="controller" value="telemedicine" />
    <input type="hidden" name="ID_Te" value="<?php echo $telemedicineList->ID_Te; ?>" />
    <button class="buttonA" type="submit" name="action" value="delete">ตกลง</button>
    <button class="buttonB" type="submit" name="action" value="index">ยกเลิก</button>
    
    
</form>
</div>

</body>
</html>