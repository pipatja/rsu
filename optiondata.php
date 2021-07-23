<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php
//1. เชื่อมต่อ database:
include('database connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM media2 ORDER BY id asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($connection, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='col-md-8'>";

echo '<hr>';

?>
  <h2>
  Example Call Option Selected from database
</h2>
<form action="http://devbanban.com/" method="post" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-3  control-label">
      Column member_name :  
    </div>
    <div class="col-sm-3">
  <select name="test" class="form-control" required>
    <option value="">-Choose-</option>
    <?php foreach($result as $results){?>
    <option value="<?php echo $results["name_media2"];?>">
      <?php echo $results["member_name"]; ?>
      </option>
    <?php } ?>
  </select>
</div>
<div class="col-sm-1">
  <button type="submit" class="btn btn-primary"> Action </button>
</div>
</form>
</div>
</div>
</div>

<?php 
mysqli_close($con);
?>