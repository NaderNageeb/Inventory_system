<?php
 $db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'nesma' ) or die(mysqli_error($db));

        mysqli_set_charset($db,'UTF8');
mysqli_query($db,"SET NAMES 'utf8'");
mysqli_query($db,'SET CHARACTER SET utf8');


$conn =   mysqli_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'nesma' ) or die(mysqli_error($db));


mysqli_set_charset($conn,'UTF8');
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_query($conn,'SET CHARACTER SET utf8');




function Search($pname,$cname,$sname,$fdate,$tdate){

        global $db;


if($pname !='' && $cname == '' && $sname == '' &&  $fdate == ''  && $tdate == ''){

$sql="SELECT * FROM `transaction`T , `product`P , `transaction_details`ts ,`category`c , `supplier`s , `customer`u

where
 T.`CUST_ID` = u.`CUST_ID`
 and P.SUPPLIER_ID = s.`SUPPLIER_ID` 
 and P.`CATEGORY_ID` = c.`CATEGORY_ID`
 and ts.`TRANS_D_ID` = T.`TRANS_D_ID`
 and ts.`PRODUCTS` = P.`NAME` 
 and ts.`PRODUCTS` = '$pname' ";

}
if($pname =='' && $cname != '' && $sname == '' &&  $fdate == ''  && $tdate == ''){

        $sql="SELECT * FROM `transaction`T , `product`P , `transaction_details`ts ,`category`c , `supplier`s , `customer`u
        
        where
         T.`CUST_ID` = u.`CUST_ID`
         and P.SUPPLIER_ID = s.`SUPPLIER_ID` 
         and P.`CATEGORY_ID` = c.`CATEGORY_ID`
         and ts.`TRANS_D_ID` = T.`TRANS_D_ID`
         and ts.`PRODUCTS` = P.`NAME` 
         and u.`FIRST_NAME` LIKE '%$cname%' ";
        
}
if($pname =='' && $cname == '' && $sname != '' &&  $fdate == ''  && $tdate == ''){

        $sql="SELECT * FROM `transaction`T , `product`P , `transaction_details`ts ,`category`c , `supplier`s , `customer`u
        
        where
         T.`CUST_ID` = u.`CUST_ID`
         and P.SUPPLIER_ID = s.`SUPPLIER_ID` 
         and P.`CATEGORY_ID` = c.`CATEGORY_ID`
         and ts.`TRANS_D_ID` = T.`TRANS_D_ID`
         and ts.`PRODUCTS` = P.`NAME` 
         and ts.`EMPLOYEE` LIKE '%$sname%' ";
        
}

if($pname =='' && $cname == '' && $sname == '' &&  $fdate != ''  && $tdate == ''){

        $sql="SELECT * FROM `transaction`T , `product`P , `transaction_details`ts ,`category`c , `supplier`s , `customer`u
        
        where
         T.`CUST_ID` = u.`CUST_ID`
         and P.SUPPLIER_ID = s.`SUPPLIER_ID` 
         and P.`CATEGORY_ID` = c.`CATEGORY_ID`
         and ts.`TRANS_D_ID` = T.`TRANS_D_ID`
         and ts.`PRODUCTS` = P.`NAME` 
         and T.`DATE` LIKE '%{$fdate}%' ";
        
}

if($pname =='' && $cname == '' && $sname == '' &&  $fdate == ''  && $tdate != ''){

        $sql="SELECT * FROM `transaction`T , `product`P , `transaction_details`ts ,`category`c , `supplier`s , `customer`u
        
        where
         T.`CUST_ID` = u.`CUST_ID`
         and P.SUPPLIER_ID = s.`SUPPLIER_ID` 
         and P.`CATEGORY_ID` = c.`CATEGORY_ID`
         and ts.`TRANS_D_ID` = T.`TRANS_D_ID`
         and ts.`PRODUCTS` = P.`NAME` 
         and T.`DATE` LIKE '%{$tdate}%' ";
        
}

if($pname =='' && $cname == '' && $sname == '' &&  $fdate != ''  && $tdate != ''){

   $sql="SELECT * FROM `transaction`T , `product`P , `transaction_details`ts ,`category`c , `supplier`s , `customer`u
        
        where
         T.`CUST_ID` = u.`CUST_ID`
         and P.SUPPLIER_ID = s.`SUPPLIER_ID` 
         and P.`CATEGORY_ID` = c.`CATEGORY_ID`
         and ts.`TRANS_D_ID` = T.`TRANS_D_ID`
         and ts.`PRODUCTS` = P.`NAME` 
         and T.`DATE` BETWEEN '{$fdate}' and '{$tdate}' ";
        
}
if($pname !='' && $cname != '' && $sname != '' &&  $fdate != ''  && $tdate == ''){

        $sql="SELECT * FROM `transaction`T , `product`P , `transaction_details`ts ,`category`c , `supplier`s , `customer`u
             
             where
              T.`CUST_ID` = u.`CUST_ID`
              and P.SUPPLIER_ID = s.`SUPPLIER_ID` 
              and P.`CATEGORY_ID` = c.`CATEGORY_ID`
              and ts.`TRANS_D_ID` = T.`TRANS_D_ID`
              and ts.`PRODUCTS` = P.`NAME` 
              and ts.`PRODUCTS` = '$pname'
              and u.`FIRST_NAME` LIKE '%$cname%' 
              and s.`COMPANY_NAME` LIKE '%$sname%'
              and T.`DATE` LIKE '%{$fdate}%'";
             
     }

     if($pname !='' && $cname != '' && $sname != '' &&  $fdate == ''  && $tdate != ''){

        $sql="SELECT * FROM `transaction`T , `product`P , `transaction_details`ts ,`category`c , `supplier`s , `customer`u
             
             where
              T.`CUST_ID` = u.`CUST_ID`
              and P.SUPPLIER_ID = s.`SUPPLIER_ID` 
              and P.`CATEGORY_ID` = c.`CATEGORY_ID`
              and ts.`TRANS_D_ID` = T.`TRANS_D_ID`
              and ts.`PRODUCTS` = P.`NAME` 
              and ts.`PRODUCTS` = '$pname'
              and u.`FIRST_NAME` LIKE '%$cname%' 
              and s.`COMPANY_NAME` LIKE '%$sname%'
              and T.`DATE` LIKE '%{$tdate}%'";
             
     } 



     if($pname !='' && $cname != '' && $sname != '' &&  $fdate != ''  && $tdate != ''){

        $sql="SELECT * FROM `transaction`T , `product`P , `transaction_details`ts ,`category`c , `supplier`s , `customer`u
             
             where
              T.`CUST_ID` = u.`CUST_ID`
              and P.SUPPLIER_ID = s.`SUPPLIER_ID` 
              and P.`CATEGORY_ID` = c.`CATEGORY_ID`
              and ts.`TRANS_D_ID` = T.`TRANS_D_ID`
              and ts.`PRODUCTS` = P.`NAME` 
              and ts.`PRODUCTS` = '$pname'
              and u.`FIRST_NAME` LIKE '%$cname%' 
              and s.`COMPANY_NAME` LIKE '%$sname%'
              and T.`DATE` BETWEEN '{$fdate}' and '{$tdate}'";
             
     } 




if($query = mysqli_query($db,$sql)){

return $query;

}else{
 echo "<script>alert('Sorry !! No Data For This Search');window.location = 'reports.php' ;</script>";
// echo $sql;
}

}



function Search_2($fdate,$tdate){


global $db;
if($fdate !='' && $tdate !=''){
$sql="SELECT * FROM `transaction`T,`customer`u where T.`CUST_ID` = u.`CUST_ID` and T.`DATE` BETWEEN '{$fdate}' and '{$tdate}' and T.`delivery_price` !='' ";
}

if($fdate !='' && $tdate ==''){
 $sql="SELECT * FROM `transaction`T,`customer`u where T.`CUST_ID` = u.`CUST_ID` and T.`DATE` LIKE '%{$fdate}%' and  T.`delivery_price` !='' ";
}
if($fdate =='' && $tdate !=''){
$sql="SELECT * FROM `transaction`T,`customer`u where T.`CUST_ID` = u.`CUST_ID` and T.`DATE` LIKE '%{$tdate}%' and  T.`delivery_price` !='' ";
}
        
 if($query = mysqli_query($db,$sql)){

 return $query;
                
 }else{
  echo "<script>alert('Sorry !! No Data For This Search');window.location = 'reports.php' ;</script>";
                // echo $sql;
   }


}

















?>