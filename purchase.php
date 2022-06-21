<?php include('includes/loginAuthentication.php'); 
include_once 'includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/header-links.php'); ?>
  <link rel="stylesheet" type="text/css" href="css/select2.min.css">
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
                 <h3 class="text-center text-white bg-primary p-3">Manage Car Purchase</h3>
             </div>
         </div>
         <hr class="my-4">
            <form id="insertForm">
            <div class="row my-2">
                
                <div class="col-3 text-center">
                    <label for="car_platenumber" class="text-center">PlateNumber</label>
                </div>
                <div class="col-6">
                    <input type="text" id="car_platenumber" class="form-control car_platenumber" name='car_platenumber' placeholder="-6121365">
                </div>
          
             </div>
             <div class="row my-2">
                
                <div class="col-3 text-center">
                    <label for="car_price" class="text-center">Price</label>
                </div>
                <div class="col-6">
                    <input type="text" id="car_price" class="form-control car_price" name='car_price' placeholder="AFN">
                </div>
          
             </div>
             <div class="row my-2">
                
                <div class="col-3 text-center">
                    <label for="car_manufacture_date" class="text-center">Manufacture Date</label>
                </div>
                <div class="col-6">
                    <input type="date" id="car_manufacture_date" class="form-control car_manufacture_date" name='car_manufacture_date' placeholder="optional">
                </div>
          
             </div>
             <div class="row my-2">
                
                <div class="col-3 text-center">
                    <label for="car_import_date" class="text-center">Import Date</label>
                </div>
                <div class="col-6">
                    <input type="date" id="car_import_date" class="form-control car_import_date" name='car_import_date' placeholder="optional">
                </div>
          
             </div>
            <div class="row my-2">
                <div class="col-3 text-center">
                    <label for="person_id" class="text-center">Select Owner</label>
                </div>
                <div class="col-6">
                <select class='form-control person_id' id='person_id' name='person_id'>
                    <?php $query = "select * from person";
                     $result=mysqli_query($connection,$query);
                     while($row=mysqli_fetch_assoc($result)){
                     echo "<option value='".$row['person_id']."'>".$row['person_firstname']." ".$row['person_lastname']." ".$row['person_nic']."</option>";
                     }?>

                </select> 
                </div>
    </div>
            <div class="row">     
                <div class="col-3 text-center">
                    <label for="company_id" class="">Select Company</label>
                </div>
                <div class="col-6">
                   <select class='form-control company_id' id='company_id' name='company_id'>
                    <?php $query = "select * from company";
                     $result=mysqli_query($connection,$query);
                     while($row=mysqli_fetch_assoc($result)){
                     echo "<option value='".$row['company_id']."'>".$row['company_name']."</option>";
                     }?>

                </select> 
                </div>
    </div>
    <div class="row my-2">

                <div class="col-3 text-center">
                    <label for="engine_id" class="text-center">Select Engine</label>
                </div>
                <div class="col-6">
                <select class='form-control engine_id' id='engine_id' name='engine_id'>
                    <?php $query = "select * from engine";
                     $result=mysqli_query($connection,$query);
                     while($row=mysqli_fetch_assoc($result)){
                     echo "<option value='".$row['engine_id']."'>".$row['engine_name']."</option>";
                     }?>

                </select> 
                </div>
            </div>
    <div class="row my-2">

<div class="col-3 text-center">
            <label for="color_id" class="text-center">Select Color</label>
        </div>
        <div class="col-6">
        <select class='form-control color_id' id='color_id' name='color_id'>
            <?php $query = "select * from color";
            $result=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($result)){
            echo "<option value='".$row['color_id']."'>".$row['color_name']."</option>";
            }?>

        </select> 
        </div>
