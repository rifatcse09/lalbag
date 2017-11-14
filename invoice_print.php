<?php
session_start();
require_once('functions/cls_dbconfig.php');
function __autoload($classname){
    require_once("functions/$classname.class.php");
}
$user_id = $_SESSION['user_id'];
$invoice_id = $_GET['invoice'];
$cls_booking = new cls_booking();
$invd_q = $cls_booking->invoice_details($invoice_id);
$invd_row1 = $invd_q->fetch_assoc();
$order_date = $invd_row1['order_date'];
$delivery_date = $invd_row1['delivery_date'];
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {

            border:1px solid black;
            border-collapse: collapse;
        }
        table, th, td {
            padding:2px;

        }
        .td_class {
            font-size:11px;
            color:#800000;
        }
        .td_class_another {
            font-size:12px;
            text-align:right;
            border:1px solid black;
            border-collapse: collapse;

        }

    </style>

</head>
<style type="text/css" media="print">
    @page {
        size: auto;   /* auto is the initial value */
        margin: 0;  /* this affects the margin in the printer settings */
    }

</style>
<body style="padding-top:0px">

<!-- Page Content -->
<div  style="width:720px;height:336px;margin-left:10px">
    <div style="float:left;width:40%;margin-top:120px;margin-left:30px">

        <div style="width:100%;height:60px">
            <div class="order_no" style="float:left;width:40%">

                <div style="width:90%;text-align:center;font-weight: bold;">নং</div>

                <div style="border:1px solid black;width:90%;height:35px;font-size:15px;font-weight: bold;text-align:center;">
                    <?php echo $_GET['invoice'];?>
                </div>

            </div>
            <div class="order_delivery_date" style="float:left;width:60%">

                <div class="order_date" style="font-size: 13px;color:red;"> অর্ডার তারিখঃ <span style=" font-weight: bold;letter-spacing: 3px;color:red;"><?php echo date('d-m-y',strtotime($order_date)); ?> </span></div>
                <div class="delivery_date" style="font-size: 13px;color:red;">ডেলিভারিঃ  <span style=" font-weight: bold;margin-left: 20px;letter-spacing: 3px;color:red;"><?php echo date('d-m-y',strtotime($delivery_date)); ?></span></div>

            </div>

        </div>
        <div style="width:100%;margin-top:10px;">
            <div style="width:100%;height:25px;border:1px solid black;font-size:14px;font-weight: bold;margin-bottom: 3px;color:#000080;"> <span style='margin-left:5px;'> নামঃ </span><?php echo $invd_row1['name']?> </div>
            <div style="width:100%;height:25px;border:1px solid black;font-size:14px;font-weight: bold;color:#000080;"><span style='margin-left:5px;'>   মোবাইলঃ </span><?php echo $invd_row1['mobile']?> </div>

        </div>

    </div>

    <div style="float:right;width:50%;margin-top:70px;">
        <table style="width:90%;">
            <tr>

                <th style="font-size: 12px;border-bottom: 1px solid black;color:#800000;"> বিবরণ</th>
                <th colspan="2" style="font-size: 12px;border-left: 1px solid black;"> টাকা</th>
            </tr>
            <tr>
                <td  class="td_class" > * পাঞ্জাবী / শেরওয়ানী <span style="margin-left: 5px;font-weight: bold;letter-spacing: 1px"><?php echo ($invd_row1['panjabi']+$invd_row1['sherwani'])== 0?'': ($invd_row1['panjabi']+$invd_row1['sherwani']).'pc'?></span>
                    <br> * একছাটা পাঞ্জাবী <span style="margin-left: 22px;font-weight: bold"> <?php echo ($invd_row1['akchata'] == 0)?'':$invd_row1['akchata'].'pc' ?></span>
                </td>

                <td class="td_class_another">কাপড় - </td>
                <td class="td_class_another"><?php echo ($invd_row1['cloth'] == 0.00)?'':$invd_row1['cloth'].'/='?></td>
            </tr>
            <tr>
                <td class="td_class"> * আলিগড় / ধুতি <span style="margin-left: 30px;font-weight: bold"><?php echo ($invd_row1['aligod']+$invd_row1['dhuti'])== 0?'': ($invd_row1['aligod']+$invd_row1['dhuti']).'pc'?></span>
                    <br> * সেলোয়ার / চুড়ি  <span style="margin-left: 25px;font-weight: bold"><?php echo ($invd_row1['saluar']+$invd_row1['cudi'])== 0?'': ($invd_row1['saluar']+$invd_row1['cudi']).'pc'?></span> </td>

                <td class="td_class_another" >মজুরী - </td>
                <td class="td_class_another"><?php echo ($invd_row1['salary']== 0.00)?'':$invd_row1['salary'].'/='?></td>
            </tr>
            <tr>
                <td class="td_class"> * কাবলী স্যুট  <span style="margin-left: 45px;font-weight: bold"> <?php echo ($invd_row1['kabli'] == 0)?'':$invd_row1['kabli'].'pc' ?></span>
                    <br> * এরাবিয়ান জুব্বা   <span style="margin-left: 25px;font-weight: bold"> <?php echo ($invd_row1['jubba'] == 0)?'':$invd_row1['jubba'].'pc' ?></span>  </td>

                <td class="td_class_another"> মোট - </td>
                <td class="td_class_another"><?php echo ($invd_row1['total']== 0.00)?'':$invd_row1['total'].'/='?></td>
            </tr>
            <tr>
                <td class="td_class"> * ফতুয়া  <span style="margin-left: 65px;font-weight: bold"> <?php echo ($invd_row1['phatua'] == 0)?'':$invd_row1['phatua'].'pc' ?></span>
                    <br> * বেল্ট সেলোয়ার <span style="margin-left: 25px;font-weight: bold"> <?php echo ($invd_row1['veltsaluar'] == 0)?'':$invd_row1['veltsaluar'].'pc' ?></span>
                </td>

                <td class="td_class_another"> অগ্রিম - </td>
                <td class="td_class_another"><?php echo ($invd_row1['advance']== 0.00)?'':$invd_row1['advance'].'/='?></td>
            </tr>
            <tr>
                <td class="td_class"> * এমব্র য়ডারী <span style="margin-left: 40px;font-weight: bold"> <?php echo ($invd_row1['ambrodary'] == 0)?'':$invd_row1['ambrodary'].'pc' ?></span>  </td>

                <td class="td_class_another"> বাকী -  </td>
                <td class="td_class_another"><?php echo ($invd_row1['due']== 0.00)?'':$invd_row1['due'].'/='?></td>
            </tr>
            <tr>
                <td class="td_class"></td>

                <td class="td_class_another"> ডিসকাউন্ট  -  </td>
                <td class="td_class_another"><?php echo ($invd_row1['discount']== 0.00)?'':$invd_row1['discount'].'/='?></td>
            </tr>

        </table>

    </div>
    <!--<div style="float:left;margin-top:40px;margin-left:300px;width:100%">fgfdgfgfdgfdg</div>-->

</div>
<!-- /.container -->

<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>