<!doctype html>
<head>
    
    <title>Customers</title>

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
    <h1 >Main Customers</h1> 
     <!-- <a href='report.php' id='download_link' onClick='javascript:ExcelReport();''>Download</a>"                    -->
                <table id="course_table" class="table table-striped">  
                    <thead bgcolor="#6cd8dc">
                        <tr class="table-primary">
                           <!-- <th width="10%">ID</th> -->
                           <th width="30%">ชื่อ-นามสกุล</th>  
                           <th width="15%">เบอร์ติดต่อ</th>
                           <th width="40%">สำนักงานขาย</th>
                           <th width="30%">วันที่เข้าชม</th>
                           <th width="10%">สถานะ</th>
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
                    <label>ชื่อ-นามสกุล</label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <br />
                    <label>เบอร์ติดต่อ</label>
                    <input type="text" name="phone" id="phone" class="form-control" />
                    <br /> 
                    <label>วันที่เข้าชม</label>
                    <input type="date" name="date" id="date" class="form-control" />
                    <br /> 
                    <label>สำนักงานขาย :</label>
                    <select name="branch" id="branch">                       
                         <option value='0'>-Select-</option>
                         <option value='MONTE RAMA 9' <?if($_POST["branch"]=="MONTE RAMA 9"){ echo " selected"; } ?>MONTE RAMA 9</option>
                         <option value='MONTE RSU' <?if($_POST["branch"]=="MONTE RSU"){ echo " selected"; } ?>MONTE RSU</option>
                         <option value='AVENUE SPRING(ABAC Banana)' <?if($_POST["branch"]=="AVENUE SPRING(ABAC Banana)"){ echo " selected"; } ?>AVENUE SPRING(ABAC Banana)</option>
                    </select>
                    &nbsp;&nbsp;<label>สถานะห้อง :</label>
                    <select name="status" id="status">                       
                         <option value='0'>-Select-</option>
                         <option value='ยังไม่โอน' <?if($_POST["status"]=="ยังไม่โอน"){ echo " selected"; } ?>ยังไม่โอน</option>
                         <option value='โอนแล้ว' <?if($_POST["status"]=="โอนแล้ว"){ echo " selected"; } ?>โอนแล้ว</option>
                    </select>
                    <br /> 
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
                "targets":[0,3,4],
                "orderable":false,
            },
        ],    
    });

    $(document).on('submit', '#course_form', function(event){
        event.preventDefault();
        var id = $('#id').val();
        var name = $('#name').val();
        var phone = $('#phone').val();
        var branch = $('#branch').val();
        var date = $('#date').val();
        var status = $('#status').val();
        
        if(name != '' && phone != '')
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
            alert("Course Name, Number of students Fields are Required");
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
                $('#name').val(data.name);
                $('#phone').val(data.phone);
                $('#branch').val(data.branch);
                $('#date').val(data.date);
                $('#status').val(data.status);
                $('.modal-title').text("Edit Course Details");
                $('#course_id').val(course_id);
                $('#action').val("Save");
                $('#operation').val("Edit");
            }
        })
    });
    
    $(document).on('click', '.delete', function(){
        var course_id = $(this).attr("id");
        if(confirm("Are you sure you want to delete this user?"))
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