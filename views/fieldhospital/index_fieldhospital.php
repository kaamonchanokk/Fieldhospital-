<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Sarabun&display=swap');
table {
  font-family: 'Sarabun', sans-serif;
  margin: 25px auto;
  border-collapse: collapse;
  border-radius:10px;
  overflow:hidden;
  background:white;
  border: none;
  border-bottom: 2px solid #005723;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1), 0px 10px 20px rgba(0, 0, 0, 0.05), 0px 20px 20px rgba(0, 0, 0, 0.05), 0px 30px 20px rgba(0, 0, 0, 0.05);
}
table tr:hover {
  background: #f4f4f4;
}
table tr:hover td {
  color: #000;
}
table th, table td {
  color: #555;
  border: none;
  padding: 12px 35px;
  border-collapse: collapse;
}
table th {
  background: #005723;
  color: #fff;
  text-transform: uppercase;
}
table th.last {
  border-right: none;
}
.form__input {
  color: #333;
  font-size: 15px;
  font-family: 'Sarabun', sans-serif;
  padding: 10px 10px;
  border-radius: 30px;
  background-color: rgb(255, 255, 255);
  border: none;
  position:relative;
  left:1200px;
  Top:5px;
}

.button {
  display: inline-block;
  font-family: 'Sarabun', sans-serif;
  padding: 10px 10px;
  font-size: 15px;
  color: #fff;
  background-color: #0080ff;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #005fbd;
  position:relative; 
  left:1200px;
}

.button:hover {background-color: #0070de}

.button:active {
  background-color: #0070de;
  box-shadow: 0 5px #005fbd;
  transform: translateY(4px);
}

.buttonA {
  display: inline-block;
  text-decoration:none;
  font-family: 'Sarabun', sans-serif;
  padding: 10px 10px;
  font-size: 15px;
  color: #fff;
  background-color: #0080ff;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #005fbd;
  position:relative; 
  left:1250px;
}

.buttonA:hover {background-color: #0070de}

.buttonA:active {
  background-color: #0070de;
  box-shadow: 0 5px #005fbd;
  transform: translateY(4px);
}

.buttonB {
  display: inline-block;
  text-decoration:none;
  font-family: 'Sarabun', sans-serif;
  padding: 10px 10px;
  font-size: 15px;
  color: #fff;
  background-color: #F3E800;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #CFC500;
}

.buttonB:hover {background-color: #DFD500}

.buttonB:active {
  background-color: #DFD500;
  box-shadow: 0 5px #CFC500;
  transform: translateY(4px);
}
.buttonC {
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
}

.buttonC:hover {background-color: #E31800}

.buttonC:active {
  background-color: #E31800;
  box-shadow: 0 5px #D81700;
  transform: translateY(4px);
}
</style>
</head>
<body>

<table border = 1>
<tr> 
<th>รหัสโรงพยาบาล</th>
<th>ชื่อโรงพยาบาล</th>
<th>ที่อยู่โรงพยาบาล</th>
<th>หน่วยงาน</th>
<th>วันที่เปิดให้บริการ</th>
<th>  </th>
<th>  </th>
</tr>
<div class="form__group">
<form class="example" method="get" action="">
        <input type="text" class="form__input" name="key" placeholder="ค้นหา" required="">
        <input type="hidden" name="controller" value="fieldhospital">
        <button class="button" type="submit" name="action" value="search">🔍</button></div>
</form>
<?php 
  foreach($fieldhospitalList as $fieldhospital_List)
{
    echo"<tr>
    <td>$fieldhospital_List->ID_Fh</td>
    <td>$fieldhospital_List->Name_Fh</td>
    <td>$fieldhospital_List->Address_Fh</td>
    <td>$fieldhospital_List->Name_A</td>
    <td>$fieldhospital_List->Date_Fh</td>";?>
    <td><a class="buttonB" href=?controller=fieldhospital&action=updateForm&<?php echo "ID_Fh=$fieldhospital_List->ID_Fh";?>>📝</a></td>
    <td><a class="buttonC" href=?controller=fieldhospital&action=deleteConfirm&<?php echo "ID_Fh=$fieldhospital_List->ID_Fh";?>>🗑️</a></td>
    </tr>
    <?php
}
echo "</table>";
?>
<a class="buttonA" href=?controller=fieldhospital&action=newFieldhospital>ลงทะเบียนโรงพยาบาลสนาม</a><br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>