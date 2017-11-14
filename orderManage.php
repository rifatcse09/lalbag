<?php require_once("include/header.php"); ?>
    <script>

        function TestFunction(param) {
            var link = 'measurement/order/'+param;
            var mywindow = window.open(link);

            setTimeout(function(){
                mywindow.print();
                window.location = 'orderManage';
                mywindow.close();
            }, 1000);

            //alert(param);
        }
            function CompleteFunction(param) {
           // var link = 'measurement/order/'+param;
                var urlajax = "post_url/orderComplete";
                $.ajax({
                    type: "POST",
                    url: urlajax,
                    data: {
                        orderId: param,
                    },
                    success: function (data) {
                        window.location = 'orderManage';
                    },
                    error: function () {
                    }
                });
        }
    </script>
    <div class="contentpanel">
        <!--\\\\\\\ contentpanel start\\\\\\-->
        <div class="pull-left breadcrumb_admin clear_both">
            <div class="pull-left page_title theme_color">
                <h1>Order</h1>
                <h2 class="">manage Order</h2>
            </div>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>Order</li>
                    <li class="active">Order Manage</li>
                </ol>
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
                                    <h3 class="content-header">Order List</h3>
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
                                            $query = $cls_booking->view_order();
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
                                                        <a class="btn btn-primary" data-toggle="tooltip" title="Edit!" style='float:left' href="orderEdit/order/<?php echo $order_row['order_no']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a class="btn btn-primary" data-toggle="tooltip" title="Re-Order!"  style='margin-left:5px;' href="reOrder/order/<?php echo $order_row['order_no']; ?>"><i class="fa fa-floppy-o" aria-hidden="true"></i></i></a>
                                                        <a class="btn btn-primary" data-toggle="tooltip" title="Print!" style='margin-left:5px;' id="print_measurement"  onclick="TestFunction('<?php echo $order_row['order_no']; ?>')"><i class="fa fa-print" aria-hidden="true"></i></a>
                                                        <a class="btn btn-primary" data-toggle="tooltip" title="Complete!" style='float:left' onclick="CompleteFunction('<?php echo $order_row['order_no']; ?>')" ><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
                                                    </td>

                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                          
                                        </table>
                                    </div><!--/table-responsive-->
                                </div><!--/porlets-content-->


                            </div><!--/block-web-->
                        </div><!--/col-md-12-->
                    </div><!--/row-->

                </div>
            </div>
        </div>
    </div>


    <!--\\\\\\\ content panel end \\\\\\-->

<?php require_once("include/footer.php"); ?>