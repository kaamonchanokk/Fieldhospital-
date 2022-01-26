<form method="get" action="">

<label>วันที่ <input type="date" name="Date_Te"
        value="<?php echo $telemedicineList->Date_Te;?>"/></label><br><br><br>

 <label>ชื่อผู้ป่วย<select name="P_Te">
    <?php foreach($personList as $p) {
        echo "<option value = $p->PS_id";
        if($p->PS_id==$telemedicineList->P_Te){echo " selected='selected'";}
         echo ">$p->PS_name</option>";}
    ?>
    </select></label><br> 


<label>อาการ <input type="text" name="M_Te"
        value="<?php echo $telemedicineList->M_Te;?>"/></label><br><br><br>

<label>อุณหภูมิ <input type="text" name="Tem_Te"
        value="<?php echo $telemedicineList->Tem_Te;?>"/></label><br><br><br>

<input type="hidden"name="controller"value="telemedicine"/>
<input type="hidden" name="oldid" value="<?php echo $telemedicineList->ID_Te; ?>"/>
<button type= "submit"name="action"value="index">back</button>
<button type= "submit"name="action"value="update">update</button>

</form>