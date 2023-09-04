<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>Employees</b></h2>
					</div>
					<div class="col-sm-6">
						<button href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></button>
					</div>
				</div>
			</div>

			<!--  start taable -->
	<div id='result'></div>

    	<!--  end taable -->
		</div>
	</div>        
</div>


<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Frist_Name</label>
						<input type="text" id="first_name" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Last_Name</label>
						<input type="text" id="last_name" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" id="email" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" id="password" class="form-control" required>
					</div>


					<div class="form-group">
						<label>Remarks</label>
						<textarea  id="remarks" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Status</label>
						<select id="status" class="form-control" id="exampleFormControlSelect1">
								<option value="0">0</option>
								<option  value="1">1</option>
								</select>

					</div>					
				</div>

				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<button type="button" class="btn btn-success AddEmployee "> Add Employee </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
		<form>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Frist_Name</label>
						<input type="text" id="frist_namee" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Last_Name</label>
						<input type="text" id="last_namee" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" id="emaile" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" id="passworde" class="form-control" required>
					</div>


					<div class="form-group">
						<label>Remarks</label>
						<textarea  id="remarkse" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Status</label>
						<select id="statuse" class="form-control" id="exampleFormControlSelect1">
								<option value="0">0</option>
								<option  value="1">1</option>
								</select>

					</div>					
				</div>

				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<button type="button" value="" class="btn btn-warning UpdateEmployee "> Update Employee </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>



<!-- All Employees  -->

<script type="text/javascript">

$(document).ready(function(){

// star table view all
	getAllRecord();

	function getAllRecord(){

		var html = '';

       $.ajax({
		 type:'GET',
		   url:'http://localhost/ci/index.php/Employee/getRecord',

		//    dataType:"json",
		   success:function(data){


			var resultData=JSON.parse(data);

			 html += '<table class="table table-striped table-hover">'
			 html += '<thead>'
			 html += '<tr>'
			 html += '<th>######</th>'
			 html += '<th>Frist_Name</th>'
			 html += '<th>Last_Name</th>'
			 html += '<th>Email</th>'
			 html += '<th>Remarks</th>'
			 html += '<th>Status</th>'
			 html += '<th>Actions</th>'
			 html += '</tr>'
			 html += '</thead>'
			 html += '<tbody>'
				
			 for(var i=0 ; i<resultData.length ; i++){
			 html += '<tr>'
			 html += '<td>'+ resultData[i].id+'</td>'
			 html += '<td>'+resultData[i].first_name +'</td>'
			 html += '<td>'+resultData[i].last_name +'</td>'
			 html += '<td>'+resultData[i].email +'</td>'
			 html += '<td>'+resultData[i].remarks +'</td>'


			 html += '<td> '+resultData[i].status +'</td>'
			 html += '<td>'
			 html += '<button href="#editEmployeeModal" class=" btn btn-sm btn-warning edit" data-toggle="modal" value='+resultData[i].id+'><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>'
			 html += '<button href="#deleteEmployeeModal" class=" btn btn-sm btn-danger delete" data-toggle="modal" value='+resultData[i].id+'><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>'
			 html += '</td>'
			 html += '</tr>'
			 }

			 html += '</tbody>'
			 html += '</table>'
		

		 
		 $('#result').html(html);

		   }

       });

	}
// end table view all

  
$(document).on('click','.AddEmployee',function(){

	var first_name = $('#first_name').val();
	var last_name = $('#last_name').val();
	var email = $('#email').val();
	var password = $('#password').val();
	var remarks = $('#remarks').val();
	var status = $('#status').val();
    var data ={
		first_name:first_name,
		last_name :last_name,
		email :email,
		password :password,
		remarks :remarks,
		status :status,
	};

	$.ajax({
        url: "http://localhost/ci/index.php/Employee/dataInsert",
        type: "POST",
        data: data ,
		dataType:"text",
        success:function (resultData) {
			if(resultData){
				getAllRecord();
				// $('#addEmployeeModal').modal('hide');
			    // alert('Save New Empolyee');
			}
        }
    });
} );

$(document).on('click','.delete',function(){

	var ID = $(this).val();
	var dataDelete ={id:ID};
	$.ajax({
             url:"http://localhost/ci/index.php/Employee/dataDelete",
              type:"POST",
              data:dataDelete ,
			  dataType:"text",
			  success:function (resultData) {

			if(resultData){
				getAllRecord();
			}
        }
    });

	console.log(ID);
});


$(document).on('click','.edit',function(){
   var editID = $(this).val();

$('.UpdateEmployee').val(editID);

var dataEdit ={id:editID};
$.ajax({
		 url:"http://localhost/ci/index.php/Employee/getRecordById",
		  type:"POST",
		  data:dataEdit ,
		  dataType:"text",
		  success:function(data) {

			var EditData = JSON.parse(data);			
				$('#frist_namee').val(EditData[0].first_name);
				$('#last_namee').val(EditData[0].last_name);
				$('#emaile').val(EditData[0].email);
				$('#passworde').val(EditData[0].password);
				$('#remarkse').val(EditData[0].remarks);
				$('#statuse').val(EditData[0].status);

	}
});






});


$(document).on('click','.UpdateEmployee',function(){

	var ID = $(this).val();
	var frist_name = $('#frist_namee').val();
	var last_name = $('#last_namee').val();
	var email = $('#emaile').val();
	var password = $('#passworde').val();
	var remarks = $('#remarkse').val();
	var status = $('#statuse').val();
    var dataUpdate ={
		frist_name:frist_name,
		last_name :last_name,
		email :email,
		password :password,
		remarks :remarks,
		status :status,
		id:ID,
	};


$.ajax({
		 url:"http://localhost/ci/index.php/Employee/dataUpdate",
		  type:"POST",
		  data:dataUpdate ,
		  dataType:"text",
		  success:function (data) {

		if(data){
			getAllRecord();
		}
	}
});

// console.log(data);
});


});

</script>


