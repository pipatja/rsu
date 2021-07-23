<? php include('datediff.php'); ?>
<!doctype html>
<head>
    
    <title>Customers gits</title>

    <link rel="stylesheet" type="text/css" href="styles.css">
    
	<!-- bootstrap Lib -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- datatable lib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   
</head>

<body>
   <div class="content"> 
    <h1 >Customers Monte RSU</h1> 
     <!-- <a href='report.php' id='download_link' onClick='javascript:ExcelReport();''>Download</a>"                    -->
                <table id="course_table" class="table table-striped">  
                    <thead bgcolor="#6cd8dc">
                        <tr class="table-primary">
                           <!-- <th width="10%">ID</th> -->
                           <th width="25%">ชื่อ-นามสกุล</th>  
                           <th width="10%">เบอร์ติดต่อ</th>
                           <th width="10%">Room No.</th>
                           <th width="15%">วันที่เข้าชม</th>
                           <th width="15%">date2</th>
                           <th width="15%">date3</th>
                           <th width="15%">date4</th>
                           <th scope="col" width="5%">Edit</th>
                           <th scope="col" width="5%">Delete</th>
                        </tr>
                    </thead>
                </table>
            </br>
                <div align="right">
                    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-success btn-lg">Add</button>
                    <a href = 'report.php' button type="button" id="add_button" class="btn btn-success btn-lg">Export</button></a>
                </div>
   </div>               
 </body>
 </html>


