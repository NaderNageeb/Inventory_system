<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}

?>


<center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
<div class="card-header py-3">
  <h4 class="m-2 font-weight-bold text-primary">Search</h4>
</div>
<!-- <a href="product.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a> -->
<div class="card-body">

<form action="" method="POST" >

  <div class="form-group row text-left text-primary">
    <div class="col-sm-3" style="padding-top: 5px;">
     Product Name:
    </div>
    <div class="col-sm-9">
      <input class="form-control" placeholder="Product Name" name="pname" >
    </div>
  </div>
  <div class="form-group row text-left text-primary">
    <div class="col-sm-3" style="padding-top: 5px;">
     Customer Name:
    </div>
    <div class="col-sm-9">
      <input class="form-control" placeholder="Customer Name" name="cname"  >
    </div>
  </div>
  <div class="form-group row text-left text-primary">
    <div class="col-sm-3" style="padding-top: 5px;">
     Seller Name:
    </div>
    <div class="col-sm-9">
      <input class="form-control" placeholder="Seller Name" name="sname"  >
    </div>
  </div>
  <div class="form-group row text-left text-primary">
    <div class="col-sm-3" style="padding-top: 5px;">
      Date From:
    </div>
    <div class="col-sm-9">
      <input class="form-control" type="date" placeholder="Date From" name="fdate"  >
    </div>
  </div>
  <div class="form-group row text-left text-primary">
    <div class="col-sm-3" style="padding-top: 5px;">
      Date To:
    </div>
    <div class="col-sm-9">
      <input class="form-control" type="date" placeholder="Date To" name="tdate"  >
    </div>
  </div>
<input type="submit" name="submit" value="Search" type="button" class="btn btn-primary bg-gradient-primary">
</form>
</div>
</div>

<?php

 if(isset($_POST['submit'])){
  $pname = $_POST['pname'];
  $cname = $_POST['cname'];
 $sname = $_POST['sname'];
  $fdate = $_POST['fdate'];
  $tdate = $_POST['tdate'];
  if($pname =='' && $cname =='' && $sname =='' && $fdate =='' && $tdate ==''){
   echo "<script>alert('Error !! Nothing Selected  ');window.location = 'reports.php' ;</script>";
   exit;
      }else{
?>
</center>

<div class="card shadow mb-4 col-xs-12 col-md-15 border-bottom-primary">
  <div class="card-header py-3">
    <h4 class="m-2 font-weight-bold text-primary">Report</h4>
  </div>
  <div class="card-body" id='printMe'>
  <div class="form-group row text-left mb-0">
                <div class="col-sm-9">
                <!-- <div id='printMe'> -->
                <center>
                <img  src="123.jpg" style="margin-left:280px ;" width="150px" height="150px">
                </center>
                  <center>
                  <h5 class="font-weight-bold" style="margin-left:280px ;" >
                 
                     مركز بيع وصيانة منتجات نسمة
                     
                     </center>
                     <center style="margin-left:280px ;">
                     تقارير المبيعات
</center>
                  </h5>
                
                </div>
                <div class="col-sm-3 py-1">
                  <h6>
                    <!-- Date: <?php //echo $date; ?> -->
                  </h6>
                </div>
              </div>
              <br>
              <br>

    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
     <thead>
         <tr>
         <th>Transaction Code</th>
           <th>Customer Name</th>
          
           <th>Product Name</th>
           <th>Quantity</th>
           <!-- <th>On Hand</th> -->
           <th>Category</th>
           <th>Supplier</th>
           <th>Date</th>
           <th>More</th>

         </tr>
     </thead>
<tbody>

<?php                  

          $search = Search($pname,$cname,$sname,$fdate,$tdate);
         }

  while ($row = mysqli_fetch_array($search)) {
                       
      echo '<tr>';
      echo '<td>'. $row['TRANS_D_ID'].'</td>';
      echo '<td>'. $row['FIRST_NAME'] .' '.$row['LAST_NAME']    .'</td>';
      echo '<td>'. $row['NAME'].'</td>';
      ?>
<td> 
      <?php 
      echo $qty = $row['QTY'];
      ?>  
    </td>

     <?php
      echo '<td>'. $row['CNAME'].'</td>';
      echo '<td>'. $row['COMPANY_NAME'].'</td>';
      echo '<td>'. $row['DATE'].'</td>';
      echo '<td align="right">
      <a type="button" class="btn btn-primary bg-gradient-primary" target="_blank" href="trans_view.php?action=edit & id='.$row['TRANS_ID'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
  </div> </td>';
      echo '</tr> ';
              }
?> 
                          
                      </tbody>
                  </table>



    <button id="toggleButton" class="btn btn-primary bg-gradient-primary" onclick="printDiv('printMe');"  style=" border: none;
  color: white;

  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;" >Print Table</button>
              </div>
          </div>
        </div>
            </center>
<?php } ?>

<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
  

	</script>




<?php
include'../includes/footer.php';
?>