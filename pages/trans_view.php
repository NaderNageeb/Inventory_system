<!-- <style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style> -->

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
 $query = 'SELECT *, FIRST_NAME, LAST_NAME, PHONE_NUMBER, EMPLOYEE, ROLE
              FROM transaction T
              JOIN customer C ON T.`CUST_ID`=C.`CUST_ID`
              JOIN transaction_details tt ON tt.`TRANS_D_ID`=T.`TRANS_D_ID`
              WHERE TRANS_ID ='.$_GET['id'];
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        while ($row = mysqli_fetch_assoc($result)) {
          $fname = $row['FIRST_NAME'];
          $lname = $row['LAST_NAME'];
          $pn = $row['PHONE_NUMBER'];
          $date = $row['DATE'];
          $tid = $row['TRANS_D_ID'];
          $cash = $row['CASH'];
          $sub = $row['SUBTOTAL'];
          $less = $row['LESSVAT'];
          $net = $row['NETVAT'];
          $add = $row['ADDVAT'];
          $grand = $row['GRANDTOTAL'];
          $role = $row['EMPLOYEE'];
          $roles = $row['ROLE'];
          $discount = $row['deffrent'];
          $delevary = $row['delivery_price'];
        }
?>
            
          <div class="card shadow mb-4">
            <div class="card-body" id='printMe'>

              <div class="form-group row text-left mb-0">
                <div class="col-sm-9">
                <!-- <div id='printMe'> -->
                <img  src="123.jpg"  width="150px" height="150px">
                  <center>
                  <h5 class="font-weight-bold" style="margin-left:400px ;" >
                 
                     مركز بيع وصيانة منتجات نسمة
                     
                     </center>
                     <center style="margin-left:400px ;">
فاتورة مبيعات
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
       
<hr>
<br>
<br>
<br>

              <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1">
                  <h6 class="font-weight-bold">
                   Customer Name : <?php echo $fname; ?> <?php echo $lname; ?>
                  </h6>
                  <h6>
                    Phone: <?php echo $pn; ?>
                  </h6>
                </div>
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-4 py-1">
                <h6>
                    Date: <?php echo $date; ?>
                  </h6>
                  <h6>
                    Transaction #<?php echo $tid; ?>
                  </h6>
                  <h6 class="font-weight-bold">
                   Seller Name: <?php echo $role; ?>
                  </h6>
                  <h6>
                    <?php echo $roles; ?>
                  </h6>
                  <h6 class="font-weight-bold">
                   Status: <span>Success</span>
                  </h6>
                </div>
              </div>
              
              <br>
              <br>
              <br>

          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Products</th>
                <th width="8%">Qty</th>
                <th width="20%">Price</th>
                <th width="20%">Subtotal</th>
              </tr>
            </thead>
            <tbody>
<?php  
           $query = 'SELECT *
                     FROM transaction_details
                     WHERE TRANS_D_ID ='.$tid;
            $result = mysqli_query($db, $query) or die (mysqli_error($db));
            while ($row = mysqli_fetch_assoc($result)) {
              $Sub =  $row['QTY'] * $row['PRICE'];
                echo '<tr>';
                echo '<td>'. $row['PRODUCTS'].'</td>';
                echo '<td>'. $row['QTY'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                echo '<td>'. $Sub.'</td>';
                echo '</tr> ';
                        }
?>
            </tbody>
          </table>
            <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-3 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h4>
                    Cash Amount: SDG <?php echo $cash; ?>
                  </h4>
                  <table width="100%">
                    <tr>
                      <td class="font-weight-bold">Subtotal</td>
                      <td class="text-right">SDG <?php echo $sub; ?></td>
                    </tr>
                    <!-- <tr>
                      <td class="font-weight-bold">Delivary</td>
                      <td class="text-right">SDG 7000</td>
                    </tr> -->
                     <!-- <tr>
                      <td class="font-weight-bold">Delivary Price</td>
                      <td class="text-right">SDG <?php //echo $delevary ; ?></td>
                    </tr>  -->
                     <tr>
                      <td class="font-weight-bold">Discount</td>
                      <td class="text-right">SDG <?php if($discount == "")echo '0'; else echo $discount ; ?></td>
                    </tr> 
                    <tr>
                      <td class="font-weight-bold">Total</td>
                      <td class="font-weight-bold text-right text-primary">SDG <?php echo $cash ; ?></td>
                    </tr>
                  </table>
                  <br>
              <button id="toggleButton" class="btn btn-primary bg-gradient-primary" onclick="printDiv('printMe');"  style=" border: none;
  color: white;

  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;" >Print</button>

                </div>
                
                <div class="col-sm-1 py-1"></div>

              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
           
              </div>
              <hr color="black">
           <div class="form-group row  mb-0 py-2">
                <div class="col-sm-4 py-1">
                  <h6 class="font-weight-bold" style="margin-left:30px;">
                    0119001166
                  </h6>
                  <h6 style="margin-left:30px;">
                  0113001155
                  </h6>
                  <h6 style="margin-left:30px;">
                  الخط الساخن 6860
                  </h6>
                </div>
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-4 py-1">
                <h6>
                    شكرا لاختياركم لنا
                  </h6>
                  <h6>
                  الموقع بحري شارع المزاد
                  </h6>
                  <h6 class="font-weight-bold">
                   TCL@tcl-sd.com
                  </h6>
             
                </div>
              </div>
           


<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
  

	</script>


            </div>
         
           
           

          </div>
          

         
<?php
include'../includes/footer.php';
?>