<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="course_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Course</h4>
                </div>
                <div class="modal-body">
                    <label>คำนำหน้าชื่อ :</label>
                    <select name="mr" id="mr">   
                         <option value='0' <?if($_POST["mr"]=="0"){ echo " selected"; } ?>-Plese Select-</option>                     
                         <option value='นาย' <?if($_POST["mr"]=="นาย"){ echo " selected"; } ?>นาย</option>
                         <option value='นาง' <?if($_POST["mr"]=="นางสาว"){ echo " selected"; } ?>นาง</option>
                         <option value='นางสาว' <?if($_POST["mr"]=="นางสาว"){ echo " selected"; } ?>นางสาว</option>
                    </select>
                    </br>
                    <label>ชื่อ-นามสกุล</label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <br />
                    <label>เบอร์ติดต่อ</label>
                    <input type="text" name="phone" id="phone" class="form-control"/>
                    <br /> 
                    <label>E-mail</label>
                    <input type="email" name="email" id="email" class="form-control"/>
                    <br /> 
                    <label>Id Line</label>
                    <input type="text" name="line" id="line" class="form-control"/>
                    <br /> 
                    <label>Room</label>
                    <input type="text" name="room" id="room" class="form-control"/>
                    <br /> 
                    <label>วันที่เข้าชม</label>
                    <input type="date" name="date1" id="date1" class="form-control"/>
                    <br />    
                    <label>Campaign :</label>
                    <select name="campaign" id="campaign">     
                    <option value='0' <?if($_POST["campaign"]=="0"){ echo " selected"; } ?>-Plese Select-</option>                  
                         <option value='1.PRE-SALES VIP' <?if($_POST["campaign"]=="1.PRE-SALES VIP"){ echo " selected"; } ?>1.PRE-SALES VIP</option>
                         <option value='2.Pre-Sales ผ่อน 1,900' <?if($_POST["campaign"]=="2.Pre-Sales ผ่อน 1,900"){ echo " selected"; } ?>2.Pre-Sales ผ่อน 1,900</option>
                         <option value='3.ส่วนลดเงินสด' <?if($_POST["campaign"]=="3.ส่วนลดเงินสด"){ echo " selected"; } ?>3.ส่วนลดเงินสด</option>
                        </select>    
                    </br>
                    </br>
                    <label>Sales :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <select name="sales" id="sales">   
                         <option value='0' <?if($_POST["sales"]=="0"){ echo " selected"; } ?>-Plese Select-</option>                     
                         <option value='อุ้ย' <?if($_POST["sales"]=="อุ้ย"){ echo " selected"; } ?>อุ้ย</option>
                         <option value='บูม' <?if($_POST["sales"]=="บูม"){ echo " selected"; } ?>บูม</option>
                    </select>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Agent :</label>
                    <select name="agent" id="agent">   
                         <option value='0' <?if($_POST["agent"]=="0"){ echo " selected"; } ?>-Plese Select-</option>                     
                         <option value='บูม+อ้อ' <?if($_POST["agent"]=="บูม+อ้อ"){ echo " selected"; } ?>บูม+อ้อ</option>
                         <option value='ออฟ+อ้อ' <?if($_POST["agent"]=="ออฟ+อ้อ"){ echo " selected"; } ?>ออฟ+อ้อ</option>
                         <option value='อุ้ย+อ้อ' <?if($_POST["agent"]=="อุ้ย+อ้อ"){ echo " selected"; } ?>อุ้ย+อ้อ</option>
                    </select>
                    </br>
                    </br>
                    <label>สถานะ :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <select name="status1" id="status1">  
                         <option value='0' <?if($_POST["status1"]=="0"){ echo " selected"; } ?>-Plese Select-</option>                     
                         <option value='Call In' <?if($_POST["status1"]=="Call In"){ echo " selected"; } ?>Call In</option>
                         <option value='Register' <?if($_POST["status1"]=="Register"){ echo " selected"; } ?>Register</option>
                    </select>     
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Media :</label>
                    <select name="media1" id="media1">  
                         <option value='0' <?if($_POST["media1"]=="0"){ echo " selected"; } ?>-Plese Select-</option>                     
                         <option value='Offline' <?if($_POST["media1"]=="Offline"){ echo " selected"; } ?>Offline</option>
                         <option value='Online' <?if($_POST["media1"]=="Online"){ echo " selected"; } ?>Online</option>
                    </select>     
                    </br>   
                    </br>  
                    <label>Media2 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <select name="media2" id="media2">  
                         <option value='0' <?if($_POST["media2"]=="0"){ echo " selected"; } ?>-Plese Select-</option>                     
                         <option value='BOOTH/Event Exhibition' <?if($_POST["media2"]=="BOOTH/Event Exhibition"){ echo " selected"; } ?>BOOTH/Event Exhibition</option>
                         <option value='ป้ายหน้า สนง.ขาย' <?if($_POST["media2"]=="ป้ายหน้า สนง.ขาย"){ echo " selected"; } ?>ป้ายหน้า สนง.ขาย</option>
                         <option value='ป้าย Billboard / ข้างตึก' <?if($_POST["media2"]=="ป้าย Billboard / ข้างตึก"){ echo " selected"; } ?>ป้าย Billboard / ข้างตึก</option>
                         <option value='Fence banner' <?if($_POST["media2"]=="Fence banner"){ echo " selected"; } ?>Fence banner</option>
                         <option value='ป้ายกองโจร' <?if($_POST["media2"]=="ป้ายกองโจร"){ echo " selected"; } ?>ป้ายกองโจร</option>
                         <option value='Printing' <?if($_POST["media2"]=="Printing"){ echo " selected"; } ?>Printing</option>
                         <option value='TROOP' <?if($_POST["media2"]=="ป้ายกองโจร"){ echo " TROOP"; } ?>TROOP</option>
                         <option value='EVENT' <?if($_POST["media2"]=="EVENT"){ echo " selected"; } ?>EVENT</option>
                         <option value='Friend Get Friend' <?if($_POST["media2"]=="Friend Get Friend"){ echo " selected"; } ?>Friend Get Friend</option>
                         <option value='ถือป้าย / โบกธง' <?if($_POST["media2"]=="ถือป้าย / โบกธง"){ echo " selected"; } ?>ถือป้าย / โบกธง</option>
                         <option value='AGENT' <?if($_POST["media2"]=="AGENT"){ echo " selected"; } ?>AGENT</option>
                         <option value='Direct' <?if($_POST["media2"]=="Direct"){ echo " selected"; } ?>Direct</option>
                         <option value='Facebook Ads' <?if($_POST["media2"]=="Facebook Ads"){ echo " selected"; } ?>Facebook Ads</option>
                         <option value='Google adword' <?if($_POST["media2"]=="Google adword"){ echo " selected"; } ?>Google adword</option>
                         <option value='Website Monte RSU' <?if($_POST["media2"]=="Website Monte RSU"){ echo " selected"; } ?>Website Monte RSU</option>
                         <option value='Website Review' <?if($_POST["media2"]=="Website Review"){ echo " selected"; } ?>Website Review</option>
                         <option value='SMS/EDM' <?if($_POST["media2"]=="SMS/EDM"){ echo " selected"; } ?>SMS/EDM</option>
                         <option value='Line @ รายเดือน' <?if($_POST["media2"]=="Line @ รายเดือน"){ echo " selected"; } ?>Line @ รายเดือน</option>
                         <option value='ป้ายทางเข้า ม.รังสิต' <?if($_POST["media2"]=="ป้ายทางเข้า ม.รังสิต"){ echo " selected"; } ?>ป้ายทางเข้า ม.รังสิต</option>
                         <option value='GDN' <?if($_POST["media2"]=="GDN"){ echo " selected"; } ?>GDN</option>
                    </select>     
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Media3 :</label>
                    <select name="media3" id="media3">  
                         <option value='0' <?if($_POST["media3"]=="0"){ echo " selected"; } ?>-Plese Select-</option>                     
                         <option value='BOOTH/Event Exhibition' <?if($_POST["media3"]=="BOOTH/Event Exhibition"){ echo " selected"; } ?>BOOTH/Event Exhibition</option>
                         <option value='ป้ายหน้า สนง.ขาย' <?if($_POST["media3"]=="ป้ายหน้า สนง.ขาย"){ echo " selected"; } ?>ป้ายหน้า สนง.ขาย</option>
                         <option value='ป้าย Billboard / ข้างตึก' <?if($_POST["media3"]=="ป้าย Billboard / ข้างตึก"){ echo " selected"; } ?>ป้าย Billboard / ข้างตึก</option>
                         <option value='Fence banner' <?if($_POST["media3"]=="Fence banner"){ echo " selected"; } ?>Fence banner</option>
                         <option value='ป้ายกองโจร' <?if($_POST["media3"]=="ป้ายกองโจร"){ echo " selected"; } ?>ป้ายกองโจร</option>
                         <option value='Printing' <?if($_POST["media3"]=="Printing"){ echo " selected"; } ?>Printing</option>
                         <option value='TROOP' <?if($_POST["media3"]=="ป้ายกองโจร"){ echo " TROOP"; } ?>TROOP</option>
                         <option value='EVENT' <?if($_POST["media3"]=="EVENT"){ echo " selected"; } ?>EVENT</option>
                         <option value='Friend Get Friend' <?if($_POST["media3"]=="Friend Get Friend"){ echo " selected"; } ?>Friend Get Friend</option>
                         <option value='ถือป้าย / โบกธง' <?if($_POST["media3"]=="ถือป้าย / โบกธง"){ echo " selected"; } ?>ถือป้าย / โบกธง</option>
                         <option value='AGENT' <?if($_POST["media3"]=="AGENT"){ echo " selected"; } ?>AGENT</option>
                         <option value='Direct' <?if($_POST["media3"]=="Direct"){ echo " selected"; } ?>Direct</option>
                         <option value='Facebook Ads' <?if($_POST["media3"]=="Facebook Ads"){ echo " selected"; } ?>Facebook Ads</option>
                         <option value='Google adword' <?if($_POST["media3"]=="Google adword"){ echo " selected"; } ?>Google adword</option>
                         <option value='Website Monte RSU' <?if($_POST["media3"]=="Website Monte RSU"){ echo " selected"; } ?>Website Monte RSU</option>
                         <option value='Website Review' <?if($_POST["media3"]=="Website Review"){ echo " selected"; } ?>Website Review</option>
                         <option value='SMS/EDM' <?if($_POST["media3"]=="SMS/EDM"){ echo " selected"; } ?>SMS/EDM</option>
                         <option value='Line @ รายเดือน' <?if($_POST["media3"]=="Line @ รายเดือน"){ echo " selected"; } ?>Line @ รายเดือน</option>
                         <option value='ป้ายทางเข้า ม.รังสิต' <?if($_POST["media3"]=="ป้ายทางเข้า ม.รังสิต"){ echo " selected"; } ?>ป้ายทางเข้า ม.รังสิต</option>
                         <option value='GDN' <?if($_POST["media3"]=="GDN"){ echo " selected"; } ?>GDN</option>
                    </select>     
                    </br></br>  
                    <label>date2</label>
                    <input type="date" name="date2" id="date2" class="form-control"/>
                    <br /> 
                    <label>Cust-Status</label>
                    <select name="custstatus" id="custstatus">  
                         <option value='0' <?if($_POST["custstatus"]=="0"){ echo " selected"; } ?>-Plese Select-</option>                     
                         <option value='Offline' <?if($_POST["custstatus"]=="Offline"){ echo " selected"; } ?>Offline</option>
                         <option value='Online' <?if($_POST["custstatus"]=="Online"){ echo " selected"; } ?>Online</option>
                    </select>  
                    <br /> 
                    <br />
                    <label>date3</label>
                    <input type="date" name="date3" id="date3" class="form-control"/>
                    <br /> 
                    <label>date4</label>
                    <input type="date" name="date4" id="date4" class="form-control"/>
                    <br /> 
                    <label>walk</label>                   
                    <input type="text" name="walk" id="walk" class="form-control">
                    <br />
                    <label>Complete</label>                   
                    <input type="text" name="complete" id="complete" class="form-control">
                    <br /> 
                    <label>Type</label>                   
                    <input type="text" name="type" id="type" class="form-control">
                    <br /> 
                    <label>ราคาขาย</label>                   
                    <input type="text" name="price" id="price" class="form-control">
                    <br /> 
                    <label>Sqm</label>                   
                    <input type="text" name="sqm" id="sqm" class="form-control">
                    <br /> 
                    <label>add1</label>                   
                    <input type="text" name="add1" id="add1" class="form-control">
                    <br /> 
                    <label>add2</label>                   
                    <input type="text" name="add2" id="add2" class="form-control">
                    <br />
                    <!-- <label>age</label>                   
                    <input type="text" name="age" id="age" class="form-control">
                    <br />
                    <label>job</label>                   
                    <input type="text" name="job" id="job" class="form-control">
                    <br />
                    <label>gender</label>                   
                    <input type="text" name="gender" id="gender" class="form-control">
                    <br />
                    <label>nationality</label>                   
                    <input type="text" name="nation" id="nation" class="form-control">
                    <br />
                    <label>road</label>                   
                    <input type="text" name="road" id="road" class="form-control">
                    <br />
                    <label>salary</label>                   
                    <input type="text" name="salary" id="salary" class="form-control">
                    <br />
                    <label>budget</label>                   
                    <input type="text" name="budget" id="budget" class="form-control"> -->
                    

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="course_id" id="course_id" />
                    <input type="hidden" name="operation" id="operation" />
                    <input type="submit" name="action" id="action" class="btn btn-primary" value="Add" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    $('#add_button').click(function(){
        $('#course_form')[0].reset();
        $('.modal-title').text("Add Customers");
        $('#action').val("Add");
        $('#operation').val("Add");
    });
    
    var dataTable = $('#course_table').DataTable({
        "paging":true,
        "processing":true,
        "serverSide":true,
        "order": [],
        "info":true,
        "responsive": true,
        "ajax":{
            url:"fetch.php",
            type:"POST"
               },
        "columnDefs":[
            {
                "targets":[0,0,0],
                "orderable":false,
            },
        ],    
    });

    $(document).on('submit', '#course_form', function(event){
        event.preventDefault();
        var id = $('#id').val();
        var mr = $('#mr').val();
        var name = $('#name').val();
        var phone = $('#phone').val();
        var phone = $('#email').val();
        var line = $('#line').val();
        var room = $('#room').val();
        var date1 = $('#date1').val();
        var date1 = $('#date2').val();
        var date1 = $('#date3').val();
        var date1 = $('#date4').val();
        var campaign =$('#campaign').val();
        var sales = $('#sales').val();
        var agent = $('#agent').val();
        var status1 = $('#status1').val();
        var media1 = $('#media1').val();
        var media2 = $('#media2').val();
        var media3 = $('#media3').val();
        var walk = $('#walk').val();
        var custstatus = $('#custstatus').val();
        var complete = $('#complete').val();
        var type = $('#type').val();
        var price = $('#price').val();
        var sqm = $('#sqm').val();
        var sqm = $('#add1').val();
        var sqm = $('#add2').val();
        
        if(name!='')
        // if(name != '' && phone != '')
        {
            $.ajax({
                url:"insert.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                    $('#course_form')[0].reset();
                    $('#userModal').modal('hide');
                    dataTable.ajax.reload();
                }
            });
        }
        else
        {
            alert("กรุณาป้อน ชื่อ-นามสกุล , เบอร์ติดต่อ");
        }
    });
    
    $(document).on('click', '.update', function(){
        var course_id = $(this).attr("id");
        $.ajax({
            url:"fetch_single.php",
            method:"POST",
            data:{course_id:course_id},
            dataType:"json",
            success:function(data)
            {
                $('#userModal').modal('show');
                $('#id').val(data.id);
                $('#mr').val(data.mr);
                $('#name').val(data.name);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('#line').val(data.line);
                $('#room').val(data.room);
                $('#agent').val(data.agent);
                $('#date1').val(data.date1);
                $('#date2').val(data.date2);
                $('#date3').val(data.date3);
                $('#date4').val(data.date4);
                $('#sales').val(data.sales);
                $('#campaign').val(data.campaign);
                $('#status1').val(data.status1);
                $('#media1').val(data.media1);
                $('#media2').val(data.media2);
                $('#media3').val(data.media3);
                $('#walk').val(data.walk);      
                $('#custstatus').val(data.custstatus);      
                $('#complete').val(data.complete);     
                $('#type').val(data.type);     
                $('#price').val(data.price);       
                $('#sqm').val(data.sqm);    
                $('#add1').val(data.add1);    
                $('#add2').val(data.add2);                                    
                $('.modal-title').text("Edit Course Details");
                $('#course_id').val(course_id);
                $('#action').val("Save");
                $('#operation').val("Edit");
            }
        })
    });
    
    $(document).on('click', '.delete', function(){
        var course_id = $(this).attr("id");
        if(confirm("Are you sure you want to Delete this Customer?"))
        {
            $.ajax({
                url:"delete.php",
                method:"POST",
                data:{course_id:course_id},
                success:function(data)
                {
                    dataTable.ajax.reload();
                }
            });
        }
        else
        {
            return false;   
        }
    });
    
    
});
</script>