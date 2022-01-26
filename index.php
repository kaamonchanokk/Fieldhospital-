<?php
if(isset($_GET['controller']) && isset($_GET['action'])) 
{  
     $controller = $_GET['controller'];
    $action = $_GET['action'];

}else

{   
    $controller= 'pages'; 
    $action = 'home';

} 
?>
<html>
<style>
@import url('https://fonts.googleapis.com/css2?family=K2D:wght@500&display=swap');
html,
body {
	height: 100%;
}

body {
	margin: 0;
	background: linear-gradient(45deg, #49a09d, #5f2c82);
	font-family: 'K2D', sans-serif;
	font-weight: 100;
    background-repeat: no-repeat;
    background-attachment: fixed; 
}

.container {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    padding: 14px 16px;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}
</style>
<head></head>
<body>
<center>
    <ul>
    <li><a href="?controller=pages&action=home">🏡หน้าหลัก</a></li>
    <li><a href="?controller=fieldhospital&action=index">โรงพยาบาลสนาม</a></li>
    <li><a href="?controller=fieldhospitalbed&action=index">เตียงที่รองรับแต่ละจุด</a></li>
    <li><a href="?controller=supportpatient&action=index">บันทึกการรองรับผู้ป่วย</a></li>
    <li><a href="?controller=telemedicine&action=index">บันทึกผู้ป่วย</a></li>
    <li><a style="position:relative;left:600px;" href="?controller=pages&action=profile">👩🏻ประวัติส่วนตัว</a></li>
    <style type="text/css">body, a:hover {cursor: url(http://cur.cursors-4u.net/games/gam-11/gam1088.cur), progress !important;}
    </style><a href="http://www.cursors-4u.com/cursor/2010/02/24/flyff-chinese-index-finger-point.html" target="_blank" title="Flyff Chinese Index Finger Point"></a>
    <ul>
</center>
</body>
</html>
<?php require_once("./routes.php"); ?>