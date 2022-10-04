<?php
include'../includes/connection.php';
session_start();

              $date = $_POST['date'];
              $customer = $_POST['customer'];
              $subtotal = $_POST['subtotal'];
              $total = $_POST['total'];
              $cash = $_POST['cash'];
              $emp = $_POST['employee'];
              $rol = $_POST['role'];
              $today = date("mdGis"); 
               $diff =  $total-$cash;
              
              $countID = count($_POST['name']);


              $countID;
              if($diff == 0 ){
            $delvary =  $countID * 5000;
              }elseif($diff != 0){

                  $last = $countID-($diff / 5000);

                 $delvary = $last * 5000;

              }

              // echo "<table>";
              switch($_GET['action']){
                case 'add':  
                  for($i=1; $i<=$countID; $i++)
                  {
                    $user_qty = $_POST['quantity'][$i-1];
                  }
                     $qtyall = implode(',',$_POST['quantity']);
                     $proidall = implode(',',$_POST['pro_id']);

                  $sql_all = "SELECT * FROM `product` where PRODUCT_ID IN ($proidall) ";
                 if ($query = mysqli_query($db, $sql_all)) {
                  
                while ($row  = mysqli_fetch_array($query)){
                
                  
                   $qty_stock = $row['QTY_STOCK']; "<br>";
                    $user_qty ;
                  $pro_id = $row['PRODUCT_ID']; "<br>";

                   $sql = "SELECT * FROM `product` where PRODUCT_ID = $pro_id ";
                   $query_2 = mysqli_query($db,$sql);
                    $rows  = mysqli_fetch_array($query_2);
                    $new_qty = $rows['QTY_STOCK'] - $user_qty ;
                   
                  $sql_update = "UPDATE product SET QTY_STOCK = $new_qty Where PRODUCT_ID = $pro_id  ";
                   $query_update = mysqli_query($db,$sql_update);  
                } 
              
                for($i=1; $i<=$countID; $i++)
                  {
             
                    $query = "INSERT INTO `transaction_details`
                               (`ID`, `TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`)
                               VALUES (Null, '{$today}', '".$_POST['name'][$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '{$emp}', '{$rol}')";

                    mysqli_query($db,$query)or die (mysqli_error($db));

                    }
                    $query111 = "INSERT INTO `transaction`
                               (`TRANS_ID`, `CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`,`deffrent`,`delivery_price`)
                               VALUES (Null,'{$customer}','{$countID}','{$subtotal}','0','0','0','{$total}','{$cash}','{$date}','{$today}','$diff','$delvary')";
                    mysqli_query($db,$query111)or die (mysqli_error($db));

                break;
              }
            }
                  unset($_SESSION['pointofsale']);
               ?>
              <script type="text/javascript">
                alert("Success.");
                window.location = "pos.php";
              </script>
          </div>



























<?php
              // switch($_GET['action']){
              //   case 'add':     
              //       $query = "INSERT INTO transaction_details
              //                  (`ID`, `PRODUCTS`, `EMPLOYEE`, `ROLE`)
              //                  VALUES (Null, 'here', '{$emp}', '{$rol}')";
              //       mysqli_query($db,$query)or die ('Error in Database '.$query);
              //       $query2 = "INSERT INTO `transaction`
              //                  (`TRANS_ID`, `CUST_ID`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`)
              //                  VALUES (Null,'{$customer}','{$subtotal}','{$lessvat}','{$netvat}','{$addvat}','{$total}','{$cash}','{$date}','{$today}'')";
              //       mysqli_query($db,$query2)or die ('Error in updating Database2 '.$query2);
              //   break;
              // }

              // mysqli_query($db,"INSERT INTO transaction_details
              //                 (`ID`, `PRODUCTS`, `EMPLOYEE`, `ROLE`)
              //                 VALUES (Null, 'a', '{$emp}', '{$rol}')");

              // mysqli_query($db,"INSERT INTO `transaction`
              //                 (`TRANS_ID`, `CUST_ID`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_DETAIL_ID`)
              //                 VALUES (Null,'{$customer}',{$subtotal},{$lessvat},{$netvat},{$addvat},{$total},{$cash},'{$date}',(SELECT MAX(ID) FROM transaction_details))");

              // header('location:posdetails.php');

            ?>
<!--  <script type="text/javascript">
      alert("Transaction successfully added.");
      window.location = "pos.php";
      </script> -->