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
     .centerTable {
         width:100%;
         overflow:scroll;
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
                 <h3 class="text-center text-white bg-primary p-3">Manage Car Companies</h3>
             </div>
         </div>
         <hr class="my-4">
            <form id="insertForm">
            <div class="row">     
                <div class="col-1 text-center">
                    <label for="companyName" class="text-center">Name</label>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control companyName" name='companyName'>
                </div>

                <div class="col-1 text-center">
                    <label for="companyEmail" class="text-center">Email</label>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control companyEmail" name='companyEmail'>
                </div>

                <div class="col-1 text-center">
                    <label for="companyAddress" class="text-center">Address</label>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control companyAddress" name='companyAddress'>
                </div>
                
            </div>
            <div class="row mt-3">
              
               <div class="col-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> Company Logo</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input companyLogo" name="companyLogo" id="inputGroupFile01" accept="image/x-png,image/gif,image/jpeg">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                    </div>      
                </div>
                <div class="col text-right">
                    <input type="submit" class="btn btn-info saveButton" value="Save">
                </div>
            </div>
            </form>
        
        <hr class="my-4">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead class='bg-info text-white'>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Logo</th>
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


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

 
    <!--  Edit Model   -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success text-white">
            <h5 class="modal-title ">Edit Dialog Box</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
               <form id="updateForm">
                   <input type='hidden' name='companyId' class='companyId'>
            <div class="row">     
                <div class="col-1 text-center">
                    <label for="companyName" class="text-center">Name</label>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control companyName" name='companyName'>
                </div>

                <div class="col-1 text-center">
                    <label for="companyEmail" class="text-center">Email</label>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control companyEmail" name='companyEmail'>
                </div>

                <div class="col-1 text-center">
                    <label for="companyAddress" class="text-center">Address</label>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control companyAddress" name='companyAddress'>
                </div>
                
            </div>
            <div class="row mt-3">
              
               <div class="col-10">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> Company Logo</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input companyLogo" name="companyLogo" id="inputGroupFile01" accept="image/x-png,image/gif,image/jpeg">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                    </div>      
                </div>
                <div class="col text-right">
                    <input type="submit" class="btn btn-info updateButton" value="Update Changes">
                </div>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
    </div>
    <?php echo "hello"?>
    <?php include('includes/footer-links.php'); ?>
    <script>
        $(document).ready(function(){
                // custom file input change event
                bsCustomFileInput.init();
            // initiaing the table contents 
            loadTable();
        
            // validating the file type function
            function validateFileType(fileName){
                var dot = fileName.lastIndexOf(".")+1;
                var extentionFile = fileName.substr(dot,fileName.length).toLowerCase();
                if(extentionFile=="jpg" || extentionFile=="jpeg" || extentionFile=="png")
                return true;
                else 
                return false;  
            }

            // resetting function 
            function clearForm() {
                $('#insertForm')[0].reset();
             $('#updateForm')[0].reset();
            }
            // validation function
            function validateValue(value) {
                if($.isNumeric(value) || value.trim()=="")
                return false;
                else 
                return true;
            }
            function validateEmail(email){
                var EmailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                 return EmailRegex.test(email); 
                
            }
            // smoth scrolling to the top of the page
            function smothScrollingTop(){
                    $('html, body').stop().animate({
                        scrollTop: ($('#page-top').offset().top)
                        }, 1000, 'easeInOutExpo');
                 
                }

            // load contents table
            function loadTable(){
                $.ajax({
                    url: 'server/process.php',
                    type: 'post',
                    data:{
                        actionString:'viewCompany'
                    },
                    success: function(response) {
                        $('#tableContents').html(response);
                    }
                });
            }


                // save request
            $('#insertForm').on('submit',function(e){
                e.preventDefault();
                var name = $('#insertForm .companyName');
                var email = $('#insertForm .companyEmail');
                var address = $('#insertForm .companyAddress');
                var logo = $('#insertForm .companyLogo');
                
                name.removeClass('inputError');
                email.removeClass('inputError');
                $('#insertForm .custom-file-label').removeClass('inputError');
                address.removeClass('inputError');
                if(validateValue(name.val())==false){
                        name.addClass('inputError');
                } else if(validateValue(address.val())==false){
                    address.addClass('inputError');
                } else if(validateValue(email.val())==false || validateEmail(email.val())==false)
                {
                    email.addClass('inputError');
                } else if(validateValue(logo.val())==false  || validateFileType(logo.val())==false){
                    $('#insertForm .custom-file-label').addClass('inputError');
                }
                else {
                    var data = new FormData(this);
                data.append('actionString', 'insertCompany');
                $.ajax({
                    url: 'server/process.php',
                    type: 'post',
                    data: data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response == "true") {
                          
                            $.when(smothScrollingTop()).then($('.alertBox').show('medium').addClass('alert-info').removeClass('alert-danger'));
                                $('.alertBox p').html('<strong>Success! </strong>Record Added.');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                            loadTable();
                            clearForm();

                        } else {
                           $.when(smothScrollingTop()).then( $('.alertBox').show('medium').addClass('alert-danger').removeClass('alert-info'));
                                $('.alertBox p').html('<strong>Warning </strong>Duplicate Company names and Email');
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
                            actionString:'deleteCompany',
                            id:id
                        },
                        success:function(response){
                            if(response.trim()=='true'){
                             
                               $.when(smothScrollingTop()).then( $('.alertBox').show('medium').addClass('alert-info').removeClass('alert-danger'));
                                $('.alertBox p').html('<strong>Success! </strong>Record Deleted.');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                                loadTable();
                            } else 
                            {
                               $.when(smothScrollingTop()).then( $('.alertBox').show('medium').addClass('alert-danger').removeClass('alert-info'));
                                $('.alertBox p').html('<strong>Error </strong>Can\'t Delete the Company, It Seems some cars are associated with this Comapny');
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
                            actionString:'companyRecord',
                            id:id
                        },
                        success:function(response){
                        $('#updateForm .companyId').val(response.company_id);
                         $('#updateForm .companyName').val(response.company_name);
                         $('#updateForm .companyEmail').val(response.company_email);
                         $('#updateForm .companyAddress').val(response.company_address);
                        // $('#updateForm .companyLogo').val(response.company_logo);
                         
                        }
                    });
                });

             // update Request
             $('#updateForm').submit(function(e){
              
                 e.preventDefault();
                var name = $('#updateForm .companyName');
                var email = $('#updateForm .companyEmail');
                var address = $('#updateForm .companyAddress');
                var logo = $('#updateForm .companyLogo');
                logo.removeClass('inputError');
                name.removeClass('inputError');
                email.removeClass('inputError');
                address.removeClass('inputError');
                if(validateValue(name.val())==false){
                        name.addClass('inputError');
                } else if(validateValue(address.val())==false){
                    address.addClass('inputError');
                } else if(validateValue(email.val())==false || validateEmail(email.val())==false)
                {
                    email.addClass('inputError');
                } else if(logo.val()!="" && validateFileType(logo.val())==false)
                            {    logo.addClass('inputError');
                            }
                else {
                    var data = new FormData(this);
                data.append('actionString', 'updateCompany');
                $.ajax({
                    url: 'server/process.php',
                    type: 'post',
                    data: data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response == "true") {
                            $('#editModal').modal('hide');
                            
                           $.when(smothScrollingTop()).then( $('.alertBox').show('medium').addClass('alert-info').removeClass('alert-danger'));
                                $('.alertBox p').html('<strong>Success! </strong>Record Updated.');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                                loadTable();
                            clearForm();

                        } else {
                            
                            $.when(smothScrollingTop()).then($('.alertBox').show('medium').addClass('alert-danger').removeClass('alert-info'));
                                $('.alertBox p').html('<strong>Error: </strong>Duplicate Company names and Email are not allowed!');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                        }
                    }
                });
                }
                   
            });
          });
        </script>
</body>

</html>