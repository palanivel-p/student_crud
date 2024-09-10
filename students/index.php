<?php
include("../includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logoc Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <h2>PHP LOGIC CRUD</h2>
        <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentModal">
        Add Student
      </button>


      <!-- Modal -->
      <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="studentModalLabel">Add Students</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="student_form">
                <div class="mb-3">
                  <label for="student_name" class="form-label">Student Name</label>
                  <input type="text" class="form-control" id="student_name" name="student_name" style="border-color: #181f5a;color: black">
                </div>
                <div class="mb-3">
                  <label for="student_mobile" class="form-label">Student Mobile</label>
                  <input type="text" class="form-control" id="student_mobile" name="student_mobile" style="border-color: #181f5a;color: black">
                </div>
                <div class="mb-3">
                  <label for="student_email" class="form-label">Student Email</label>
                  <input type="text" class="form-control" id="student_email" name="student_email" style="border-color: #181f5a;color: black">
                </div>
                <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <textarea class="form-control" placeholder="Address" id="address" name="address" style="border-color: #181f5a;color: black"></textarea>
                  </div>
              </form>           
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="add_btn">ADD</button>
            </div>
          </div>
        </div>
      </div>
      
      <table class="table table-striped">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Mobie</th>
            <th>Email</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php 
        $sql = "SELECT * FROM `student`";
       $result =  mysqli_query($conn,$sql);
       while($row = mysqli_fetch_assoc($result)){
        
        ?>
        <tbody>
          <tr>
            <td>1</td>
            <td><?php echo $row['student_name']?></td>
            <td><?php echo $row['student_email']?></td>
            <td><?php echo $row['student_mobile']?></td>
            <td><?php echo $row['address']?></td>
            <td><button type="button" class="btn btn-success" onclick="edit('<?php echo $row['student_id']?>')">Edit</button></td>
            <td><button type="button" class="btn btn-danger" onclick="delete_student('<?php echo $row['student_id']?>')">Delete</button></td>
          </tr>
        
        </tbody>
        <?php
       }
        ?>
      </table>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery Validation Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>


<script>

  // Form Validation
  $('#student_form').validate(
    {
    rules:{
      student_name:{
        required:true
      },
      student_email:{
        required:true,
        email:true
    },
    student_mobile:{
      required:true,
      maxlength:10,
      minlength:10
    },
    address:{
      required:true
    }
  },
  messages:{
    student_name:'Enter student name',
    student_email:'Enter student email',
    student_mobile: {
      required:'Enter student mobile',
      maxlength:'enter 10 characters',
      minlength:'enter 10 charaters'
    },
    address: 'Enter Address'
  }
  });
  //ajax method
  $('#add_btn').click(function() {
    if ($('#student_form').valid()) { // Check form validity
        var api = 'add_api.php';
        var formData = $('#student_form').serialize(); // Use the correct form
        
        this.disabled = true; // Disable the button
        this.innerHTML = '<i class="fa fa-spinner" aria-hidden="true"></i>'; // Change button text to a spinner
        
        $.ajax({
            type: 'POST',
            url: api,
            data: formData,
            dataType: 'json',
            success: function(res) {
                if (res.status == 'Success') {
                    Swal.fire({ // Changed from swal.fire to Swal.fire
                        title: 'Success',
                        text: res.msg,
                        icon: 'success',
                        button: 'ok',
                        allowOutsideClick: false,
                        allowEscapekey: false,
                        closeOnClickoutside: false,
                    }).then((value) => {
                        window.location.reload(); // Reload the page after success
                    });
                } else if (res.status == 'Failure') {
                    Swal.fire({
                        title: 'Failure',
                        text: res.msg,
                        icon: 'error', // Corrected from 'wrong' to 'error'
                        button: 'ok',
                        allowOutsideClick: false,
                        allowEscapekey: false,
                        closeOnClickOutside: false,
                    }).then((value) => {
                        $('#add_btn').prop('disabled', false); // Enable the button
                        $('#add_btn').html('Add'); // Reset button text
                    });
                }
            },
            error: function() {
                Swal.fire('Check Network Connection');
                $('#add_btn').prop('disabled', false); // Enable the button on error
                $('#add_btn').html('Add'); // Reset button text
            }
        });
    } else {
        // Swal.fire('Form validation failed'); // Alert if form validation fails
        $('#add_btn').prop('disabled', false); // Enable button again
        $('#add_btn').html('Add'); // Reset button text
    }
});


//Delete function
function delete_student(student_id) {
  Swal.fire({
    title: "Delete",
    text: "Are you sure want to delete the record?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    allowOutsideClick: false,
    allowEscapeKey: false,
    closeOnClickOutside: false,
    showCancelButton: true,
    cancelButtonText: 'Cancel'
  })
  .then((value) => {
    if (value.isConfirmed) {
      $.ajax({
        url: 'delete_api.php',
        type: 'POST',
        data: 'student_id=' + student_id, 
        dataType: 'json',
        success: function(res) {
          if (res.status == 'Success') {
            Swal.fire({
              title: 'Success',
              text: res.msg,
              icon: 'success', 
              button: 'ok',
              allowOutsideClick: false,
              allowEscapeKey: false,
              closeOnClickOutside: false,
            })
            .then(() => { 
              window.location.reload();
            });
          } else if (res.status == 'Failure') {
            Swal.fire({
              title: 'Failure',
              text: res.msg,
              icon: 'error', 
              button: 'ok',
              allowOutsideClick: false,
              allowEscapeKey: false,
              closeOnClickOutside: false,
            })
            .then(() => { 
              window.location.reload();
            });
          }
        },
        error: function() { 
          Swal.fire('Check Network Connection');
        }
      });
    }
  });
}

</script>
</body>
</html>