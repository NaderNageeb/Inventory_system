<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $cat_name = $_POST['cat_name'];
        
              switch($_GET['action']){
                case 'add':  
                
                    $query = "INSERT INTO category
                              (`CNAME`)
                              VALUES ('{$cat_name}')";
                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
                    break;
                    }
             
            ?>
              <script type="text/javascript">window.location = "category.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>