</div>

    <div class="row my-2">

        <div class="col-3 text-center">
                    <label for="model_id" class="text-center">Select Model</label>
                </div>
                <div class="col-6">
                <select class='form-control model_id' id='model_id' name='model_id'>
                    <?php $query = "select * from model";
                    $result=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($result)){
                    echo "<option value='".$row['model_id']."'>".$row['model_name']."</option>";
                    }?>

                </select> 
                </div>
             
 
    </div>
         <div class="row my-2">
             <div class="col-3 text-center">Car Image</div>
             <div class="col-6">
              <div class="input-group mb-3">
                  <!-- <div class="input-group-prepend">
                      <span class="input-group-text">Car Image</span>
                  </div> -->
                  <div class="custom-file">
                      <input type="file" class="custom-file-input carImage" name="carImage" id="carImage" accept="image/x-png,image/gif,image/jpeg">
                      <label class="custom-file-label" for="carImage">Choose file</label>
                  </div>
                  </div>      
              </div>
              <div class="col text-left">
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
                            <th>Plate Number"</th>
                            <th>Color</th>
                            <th>Engine</th>
                            <th>Model</th>
                            <th>Company</th>
                            <th colspan=3 class='text-center'>Owner Info</th>
                            <th>MDate</th>
                            <th>IDate</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Status</th>
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
            <div class="row my-2">
                
                <div class="col-3 text-center">
                    <label for="updatecar_platenumber" class="text-center">PlateNumber</label>
                </div>
                <div class="col-6">
                    <input type="text" id="updatecar_platenumber" class="form-control updatecar_platenumber" name='updatecar_platenumber' placeholder="-6121365">
                </div>
          
             </div>
             <div class="row my-2">
                
                <div class="col-3 text-center">
                    <label for="updatecar_price" class="text-center">Price</label>
                </div>
                <div class="col-6">
                    <input type="text" id="updatecar_price" class="form-control updatecar_price" name='updatecar_price' placeholder="AFN">
                </div>
          
             </div>
             <div class="row my-2">
                
                <div class="col-3 text-center">
                    <label for="updatecar_manufacture_date" class="text-center">Manufacture Date</label>
                </div>
                <div class="col-6">
                    <input type="date" id="updatecar_manufacture_date" class="form-control updatecar_manufacture_date" name='updatecar_manufacture_date' placeholder="optional">
                </div>
          
             </div>
             <div class="row my-2">
                
                <div class="col-3 text-center">
                    <label for="updatecar_import_date" class="text-center">Import Date</label>
                </div>
                <div class="col-6">
                    <input type="date" id="updatecar_import_date" class="form-control updatecar_import_date" name='updatecar_import_date' placeholder="optional">
                </div>
          
             </div>
            <div class="row my-2">
                <div class="col-3 text-center">
                    <label for="updateperson_id" class="text-center">Select Owner</label>
                </div>
                <div class="col-6">
                <select class='form-control updateperson_id' id='updateperson_id' name='updateperson_id'>
                    <?php $query = "select * from person";
                     $result=mysqli_query($connection,$query);
                     while($row=mysqli_fetch_assoc($result)){
                     echo "<option value='".$row['person_id']."'>".$row['person_firstname']." ".$row['person_lastname']." ".$row['person_nic']."</option>";
                     }?>

                </select> 
                </div>
    </div>
            <div class="row">     
                <div class="col-3 text-center">
                    <label for="updatecompany_id" class="">Select Company</label>
                </div>
                <div class="col-6">
                   <select class='form-control updatecompany_id' id='updatecompany_id' name='updatecompany_id'>
                    <?php $query = "select * from company";
                     $result=mysqli_query($connection,$query);
                     while($row=mysqli_fetch_assoc($result)){
                     echo "<option value='".$row['company_id']."'>".$row['company_name']."</option>";
                     }?>

                </select> 
                </div>
    </div>
    <div class="row my-2">

                <div class="col-3 text-center">
                    <label for="updateengine_id" class="text-center">Select Engine</label>
                </div>
                <div class="col-6">
                <select class='form-control updateengine_id' id='updateengine_id' name='updateengine_id'>
                    <?php $query = "select * from engine";
                     $result=mysqli_query($connection,$query);
                     while($row=mysqli_fetch_assoc($result)){
                     echo "<option value='".$row['engine_id']."'>".$row['engine_name']."</option>";
                     }?>

                </select> 
                </div>
            </div>
    <div class="row my-2">

<div class="col-3 text-center">
            <label for="updatecolor_id" class="text-center">Select Color</label>
        </div>
        <div class="col-6">
        <select class='form-control updatecolor_id' id='updatecolor_id' name='updatecolor_id'>
            <?php $query = "select * from color";
            $result=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($result)){
            echo "<option value='".$row['color_id']."'>".$row['color_name']."</option>";
            }?>

        </select> 
        </div>
