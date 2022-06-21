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
            loadTable("");
          
        
            // initiaing the table contents 
            loadTable("");
        
           
            // load contents table
            function loadTable(value){
                $.ajax({
                    url: 'server/process.php',
                    type: 'post',
                    data:{
                        actionString:'adminViewPurchase',
                        value:value
                    },
                    success: function(response) {
                        $('#tableContents').html(response);
                    }
                });
            }

            $('#searchBox').keypress(function(e){
                loadTable($(this).val());
            });

          // confirm button
          // edit request to retrieve record
        $('#tableContents').on('click','.confirmButton',function(){ 
            var id = $(this).val();
            var value=$(this).html();
                    $.ajax({
                        url:'server/process.php',
                        type:'post',
                        data:{
                            actionString:'confirmPurchase',
                            id:id,
                            value:value
                        },
                        success:function(response){
                            if(response.trim()=='true')
                            {
                                loadTable($('#searchBox').val());
                            }
                        }
                    });
                });
        

        // deleteButton ajax request
        $('#tableContents').on('click','.deleteButton',function(){ 
            var id = $(this).val();
                    $.ajax({
                        url:'server/process.php',
                        type:'post',
                        data:{
                            actionString:'deletePurchase',
                            id:id
                        },
                        success:function(response){
                            if(response.trim()=='true')
                            {
                                loadTable($('#searchBox').val());
                            }
                        }
                    });
                });
          });
        </script>
</body>

</html>