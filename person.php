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
                 <h3 class="text-center text-white bg-primary p-3">Manage Persons</h3>
             </div>
         </div>
         <hr class="my-4">
            <form id="insertForm">
            <div class="row">     
                <div class="col-2 text-center">
                    <label for="a" class="">First Name</label>
                </div>
                <div class="col-3">
                    <input type="text" id="a" class="form-control firstName" name='firstName'>
                </div>

                <div class="col-2 text-center">
                    <label for="b" class="text-center">Last Name</label>
                </div>
                <div class="col-3">
                    <input type="text"  id="b" class="form-control lastName" name='lastName'>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-2 text-center">
                    <label for="c" class="text-center">NIC</label>
                </div>
                <div class="col-3">
                    <input type="text" id="c" class="form-control nic" name='nic'>
                </div>
                
                <div class="col-2 text-center">
                    <label for="d" class="text-center">Phone</label>
                </div>
                <div class="col-3">
                    <input type="text" id="d" class="form-control phone" name='phone'>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-2 text-center">
                    <label for="e" class="text-center">Email</label>
                </div>
                <div class="col-3">
                    <input type="text" id="e" class="form-control email" name='email'>
                </div>
                
                <div class="col-2 text-center">
                    <label for="f" class="text-center">Address</label>
                </div>
                <div class="col-3">
                    <input type="text" id="f" class="form-control address" name='address'>
                </div>
            </div>
            <div class="row mt-3">
             
               <div class="col-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Person Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input personImage" name="personImage" id="inputGroupFile01" accept="image/x-png,image/gif,image/jpeg">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                    </div>      
                </div>
                <div class="col text-right">
                    <input type="submit" class="btn btn-info saveButton" value="Save">
                </div>
            </div>
            </form>
        
        <hr class="my-2">
        <div class="row bg-info p-2">
            <div class="col-2 text-center text-white">
                    <label for="#searchBox"><h3>Search</h3></label>
            </div>
            <div class="col-3">
                    <input type="search" class="form-control" id="searchBox">
            </div>
        </div>
        
        <hr class="my-2">
        <div class="row">
            <div class="col">
               <div class="centerTable">
               <table class="table table-striped">
                    <thead class='bg-info text-white'>
                        <tr>
                            <th>#</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>NIC</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableContents">
                    
                    </tobdy>
                </table>
               </div>
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
            <input type='hidden' name='id' class='id'>
            <div class="row">     
                <div class="col-2 text-center">
                    <label for="w" class="">First Name</label>
                </div>
                <div class="col-3">
                    <input type="text" id="w" class="form-control firstName" name='firstName'>
                </div>

                <div class="col-2 text-center">
                    <label for="x" class="text-center">Last Name</label>
                </div>
                <div class="col-3">
                    <input type="text"  id="x" class="form-control lastName" name='lastName'>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-2 text-center">
                    <label for="y" class="text-center">NIC</label>
                </div>
                <div class="col-3">
                    <input type="text" id="y" class="form-control nic" name='nic'>
                </div>
                
                <div class="col-2 text-center">
                    <label for="q" class="text-center">Phone</label>
                </div>
                <div class="col-3">
                    <input type="text" id="q" class="form-control phone" name='phone'>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-2 text-center">
                    <label for="r" class="text-center">Email</label>
                </div>
                <div class="col-3">
                    <input type="text" id="r" class="form-control email" name='email'>
                </div>
                
                <div class="col-2 text-center">
                    <label for="s" class="text-center">Address</label>
                </div>
                <div class="col-3">
                    <input type="text" id="s" class="form-control address" name='address'>
                </div>
            </div>
            <div class="row mt-3">
             
               <div class="col-10">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Person Image</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input personImage" name="personImage" id="inputGroupFile01" accept="image/x-png,image/gif,image/jpeg">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                    </div>      
                </div>
                <div class="col text-right">
                    <input type="submit" class="btn btn-info updateButton" value="Update ">
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

    <?php include('includes/footer-links.php'); ?>
    <script>
        $(document).ready(function(){
                // custom file input change event
                bsCustomFileInput.init();
            // initiaing the table contents 
            loadTable("");
        
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
            function validateFileType(fileName){
                var dot = fileName.lastIndexOf(".")+1;
                var extentionFile = fileName.substr(dot,fileName.length).toLowerCase();
                if(extentionFile=="jpg" || extentionFile=="jpeg" || extentionFile=="png")
                return true;
                else 
                return false;  
            }

            // load contents table
            function loadTable(value){
                $.ajax({
                    url: 'server/process.php',
                    type: 'post',
                    data:{
                        actionString:'viewPerson',
                        value:value
                    },
                    success: function(response) {
                        $('#tableContents').html(response);
                    }
                });
            }

                function smothScrollingTop(){
                    $('html, body').stop().animate({
                        scrollTop: ($('#page-top').offset().top)
                        }, 1000, 'easeInOutExpo');
                 
                }

            // search using ajax

            $('#searchBox').keypress(function(e){
                loadTable($(this).val());
            });
                // save request
            $('#insertForm').on('submit',function(e){
                e.preventDefault();
                var firstname = $('#insertForm .firstName');
                var lastname = $('#insertForm .lastName');
                var nic = $('#insertForm .nic');
                var phone = $('#insertForm .phone');
                var address = $('#insertForm .address');
                var email = $('#insertForm .email');
                var logo = $('#insertForm .personImage');
                var imageLabel = $('insertForm .custom-file-label');
                firstname.removeClass('inputError');
                lastname.removeClass('inputError');
                nic.removeClass('inputError');
                phone.removeClass('inputError');
                address.removeClass('inputError');
                email.removeClass('inputError');
              imageLabel.removeClass('inputError');

                if(validateValue(firstname.val())==false){
                        firstname.addClass('inputError');
                } else if(validateValue(lastname.val())==false){
                        lastname.addClass('inputError');
                } else if(nic.val().trim()==""){
                        nic.addClass('inputError');
                } else if(!$.isNumeric(phone.val()) || phone.val().trim()==""){
                        phone.addClass('inputError');
                } else if(validateValue(email.val())==false || validateEmail(email.val())==false)
                {
                    email.addClass('inputError');
                }else if(validateValue(address.val())==false){
                    addraddressClass('inputError');
                }  else if(validateValue(logo.val())==false || validateFileType(logo.val())==false){
                    imageLabel.addClass('inputError');
                }
                else {
                    var data = new FormData(this);
                data.append('actionString', 'insertPerson');
                $.ajax({
                    url: 'server/process.php',
                    type: 'post',
                    data: data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response == "true") {
                           
                           
                           
                           $.when(smothScrollingTop()).then( $('.alertBox').show('medium').addClass('alert-info').removeClass('alert-danger')
                           );
                                $('.alertBox p').html('<strong>Success! </strong>Record Added.');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                                loadTable("");
                            clearForm();

                        } else {
                            $.when(smothScrollingTop()).then( $('.alertBox').show('medium').addClass('alert-danger').removeClass('alert-info')
                            );
                                $('.alertBox p').html('<strong>Error: </strong>Duplicate NIC, Phone and Email is not allowed!');
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
                            actionString:'deletePerson',
                            id:id
                        },
                        success:function(response){
                            if(response.trim()=='true'){
                               
                                $.when(smothScrollingTop()).then( function(){
                                $('.alertBox').show('medium').addClass('alert-info').removeClass('alert-danger');
                                $('.alertBox p').html('<strong>Success! </strong>Record Deleted.');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                                loadTable("");
                                });
                                
                            } else 
                            {
                               $.when(smothScrollingTop()).then( $('.alertBox').show('medium').addClass('alert-danger').removeClass('alert-info')
                               );
                                $('.alertBox p').html('<strong>Error </strong>Can\'t Delete the Person, It Seems it is associated with some deal');
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
                            actionString:'personRecord',
                            id:id
                        },
                        success:function(response){
                        $('#updateForm .firstName').val(response.person_firstname);
                         $('#updateForm .lastName').val(response.person_lastname);
                         $('#updateForm .nic').val(response.person_nic);
                         $('#updateForm .phone').val(response.person_phone);
                         $('#updateForm .email').val(response.person_email);
                         $('#updateForm .address').val(response.person_address);
                         $('#updateForm .id').val(response.person_id);
                         
                        }
                    });
                });

             // update Request
             $('#updateForm').submit(function(e){
              
                 e.preventDefault();
                 var firstname = $('#updateForm .firstName');
                var lastname = $('#updateForm .lastName');
                var nic = $('#updateForm .nic');
                var phone = $('#updateForm .phone');
                var address = $('#updateForm .address');
                var email = $('#updateForm .email');
                var logo = $('#updateForm .personImage');
                var logoLabel = $('#updateForm .custom-file-label');
                
                firstname.removeClass('inputError');
                lastname.removeClass('inputError');
                nic.removeClass('inputError');
                phone.removeClass('inputError');
                address.removeClass('inputError');
                email.removeClass('inputError');
                logoLabel.removeClass('inputError');
                if(validateValue(firstname.val())==false){
                        firstname.addClass('inputError');
                } else if(validateValue(lastname.val())==false){
                        lastname.addClass('inputError');
                } else if(nic.val().trim()==""){
                        nic.addClass('inputError');
                } else if(!$.isNumeric(phone.val()) || phone.val().trim()==""){
                        phone.addClass('inputError');
                } else if(validateValue(email.val())==false || validateEmail(email.val())==false)
                {
                    email.addClass('inputError');
                }else if(validateValue(address.val())==false){
                    address.addClass('inputError');
                } else if(logo.val()!="" && validateFileType(logo.val())==false)
                {
                    logoLabel.addClass('inputError');
                }  
                else {
                    var data = new FormData(this);
                data.append('actionString', 'updatePerson');
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
                            
                           
                            $.when(smothScrollingTop()).then(
                            $('.alertBox').show('medium').addClass('alert-info').removeClass('alert-danger')
                            );
                                $('.alertBox p').html('<strong>Success! </strong>Record Updated.');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                                loadTable("");
                            clearForm();

                        } else {
                            $('#editModal').modal('hide');
                           $.when(smothScrollingTop()).then( $('.alertBox').show('medium').addClass('alert-danger').removeClass('alert-info')
                           );
                                $('.alertBox p').html('<strong>Error: </strong>Duplicate Person NIC, Email and Phone are not allowed!');
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