</div>

    <div class="row my-2">

        <div class="col-3 text-center">
                    <label for="updatemodel_id" class="text-center">Select Model</label>
                </div>
                <div class="col-6">
                <select class='form-control updatemodel_id' id='updatemodel_id' name='updatemodel_id'>
                    <?php $query = "select * from model";
                    $result=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($result)){
                    echo "<option value='".$row['model_id']."'>".$row['model_name']."</option>";
                    }?>

                </select> 
                </div>
             
 
    </div>
         <div class="row my-2">
             <div class="col-3 text-center">Car Image</div>
             <div class="col-6">
              <div class="input-group mb-3">
                  <!-- <div class="input-group-prepend">
                      <span class="input-group-text">Car Image</span>
                  </div> -->
                  <div class="custom-file">
                      <input type="file" class="custom-file-input updatecarImage" name="updatecarImage" id="updatecarImage" accept="image/x-png,image/gif,image/jpeg">
                      <label class="custom-file-label" for="updatecarImage">Choose file</label>
                  </div>
                  </div>      
              </div>
              <div class="col text-left">
                  <input type="submit" class="btn btn-info updateButton" value="update">
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

    <!--  Edit Model   -->
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success text-white">
            <h5 class="modal-title ">Message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <h3>Customer and Witness can't be the same Person!</h3>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
    </div>
      <?php include('includes/footer-links.php'); ?>
      <script src="js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            // custom file input change event
            bsCustomFileInput.init();
            // initiaing the table contents 
            loadTable("");
          
          // initiating the custom search drop down
            $('#person_id').select2();
            $('#updateperson_id').select2();
        
            // initiaing the table contents 
            loadTable("");
        
            // resetting function 
            function clearForm() {
                $('#insertForm')[0].reset();
             $('#updateForm')[0].reset();
            }
            // validation function
            function validateValue(value) {
                if(!$.isNumeric(value) || value.trim()=="")
                return false;
                else 
                return true;
            }
           
            // load contents table
            function loadTable(value){
                $.ajax({
                    url: 'server/process.php',
                    type: 'post',
                    data:{
                        actionString:'viewPurchases',
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

                // validating file type name
                function validateFileType(fileName){
                var dot = fileName.lastIndexOf(".")+1;
                var extentionFile = fileName.substr(dot,fileName.length).toLowerCase();
                if(extentionFile=="jpg" || extentionFile=="jpeg" || extentionFile=="png")
                return true;
                else 
                return false;  
            }
            // search using ajax

            $('#searchBox').keypress(function(e){
                loadTable($(this).val());
            });
                // save request
            $('#insertForm').on('submit',function(e){
                e.preventDefault();
                
                var car_plate_number = $('#insertForm .car_platenumber');
                var car_value =$('#insertForm .carImage');
                var car_price = $('#insertForm .car_price');
                var car_manufacture_date = $('#insertForm .car_manufacture_date');
                var car_import_date = $('#insertForm .car_import_date');
                var person_id = $('#insertForm .person_id');
                var company_id = $('#insertForm .company_id');
                var color_id = $('#insertForm .color_id');
                var engine_id = $('#insertForm .engine_id');
                var model_id = $('#insertForm .model_id');
                var imageLabel = $('#insertForm .custom-file-label');
                car_plate_number.removeClass('inputError');
                car_price.removeClass('inputError');
                car_manufacture_date.removeClass('inputError');
                car_import_date.removeClass('inputError');
                person_id.removeClass('inputError');
                company_id.removeClass('inputError');
                color_id.removeClass('inputError');
                engine_id.removeClass('inputError');
                model_id.removeClass('inputError');    
                if(validateValue(car_price.val())==false){
                        car_price.addClass('inputError');
                } else if(validateValue(car_plate_number.val())==false) {
                    car_plate_number.addClass('inputError');
                } else if(car_import_date.val().trim()=="") {
                    car_import_date.addClass('inputError');
                } else if(car_manufacture_date.val().trim()==""){
                    car_manufacture_date.addClass('inputError');
                }else if(car_value.val().trim()=="" || validateFileType(car_value.val())==false){
                    imageLabel.addClass('inputError');
                }
                else {

                    var data=new FormData(this);
                    data.append('actionString','insertCar');
                $.ajax({
                    url: 'server/process.php',
                    type: 'post',
                    cache:false,
                    processData:false,
                    contentType:false,
                    data:data,
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
                                $('.alertBox p').html('<strong>Error: </strong>Faied to Add the Car!, Seems the Car with this plate number arleady exist.');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                        }
                    }
                });
                }
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
                            actionString:'carRecord',
                            id:id
                        },
                        success:function(response){
                        $('#updateForm .updatecar_platenumber').val(response.car_platenumber);
                         $('#updateForm .updatecar_price').val(response.car_price);
                         $('#updateForm .updatecar_manufacture_date').val(response.car_manufacture_date);
                         $('#updateForm .updatecar_import_date').val(response.car_import_date);
                        $('#updateForm .updateperson_id option').each(function() {
                        if (response.owner_id == $(this).val()) {
                            $(this).attr('selected', 'selected');
                        } else {
                            $(this).removeAttr('selected');
                        }});
                        $('#updateForm .updatecolor_id option').each(function() {
                        if (response.color_id == $(this).val()) {
                            $(this).attr('selected', 'selected');
                        } else {
                            $(this).removeAttr('selected');
                        }});
                         
                        $('#updateForm .updatecompany_id option').each(function() {
                        if (response.company_id == $(this).val()) {
                            $(this).attr('selected', 'selected');
                        } else {
                            $(this).removeAttr('selected');
                        }});
                        $('#updateForm .updatemodel_id option').each(function() {
                        if (response.model_id == $(this).val()) {
                            $(this).attr('selected', 'selected');
                        } else {
                            $(this).removeAttr('selected');
                        }});
                        $('#updateForm .updateengine_id option').each(function() {
                        if (response.engine_id == $(this).val()) {
                            $(this).attr('selected', 'selected');
                        } else {
                            $(this).removeAttr('selected');
                        }});
                        }
                    });
                });

                // update request
            $('#updateForm').on('submit',function(e){
                e.preventDefault();
                
                var car_plate_number = $('#updateForm .updatecar_platenumber');
                var car_value =$('#updateForm .updatecarImage');
                var car_price = $('#updateForm .updatecar_price');
                var car_manufacture_date = $('#updateForm .updatecar_manufacture_date');
                var car_import_date = $('#updateForm .updatecar_import_date');
                var person_id = $('#updateForm .updateperson_id');
                var company_id = $('#updateForm .updatecompany_id');
                var color_id = $('#updateForm .updatecolor_id');
                var engine_id = $('#updateForm .updateengine_id');
                var model_id = $('#updateForm .updatemodel_id');
                var imageLabel = $('#updateForm .custom-file-label');
                car_plate_number.removeClass('inputError');
                car_price.removeClass('inputError');
                car_manufacture_date.removeClass('inputError');
                car_import_date.removeClass('inputError');
                person_id.removeClass('inputError');
                company_id.removeClass('inputError');
                color_id.removeClass('inputError');
                engine_id.removeClass('inputError');
                model_id.removeClass('inputError');    
                if(validateValue(car_price.val())==false){
                        car_price.addClass('inputError');
                } else if(validateValue(car_plate_number.val())==false) {
                    car_plate_number.addClass('inputError');
                } else if(car_import_date.val().trim()=="") {
                    car_import_date.addClass('inputError');
                } else if(car_manufacture_date.val().trim()==""){
                    car_manufacture_date.addClass('inputError');
                }else if(car_value.val()!="" && validateFileType(car_value.val())==false)
                {
                    imageLabel.addClass('inputError');
                }
                else {

                    var data=new FormData(this);
                    data.append('actionString','updateCar');
                $.ajax({
                    url: 'server/process.php',
                    type: 'post',
                    cache:false,
                    processData:false,
                    contentType:false,
                    data:data,
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
                                $('.alertBox p').html('<strong>Error: </strong>Duplicate car Platenumber is not allowed!');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);                        }
                    }
                });
                }
            });

          });
        </script>
</body>

</html>