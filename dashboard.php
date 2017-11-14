<?php 
    require_once("include/header.php");
/*today sale query*/
if($user_type == "admin")
{
    $today_q = $cls_sales->today_sale_count();
	$total_sale_q = $cls_sales->total_sale_count();
    // $total_sale_q = $cls_sales->total_sale_count_admin();
	//$total_sale_row = $total_sale_q->fetch_assoc();
    
    $total_pur_q = $cls_purchase->total_pur_count_admin();
	$total_pur_row = $total_pur_q->fetch_assoc();
    
} else {
    $today_q = $cls_sales->today_sale_count($user_id);
    $total_sale_q = $cls_sales->total_sale_count($user_id);
    
    $today_sales_item = $cls_sales->today_sale_item($user_id);
    $today_item_sale_row = $today_sales_item->fetch_assoc();    
    
	
	$total_sales_item = $cls_sales->total_sale_item_user($user_id);
    $total_item_sale_row = $total_sales_item->fetch_assoc();
}

    $today_row = $today_q->fetch_assoc();
    $total_sale_row = $total_sale_q->fetch_assoc();
	
	

/*end*/

?>
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Dashboard</h1>
          <h2 class="">Subtitle goes here...</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="dashboard">DASHBOARD</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </div>
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <div class="row">
          <div class="col-sm-3 col-sm-6">
            <div class="information green_info">   
              <div class="information_inner">
              	<div class="info green_symbols"><i class="fa fa-users icon"></i></div>
                <span>TODAY SALES </span>
                <h2 class="bolded"><?php echo number_format($today_row['today_sale']).'/='; ?></h2>
                <div class="infoprogress_green">
                  <div class="greenprogress"></div>
                </div>
              </div>
            </div>
          </div>
           <?php
    if($user_type == "admin")
    {
?>
          <div class="col-sm-3 col-sm-6">
            <div class="information green_info">   
              <div class="information_inner">
              	<div class="info green_symbols"><i class="fa fa-users icon"></i></div>
                <span>TOTAL SALES </span>
                <h2 class="bolded"><?php echo number_format($total_sale_row['total_sale']).'/='; ?></h2>
                <div class="infoprogress_green">
                  <div class="greenprogress"></div>
                </div>
              </div>
            </div>
          </div>
          <?php
    }
    if($user_type == "employee")
    {
?>
          <div class="col-sm-3 col-sm-6">
            <div class="information blue_info">
              <div class="information_inner">
              <div class="info blue_symbols"><i class="fa fa-shopping-cart icon"></i></div>
                <span>TODAY SALES ITEMS</span>
                <h1 class="bolded"><?php echo $today_item_sale_row['today_item']?> </h1>
                <div class="infoprogress_blue">
                  <div class="blueprogress"></div>
                </div>
                <b class=""><small>Better than yesterday ( 7,5% )</small></b>
                <div class="pull-right" id="work-progress2">
                  <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;" width="47" height="25"></canvas>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-sm-3 col-sm-6">
            <div class="information blue_info">
              <div class="information_inner">
              <div class="info blue_symbols"><i class="fa fa-shopping-cart icon"></i></div>
                <span>TOTAL SALES ITEMS</span>
                <h1 class="bolded"><?php echo $total_item_sale_row['total_item']?> </h1>
                <div class="infoprogress_blue">
                  <div class="blueprogress"></div>
                </div>
              </div>
            </div>
          </div>
          
          <?php } if($user_type == "admin") { ?>
         <!-- <div class="col-sm-3 col-sm-6">
            <div class="information red_info">
              <div class="information_inner">
              <div class="info red_symbols"><i class="fa fa-comments icon"></i></div>
                <span>TOTAL PURCHASE</span>
                <h2 class="bolded"><?php /*echo number_format($total_pur_row['total_purchase']).'/='; */?></h2>
                <div class="infoprogress_red">
                  <div class="redprogress"></div>
                </div>
              </div>
            </div>
          </div>-->
          <?php } if($user_type == "employee") { ?>
          <div class="col-sm-3 col-sm-6">
            <div class="information green_info">   
              <div class="information_inner">
              	<div class="info green_symbols"><i class="fa fa-users icon"></i></div>
                <span>TOTAL SALES </span>
                <h2 class="bolded"><?php echo number_format($total_sale_row['total_sale']).'/='; ?></h2>
                <div class="infoprogress_green">
                  <div class="greenprogress"></div>
                </div>
              </div>
            </div>
          </div> <?php } ?>
        </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="block-web">
                            <div class="header">
                                <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                <h3 class="content-header">Item Low Stock Limit</h3>
                            </div>
                            <div class="porlets-content">
                                <div style="overflow:auto; height:400px;" class="table-responsive">
                                   <div id="result">
                                    <table class="display table table-bordered table-striped" id="dynamic-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Item Name</th>
                                                <th>Item Code</th>
                                                <th>Size</th>
                                                <th>Unit</th>
												<th>Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $item = $cls_stock->low_stock();
											$i = 1;
                                            $alerm=0;
                                            while ($item_list = $item->fetch_assoc()) {
                                                $alerm++;
                                                if($alerm == 1){ ?>
                                                <script>
                                                    var audio = new Audio('alert_tone/dingadongb_ho18zrjk.mp3');
                                                    audio.play();
                                                </script>
                                                <?php  } ?>
                                                <tr class="gradeX">
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $item_list['item_name'] ?></td>
                                                    <td><?php echo $item_list['item_code'] ?></td>
                                                    <td><?php echo $item_list['size'] ?></td>
                                                    <td><?php echo $item_list['unit'] ?></td>
													<td style="color:red;"><?php echo $item_list['available_stock']; ?></td>
                                                </tr>     
                                            <?php } ?>
                                        </tbody>
                                       
                                    </table>
                                    </div>
                                </div><!--/table-responsive-->
                            </div><!--/porlets-content-->
                        </div><!--/block-web--> 
                    </div><!--/col-md-12--> 
                </div><!--/row-->

         <!--row start-->
        
      </div>


        <div class="container clear_both padding_fix">
            <div id="main-content">
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block-web">
                                <div class="header">
                                    <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                    <h3 class="content-header">Completed Order</h3>
                                </div>
                                <div class="porlets-content">
                                    <div class="table-responsive">
                                        <table class="display table table-bordered table-striped" id="dynamic-table">
                                            <thead>
                                            <tr>
                                                <th>SL NO.</th>
                                                <th>Order No.</th>
                                                <th>Order Date</th>
                                                <th>Delivery Date</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th class="hidden-phone">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $sl = 1;
                                            $query = $cls_booking->completeOrder();
                                            while($order_row = $query->fetch_assoc())
                                            {

                                                ?>
                                                <tr class="gradeC">
                                                    <td><?php if($sl < 10) { echo '0';} echo $sl++; ?></td>
                                                    <td><?php echo $order_row['order_no']; ?></td>
                                                    <td><?php echo $order_row['order_date']; ?></td>
                                                    <td><?php echo $order_row['delivery_date']; ?></td>
                                                    <td><?php echo $order_row['name']; ?></td>
                                                    <td><?php echo $order_row['mobile']; ?></td>
                                                    <td style='width:20%'>
                                                        <a class="btn btn-primary"  style='float:left' href="orderEdit/order/<?php echo $order_row['order_no']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a class="btn btn-primary"  style='margin-left:5px;' href="reOrder/order/<?php echo $order_row['order_no']; ?>"><i class="fa fa-floppy-o" aria-hidden="true"></i></i></a>
                                                        <a class="btn btn-primary" style='margin-left:5px;' id="print_measurement"  onclick="TestFunction('<?php echo $order_row['order_no']; ?>')"><i class="fa fa-print" aria-hidden="true"></i></a>


                                                    </td>

                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                            <tfoot>
                                            <tr>

                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div><!--/table-responsive-->
                                </div><!--/porlets-content-->


                            </div><!--/block-web-->
                        </div><!--/col-md-12-->
                    </div><!--/row-->

                </div>
            </div>
        </div>

        <div class="container clear_both padding_fix">
            <div id="main-content">
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block-web">
                                <div class="header">
                                    <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                    <h3 class="content-header">Delivery Date Between  <?php  $date = date("Y-m-d");
                                        //increment 2 days
                                        $mod_date = strtotime($date."+ 2 days");
                                        date("Y-m-d",$mod_date); echo "<span style='color:red;font-weight:bold'>".date("d F",strtotime($date)).' to '. date("d F",$mod_date).'</span>'?></h3>
                                </div>
                                <div class="porlets-content">
                                    <div class="table-responsive">
                                        <table class="display table table-bordered table-striped" id="dynamic-table">
                                            <thead>
                                            <tr>
                                                <th>SL NO.</th>
                                                <th>Order No.</th>
                                                <th>Order Date</th>
                                                <th>Delivery Date</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th class="hidden-phone">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $sl = 1;
                                            $query = $cls_booking->deliveryDateAfterTwoDayes();
                                            while($order_row = $query->fetch_assoc())
                                            {

                                                ?>
                                                <tr class="gradeC">
                                                    <td><?php if($sl < 10) { echo '0';} echo $sl++; ?></td>
                                                    <td><?php echo $order_row['order_no']; ?></td>
                                                    <td><?php echo $order_row['order_date']; ?></td>
                                                    <td><?php echo $order_row['delivery_date']; ?></td>
                                                    <td><?php echo $order_row['name']; ?></td>
                                                    <td><?php echo $order_row['mobile']; ?></td>
                                                    <td style='width:20%'>
                                                        <a class="btn btn-primary"  style='float:left' href="orderEdit/order/<?php echo $order_row['order_no']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a class="btn btn-primary"  style='margin-left:5px;' href="reOrder/order/<?php echo $order_row['order_no']; ?>"><i class="fa fa-floppy-o" aria-hidden="true"></i></i></a>
                                                        <a class="btn btn-primary" style='margin-left:5px;' id="print_measurement"  onclick="TestFunction('<?php echo $order_row['order_no']; ?>')"><i class="fa fa-print" aria-hidden="true"></i></a>


                                                    </td>

                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                            <tfoot>
                                            <tr>

                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div><!--/table-responsive-->
                                </div><!--/porlets-content-->


                            </div><!--/block-web-->
                        </div><!--/col-md-12-->
                    </div><!--/row-->

                </div>
            </div>
        </div>
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->
  </div>
  <!--\\\\\\\ inner end\\\\\\-->
</div>
<!--\\\\\\\ wrapper end\\\\\\-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Compose New Task</h4>
      </div>
      <div class="modal-body"> content </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- sidebar chats -->
<nav class="atm-spmenu atm-spmenu-vertical atm-spmenu-right side-chat">
	<div class="header">
    <input type="text" class="form-control chat-search" placeholder=" Search">
  </div>
  <div href="#" class="sub-header">
    <div class="icon"><i class="fa fa-user"></i></div> <p>Online (4)</p>
  </div>
  <div class="content">
    <p class="title">Family</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Steven Smith</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> John Doe</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Michael Smith</a></li>
      <li class="busy"><a href="#"><i class="fa fa-circle-o"></i> Chris Rogers</a></li>
    </ul>
    
    <p class="title">Friends</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Vernon Philander</a></li>
      <li class="outside"><a href="#"><i class="fa fa-circle-o"></i> Kyle Abbott</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Dean Elgar</a></li>
    </ul>   
    
    <p class="title">Work</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li><a href="#"><i class="fa fa-circle-o"></i> Dale Steyn</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Morne Morkel</a></li>
    </ul>
    
  </div>
  <div id="chat-box">
    <div class="header">
      <span>Richard Avedon</span>
      <a class="close"><i class="fa fa-times"></i></a>    </div>
    <div class="messages nano nscroller has-scrollbar">
      <div class="content" tabindex="0" style="right: -17px;">
        <ul class="conversation">
          <li class="odd">
            <p>Hi John, how are you?</p>
          </li>
          <li class="text-right">
            <p>Hello I am also fine</p>
          </li>
          <li class="odd">
            <p>Tell me what about you?</p>
          </li>
          <li class="text-right">
            <p>Sorry, I'm late... see you</p>
          </li>
          <li class="odd unread">
            <p>OK, call me later...</p>
          </li>
        </ul>
      </div>
    <div class="pane" style="display: none;"><div class="slider" style="height: 20px; top: 0px;"></div></div></div>
    <div class="chat-input">
      <div class="input-group">
        <input type="text" placeholder="Enter a message..." class="form-control">
        <span class="input-group-btn">
        <button class="btn btn-danger" type="button">Send</button>
        </span>      </div>
    </div>
  </div>
</nav>
<!-- /sidebar chats -->   














<!-- sidebar chats -->
<nav class="atm-spmenu atm-spmenu-vertical atm-spmenu-right side-chat">
	<div class="header">
    <input type="text" class="form-control chat-search" placeholder=" Search">
  </div>
  <div href="#" class="sub-header">
    <div class="icon"><i class="fa fa-user"></i></div> <p>Online (4)</p>
  </div>
  <div class="content">
    <p class="title">Family</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Steven Smith</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> John Doe</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Michael Smith</a></li>
      <li class="busy"><a href="#"><i class="fa fa-circle-o"></i> Chris Rogers</a></li>
    </ul>
    
    <p class="title">Friends</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Vernon Philander</a></li>
      <li class="outside"><a href="#"><i class="fa fa-circle-o"></i> Kyle Abbott</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Dean Elgar</a></li>
    </ul>   
    
    <p class="title">Work</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li><a href="#"><i class="fa fa-circle-o"></i> Dale Steyn</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Morne Morkel</a></li>
    </ul>
    
  </div>
  <div id="chat-box">
    <div class="header">
      <span>Richard Avedon</span>
      <a class="close"><i class="fa fa-times"></i></a>    </div>
    <div class="messages nano nscroller has-scrollbar">
      <div class="content" tabindex="0" style="right: -17px;">
        <ul class="conversation">
          <li class="odd">
            <p>Hi John, how are you?</p>
          </li>
          <li class="text-right">
            <p>Hello I am also fine</p>
          </li>
          <li class="odd">
            <p>Tell me what about you?</p>
          </li>
          <li class="text-right">
            <p>Sorry, I'm late... see you</p>
          </li>
          <li class="odd unread">
            <p>OK, call me later...</p>
          </li>
        </ul>
      </div>
    <div class="pane" style="display: none;"><div class="slider" style="height: 20px; top: 0px;"></div></div></div>
    <div class="chat-input">
      <div class="input-group">
        <input type="text" placeholder="Enter a message..." class="form-control">
        <span class="input-group-btn">
        <button class="btn btn-danger" type="button">Send</button>
        </span>      
      </div>
    </div>
  </div>
</nav>
<!-- /sidebar chats -->

   <script src="js/jquery-2.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/common-script.js"></script>
   
<script src="js/jquery.slimscroll.min.js"></script>
<script src="js/jquery.sparkline.js"></script>
<script src="js/sparkline-chart.js"></script>
<script src="js/graph.js"></script>
<script src="js/edit-graph.js"></script>


<script src="plugins/kalendar/kalendar.js" type="text/javascript"></script>
<script src="plugins/kalendar/edit-kalendar.js" type="text/javascript"></script>

<!--for chart-->
<script src="plugins/sparkline/jquery.sparkline.js" type="text/javascript"></script>
<script src="plugins/sparkline/jquery.customSelect.min.js" ></script> 
<script src="plugins/sparkline/sparkline-chart.js"></script> 
<script src="plugins/sparkline/easy-pie-chart.js"></script>

<script>
/*refresh*/
    $('.refresh').click(function(e){
      var h = $(this).parents(".header");
      var p = h.parent();
      var loading = $('<div class="loading"><i class="fa fa-refresh fa-spin"></i></div>');
      
      loading.appendTo(p);
      loading.fadeIn();
      setTimeout(function() {
        loading.fadeOut();
      }, 1000);
      
      e.preventDefault();
    });
    
    /*refresh end*/
</script>

<script src="plugins/morris/morris.min.js" type="text/javascript"></script> 
<script src="plugins/morris/raphael-min.js" type="text/javascript"></script>  
<script src="plugins/morris/morris-script.js"></script> 

<script src="js/jPushMenu.js"></script> 
<script src="js/side-chats.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="plugins/scroll/jquery.nanoscroller.js"></script>

<!--chart end-->


<?php //require_once("include/footer.php"); ?>
