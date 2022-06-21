<?php include('includes/loginAuthentication.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/header-links.php'); ?>
  <style>
      .inputError {
          border: solid 1px red;
      }
      .alertBox{
         display:none;
        
      }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
       <?php include('includes/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
          <!-- End of Topbar -->
           <?php include('includes/top-navbar.php'); ?>
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
         <div class="row">
             <div class="col">
             <div class="alert alert-info alert-dismissible   alertBox" role="alert">
                <p><strong>Success!</strong> Record added.</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             </div>
         </div>

         <div class="row">
             <div class="col">
                 <h3 class="text-center text-white bg-primary p-3">Manage Car Colors</h3>
             </div>
         </div>
         <hr class="my-4">
            <form>
            <div class="row">     
                <div class="col-3 text-right">
                    <label for="colorName" class="text-right">Color Names</label>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" id="colorName">
                </div>
                <div class="col-3">
                    <input type="button" class="btn btn-info" value="Save" id="saveButton">
                </div>
            </div>
            </form>
        
        <hr class="my-4">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead class='bg-info text-white'>
                        <tr>
                            <th>Color ID</th>
                            <th>Color Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableContents">
                    
                    </tobdy>
                </table>
            </div>
        </div>






          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; TaboProduction 2021</span>
            </div>
        </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

 
    <!--  Edit Model   -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title ">Edit Dialog Box</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
            <div class="row">     
                <div class="col-4 text-right">
                    <input type='hidden' value="" id='editColorId'>
                    <label for="colorName" class="text-right">Color Names</label>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" id="editColorName">
                </div>
            </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success updateButton">Update changes</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer-links.php'); ?>
    <script>
        $(document).ready(function(){
            // initiaing the table contents 
            loadTable();
        
            // validation function
            function validateValue(value) {
                if($.isNumeric(value) || value.trim()=="")
                return false;
                else 
                return true;
            }
            // load contents table
            function loadTable(){
                $.ajax({
                        url:'server/process.php',
                        type:'post',
                        data:{
                            actionString:'viewColor',
                        },
                        success:function(response){
                                $('#tableContents').html(response);

                        }
                    });
            }


                // save request
            $('#saveButton').click(function(){
                    var colorBox = $('#colorName');
                    colorBox.removeClass('inputError');
                if(validateValue(colorBox.val())==false)
                colorBox.addClass('inputError');
                else {
                    $.ajax({
                        url:'server/process.php',
                        type:'post',
                        data:{
                            actionString:'insertColor',
                            value:colorBox.val()
                        },
                        success:function(response){
                            if(response.trim()=='true'){
                                loadTable();
                                $('.alertBox').show('medium').addClass('alert-info').removeClass('alert-danger');
                                $('.alertBox p').html('<strong>Success! </strong>Record Added.');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                            } else 
                            {
                                $('.alertBox').show('medium').addClass('alert-danger').removeClass('alert-info');
                                $('.alertBox p').html('<strong>Warning </strong>Duplicate Color Names not Allowed');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                            }
                        }
                    });
                }
            });

            // delete request
            $('#tableContents').on('click','.deleteButton',function(){ 
                var id=$(this).val();
                    $.ajax({
                        url:'server/process.php',
                        type:'post',
                        data:{
                            actionString:'deleteColor',
                            id:id
                        },
                        success:function(response){
                            if(response.trim()=='true'){
                                loadTable();
                                $('.alertBox').show('medium').addClass('alert-info').removeClass('alert-danger');
                                $('.alertBox p').html('<strong>Success! </strong>Record Deleted.');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                            } else 
                            {
                                $('.alertBox').show('medium').addClass('alert-danger').removeClass('alert-info');
                                $('.alertBox p').html('<strong>Error </strong>Can\'t Delete the Color Names, It Seems some cars are associated with this model');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                            }
                        }
                    });
                });


        // edit request to retrieve record
        $('#tableContents').on('click','.editButton',function(){ 
            var id = $(this).val();
               $('#editModal').modal('show');
                    $.ajax({
                        url:'server/process.php',
                        type:'post',
                        dataType:'json',
                        data:{
                            actionString:'colorRecord',
                            id:id
                        },
                        success:function(response){
                         $('#editModal #editColorId').val(response.color_id);
                         $('#editModal #editColorName').val(response.color_name);
                        }
                    });
                });

             // update Request
             $('.updateButton').click(function(){
                 $('#editModal').modal('hide');
                 var color_name = $('#editColorName'); 
                var id=$('#editColorId');
                color_name.removeClass('inputError');
                if(validateValue(color_name.val())==false)
                color_name.addClass('inputError');
                    $.ajax({
                        url:'server/process.php',
                        type:'post',
                        data:{
                            actionString:'updateColor',
                            color_id:id.val(),
                            color_name:color_name.val()
                        },
                        success:function(response){
                            if(response.trim()=='true'){
                                loadTable();
                                $('.alertBox').show('medium').addClass('alert-info').removeClass('alert-danger');
                                $('.alertBox p').html('<strong>Success! </strong>Record Updated.');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                            } else 
                            {
                                $('.alertBox').show('medium').addClass('alert-danger').removeClass('alert-info');
                                $('.alertBox p').html('<strong>Error </strong>Failed to Update the Record, duplicate Color Names are not allowed');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                            }
                        }
                    });
                });
          });
        </script>
</body>

</html>