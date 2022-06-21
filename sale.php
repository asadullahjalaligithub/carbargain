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
                 <h3 class="text-center text-white bg-primary p-3">Manage Car Sales</h3>
             </div>
         </div>
         <hr class="my-4">
            <form id="insertForm">
            <div class="row my-2">
                <div class="col-3 text-center">
                    <label for="car" class="text-center">Select Car</label>
                </div>
                <div class="col-6">
                <select class='form-control car' id='car' name='car'>
                    <?php $query = "select * from car inner join color on color.color_id=car.color_id inner join engine on engine.engine_id=car.engine_id where car.status='Purchased' and car.car_platenumber not in (select car_platenumber_id from sale) ";
                     $result=mysqli_query($connection,$query);
                     while($row=mysqli_fetch_assoc($result)){
                     echo "<option value='".$row['car_platenumber']."'>".$row['car_platenumber']." ".$row['car_price']." ".$row['engine_name']." ".$row['color_name']."</option>";
                     }?>

                </select> 
                </div>
    </div>
            <div class="row">     
                <div class="col-3 text-center">
                    <label for="customer" class="">Select Customer</label>
                </div>
                <div class="col-6">
                   <select class='form-control customer' id='customer' name='customer'>
                    <!-- <?php $query = "select * from person";
                     $result=mysqli_query($connection,$query);
                     while($row=mysqli_fetch_assoc($result)){
                     echo "<option value='".$row['person_id']."'>".$row['person_firstname']." ".$row['person_lastname']." ".$row['person_nic']." ".$row['person_phone']."</option>";
                     }?> -->

                </select> 
                </div>
    </div>
    <div class="row my-2">

                <div class="col-3 text-center">
                    <label for="witness" class="text-center">Select Witness</label>
                </div>
                <div class="col-6">
                <select class='form-control witness' id='witness' name='witness'>
                    <!-- <?php $query = "select * from person";
                     $result=mysqli_query($connection,$query);
                     while($row=mysqli_fetch_assoc($result)){
                     echo "<option value='".$row['person_id']."'>".$row['person_firstname']." ".$row['person_lastname']." ".$row['person_nic']." ".$row['person_phone']."</option>";
                     }?> -->

                </select> 
                </div>
            </div>
            
    <div class="row my-2">
                
                <div class="col-3 text-center">
                    <label for="description" class="text-center">Description</label>
                </div>
                <div class="col-6">
                    <input type="text" id="description" class="form-control description" name='description' placeholder="optional">
                </div>
          
    </div>
    <div class="row my-2">
                <div class="col-3 text-center">
                    <label for="price" class="text-center">Price</label>
                </div>
                <div class="col-6">
                    <input type="text" id="price" class="form-control price" name='price' placeholder="AFN">
                </div>
                <div class="col-3">
                    <input type='button' value="Save" class='btn btn-primary saveButton'>
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
                            <th>MDate</th>
                            <th>Company</th>
                            <th>Owner Info</th>
                            <th>witness Info</th>
                            <th>Customer Info</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Sale Date</th>
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
             <input type='hidden' name='sale_id' class='sale_id'>
             <div class="row my-2">
                <div class="col-3 text-center">
                    <label for="updateCar" class="text-center">Select Car</label>
                </div>
                <div class="col-6">
                <select class='form-control updateCar' id='updateCar' name='updateCar'>
                   
                </select> 
                </div>
    </div>
            <div class="row">     
                <div class="col-3 text-center">
                    <label for="updateCustomer" class="">Select Customer</label>
                </div>
                <div class="col-6">
                   <select class='form-control  updateCustomer' style="width:100%" id='updateCustomer' name='updateCustomer'>
                    <!-- <?php $query = "select * from person";
                     $result=mysqli_query($connection,$query);
                     while($row=mysqli_fetch_assoc($result)){
                     echo "<option value='".$row['person_id']."'>".$row['person_firstname']." ".$row['person_lastname']." ".$row['person_nic']." ".$row['person_phone']."</option>";
                     }?> -->

                </select> 
                </div>
    </div>
    <div class="row my-2">

                <div class="col-3 text-center">
                    <label for="updateWitness" class="text-center">Select Witness</label>
                </div>
                <div class="col-6">
                <select class='form-control updateWitness' style="width:100%" id='updateWitness' name='updateWitness'>
                    <!-- <?php $query = "select * from person";
                     $result=mysqli_query($connection,$query);
                     while($row=mysqli_fetch_assoc($result)){
                     echo "<option value='".$row['person_id']."'>".$row['person_firstname']." ".$row['person_lastname']." ".$row['person_nic']." ".$row['person_phone']."</option>";
                     }?> -->

                </select> 
                </div>
            </div>
            
    <div class="row my-2">
                
                <div class="col-3 text-center">
                    <label for="updateDescription" class="text-center">Description</label>
                </div>
                <div class="col-6">
                    <input type="text" id="updateDescription" class="form-control updateDescription" name='updateDescription' placeholder="optional">
                </div>
          
    </div>
    <div class="row my-2">
                <div class="col-3 text-center">
                    <label for="updatePrice" class="text-center">Price</label>
                </div>
                <div class="col-6">
                    <input type="text" id="updatePrice" class="form-control updatePrice" name='updatePrice' placeholder="AFN">
                    <div class='updateError'><p class='text-danger'></p></div>
                </div>
                <div class="col-3">
                    <input type='button' value="Update" class='btn btn-primary updateButton'>
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
            // car change event, witness and customer modification
           
            $('#car').change(function(){
                var value=$(this).val();
                $.ajax({
                    url:'server/process.php',
                    type:'post',
                    data:{
                        actionString:'changeCustomer',
                        value:value
                    },
                    success:function(response){
                            $('#customer').html(response);
                            $('#customer').select2();
                            $('#witness').html(response);
                            $('#witness').select2();
                    }
                });
            });

            $('#updateCar').change(function(){
                var value=$(this).val();
                $.ajax({
                    url:'server/process.php',
                    type:'post',
                    data:{
                        actionString:'changeCustomer',
                        value:value
                    },
                    success:function(response){
                            $('#updateCustomer').html(response);
                            $('#updateCustomer').select2();
                            $('#updateWitness').html(response);
                            $('#updateWitness').select2();
                    }
                });
            });

            $('#car').trigger('change');
            $('#customer').select2();
            $('#witness').select2();
            $('#car').select2();
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
           
            // load contents table
            function loadTable(value){
                $.ajax({
                    url: 'server/process.php',
                    type: 'post',
                    data:{
                        actionString:'viewSales',
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
            $('.saveButton').click(function(e){
                var customer = $('#insertForm .customer');
                var witness = $('#insertForm .witness');
                var car = $('#insertForm .car');
                var description = $('#insertForm .description');
                var price = $('#insertForm .price');
                customer.removeClass('inputError');
                witness.removeClass('inputError');
                car.removeClass('inputError');
                price.removeClass('inputError');
                description.removeClass('inputError');
                if(customer.val()==witness.val()){
                        customer.addClass('inputError');
                        witness.addClass('inputError');
                        $('#messageModal').modal('show');
                } else if(validateValue(price.val())){
                        price.addClass('inputError');
                } 
                else {
                $.ajax({
                    url: 'server/process.php',
                    type: 'post',
                    data: {
                        actionString:'insertSale',
                        price:price.val(),
                        customer:customer.val(),
                        witness:witness.val(),
                        car:car.val(),
                        description:description.val()
                    },
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
                                $('.alertBox p').html('<strong>Error: </strong>Faied to Add the Deal!');
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
                            actionString:'saleRecord',
                            id:id
                        },
                        success:function(response){
                        $('#updateForm .updateDescription').val(response.sale_description);
                         $('#updateForm .updatePrice').val(response.sale_price);
                         $('#updateForm .updateCar').html("<option value='"+response[0].car_platenumber+"'>"+response[0].car_platenumber+response[0].car_price+" "+response[0].engine_name+" "+response[0].color_name+"</option>");
                        $('#updateForm .updateWitness option').each(function() {
                        if (response.witness_id == $(this).val()) {
                            $(this).attr('selected', 'selected');
                        } else {
                            $(this).removeAttr('selected');
                        }});
                        $('#updateForm .updateCustomer option').each(function() {
                        if (response.customer_id == $(this).val()) {
                            $(this).attr('selected', 'selected');
                        } else {
                            $(this).removeAttr('selected');
                        }});
                         
                        
            $('#updateCar').trigger('change');
                        }
                    });
                });

             // update Request
             $('#updateForm .updateButton').click(function(e){
                var customer = $('#updateForm .updateCustomer');
                var witness = $('#updateForm .updateWitness');
                var car = $('#updateForm .updateCar');
                var description = $('#updateForm .updateDescription');
                var price = $('#updateForm .updatePrice');
                customer.removeClass('inputError');
                witness.removeClass('inputError');
                car.removeClass('inputError');
                price.removeClass('inputError');
                description.removeClass('inputError');
                $('.updateError p').text('');
                if(customer.val()==witness.val()){
                        $('.updateError p').text("Customer and Witness cannot be the same Person");
                } else if(validateValue(price.val())){
                        price.addClass('inputError');
                } 
                else {
                $.ajax({
                    url: 'server/process.php',
                    type: 'post',
                    data: {
                        actionString:'updateSale',
                        price:price.val(),
                        customer:customer.val(),
                        witness:witness.val(),
                        car:car.val(),
                        description:description.val()
                    },
                    success: function(response) {
                        if (response == "true") {
                           $.when(smothScrollingTop()).then( $('.alertBox').show('medium').addClass('alert-info').removeClass('alert-danger')
                           );
                                $('.alertBox p').html('<strong>Success! </strong>Record Updated.');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                                loadTable("");
                                $('#editModal').modal('hide');
                            clearForm();
                        } else {
                            $.when(smothScrollingTop()).then( $('.alertBox').show('medium').addClass('alert-danger').removeClass('alert-info')
                            );
                                $('.alertBox p').html('<strong>Error: </strong>Faied to Update the Deal!');
                                setTimeout(() => {
                                    $('.alertBox').slideUp(500);
                                }, 2000);
                                
                                $('#editModal').modal('hide');
                        }
                    }
                });
                }
                   
            });
          });
        </script>
</body>

</html>