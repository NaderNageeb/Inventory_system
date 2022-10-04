<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $name = $_POST['companyname'];
              // $prov = $_POST['province'];
              // $cit = $_POST['city'];
              $phone = $_POST['phonenumber'];
        
              switch($_GET['action']){
                case 'add':    
                  
                  $sql = "SELECT * FROM supplier where COMPANY_NAME = '{$name}' and PHONE_NUMBER = '{$phone}' ";

                  if( $query_check=mysqli_query($db,$sql))
                  If(mysqli_num_rows($query_check))
                  {
              // echo '<script>alert("This supplier Already Exist");<script>';
              // die ('Error in updating supplier in Database');
		 echo "<script>alert('Error !! This Supplier Already Exist ');window.location = 'supplier.php';</script>";


                  }else{

                    $query2 = "INSERT INTO supplier
                              (SUPPLIER_ID, COMPANY_NAME, PHONE_NUMBER)
                              VALUES (Null,'{$name}','".$phone."')";
                    // mysqli_query($db,$query2)or die ('Error in updating supplier in Database');
                    if(mysqli_query($db,$query2)){
		 
                      echo "<script>alert('Supplier Added Successfully');window.location = 'supplier.php';</script>";
                    }else{
                       echo "<script>alert('Supplier Added Faild');</script>";
                    }
                break;
              }
            }
            ?>
              <script type="text/javascript">window.location = "supplier.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>