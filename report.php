<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href='index.php'>Back </a></p>
<?php
    /*กำหนด username password และ database name ของ mysql */
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "course_db";

    /*------เชื่อมต่อ Database----*/
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
      die("Connection Error: " . $conn->connect_error);
    }

   
 /*สร้างปุ่มสำหรับ Download ไฟล์ excel โดยกำหนดว่าเมื่อกดปุ่ม Downlaod แล้วจะทำงานที่ javascript function ชื่อว่า ExcelReport()*/
     echo "<a href='#' id='download_link' onClick='javascript:ExcelReport();''>Download</a>";
    echo "<table id='myTable'>";
         echo "<tr>";
                echo "<td>Room No.</td>";
                echo "<td>sales</td>";
                echo "<td>agent</td>";
                echo "<td>date1</td>";
                echo "<td>status1</td>";
                echo "<td>media1</td>";
                echo "<td>media2</td>";
                echo "<td>media3</td>";
                echo "<td>campaign</td>";
                echo "<td>คำนำหน้าชื่อ</td>";
                echo "<td>ชื่อ</td>";
                echo "<td>เบอร์ติดต่อ</td>";
                echo "<td>E-mail</td>";
                echo "<td>Id Line</td>";
                echo "<td>Date2</td>";
                echo "<td>cust-status</td>";
                echo "<td>Date3</td>";






        echo "</tr>";
    /*นำข้อมูลจากตาราง food มาแสดง*/
    $sql = "SELECT * FROM course";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
    {
        echo "<tr>";
            echo "<td>$row[room]</td>";
            echo "<td>$row[sales]</td>";
            echo "<td>$row[agent]</td>";
            echo "<td>$row[date1]</td>";
            echo "<td>$row[status1]</td>";
            echo "<td>$row[media1]</td>";
            echo "<td>$row[media2]</td>";
            echo "<td>$row[media3]</td>";
            echo "<td>$row[campaign]</td>";
            echo "<td>$row[mr]</td>";
            echo "<td>$row[name]</td>";
            echo "<td>$row[phone]</td>";
            echo "<td>$row[email]</td>";
            echo "<td>$row[line]</td>";
            echo "<td>$row[date2]</td>";
            echo "<td>$row[custstatus]</td>";
            echo "<td>$row[date3]</td>";


        echo "</tr>";
    }
    echo "</table>";

    $conn->close();

?>
<!-- เรียกใช้ javascript สำหรับ export ไฟล์ excel  -->
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"  ></script>
<script src="https://unpkg.com/file-saver@1.3.3/FileSaver.js"  ></script>

<script>
function ExcelReport()//function สำหรับสร้าง ไฟล์ excel จากตาราง
{
    var sheet_name="excel_sheet";/* กำหหนดชื่อ sheet ให้กับ excel โดยต้องไม่เกิน 31 ตัวอักษร */
    var elt = document.getElementById('myTable');/*กำหนดสร้างไฟล์ excel จาก table element ที่มี id ชื่อว่า myTable*/

    /*------สร้างไฟล์ excel------*/
    var wb = XLSX.utils.table_to_book(elt, {sheet: sheet_name});
    XLSX.writeFile(wb,'report.xlsx');//Download ไฟล์ excel จากตาราง html โดยใช้ชื่อว่า report.xlsx
}
</script>
<style type="text/css">

table {
  border-collapse: collapse;
  width:100%;
}

table, th, td {
  border: 1px solid black;
}

</style>

</body>
</html>