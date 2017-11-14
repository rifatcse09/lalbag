<?php
require_once("include/header.php");
$order_id = htmlspecialchars($_REQUEST['order'], ENT_QUOTES, 'UTF-8');
$query = $cls_booking->view_order_by_id($order_id);
$order_row = $query->fetch_assoc();
?>
    <script>
        $(document).ready(function() {
            var  total = 0;
            var salary = 0;
            var cloth = 0;
            var discount = 0;
            var advance = 0;
            var due = 0;
            $("#cloth").on('input',function () {
                cloth = ($(this).val().trim()=="")?0:$(this).val().trim();
                discount = $("#discount").val().trim()== ""?0:$("#discount").val().trim();
                salary = ($('#salary').val().trim()== "")?0:$('#salary').val();
                advance  = ($('#advance').val().trim()== "")?0:$('#advance').val();
                total = parseInt(cloth)+parseInt(salary)-parseInt(discount);
                due  = total - parseInt(advance);
                $("#total").val(total);
                $("#due").val(due);
                console.log(advance);
            });
            $("#salary").on('input',function () {
                salary = ($(this).val().trim()=="")?0:$(this).val().trim();
                discount = $("#discount").val().trim()== ""?0:$("#discount").val().trim();
                cloth = $('#cloth').val().trim()==""?0:$('#cloth').val().trim();
                advance  = ($('#advance').val().trim()== "")?0:$('#advance').val();
                total = parseInt(cloth)+parseInt(salary)-parseInt(discount);
                due  = total - parseInt(advance);
                $("#total").val(total);
                $("#due").val(due);
            });

            $("#discount").on('input',function () {
                discount = ($(this).val().trim()=="")?0:$(this).val().trim();
                salary = $("#salary").val().trim()== ""?0:$("#salary").val().trim();
                cloth = $('#cloth').val().trim()==""?0:$('#cloth').val().trim();
                advance  = ($('#advance').val().trim()== "")?0:$('#advance').val();
                total = parseInt(cloth)+parseInt(salary)-parseInt(discount);
                due  = total - parseInt(advance);
                $("#total").val(total);
                $("#due").val(due);
            });
            $("#advance").on('input',function () {
                discount = ($("#discount").val().trim()=="")?0:$("#discount").val().trim();
                salary = $("#salary").val().trim()== ""?0:$("#salary").val().trim();
                cloth = $('#cloth').val().trim()==""?0:$('#cloth').val().trim();
                advance  = ($(this).val().trim()== "")?0:$(this).val();
                total = parseInt(cloth)+parseInt(salary)-parseInt(discount);
                due  = total - parseInt(advance);
                $("#total").val(total);
                $("#due").val(due);
            });

        });
    </script>
    <div class="contentpanel">
        <!--\\\\\\\ contentpanel start\\\\\\-->
        <div class="pull-left breadcrumb_admin clear_both">
            <div class="pull-left page_title theme_color">
                <h1>Order</h1>
                <h2 class="">Re-Order</h2>
            </div>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>Order</li>
                    <li class="active">Re-Order</li>
                </ol>
            </div>
        </div>
        <div class="container clear_both padding_fix">
            <section class="panel panel-default">
                <div class="panel-body">
                    <div class="container clear_both padding_fix">
                        <section class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="block-web">
                                            <div class="header">
                                                <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                                <h3 class="content-header">Re-Order</h3>
                                            </div>

                                            <!--/porlets-content-->

                                            <div class="porlets-content">
                                                <div class="row">
                                                    <form id="booking_add" method="post" class="form-horizontal row-border"
                                                          enctype="multipart/form-data">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-sm-6 control-label">Order No.</label>
                                                                        <?php $cls_booking = new cls_booking();
                                                                        $lastId = $cls_booking->lastInsertId(); ?>
                                                                        <div class="col-sm-6">
                                                                            <input type="text" class="form-control" name="order_no"
                                                                                   value="<?php echo $lastId + 1 ?>" readonly>
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-sm-6 control-label" style='font-weight: bold'>Deliver date :</label>
                                                                        <div class="col-sm-6">
                                                                            <input type="text" id="deliver_date" class="form-control"
                                                                                   name="deliver_date"  value="<?php echo $order_row['delivery_date']?>" required>
                                                                        </div>
                                                                    </div><!--/form-group-->
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-sm-6 control-label">Order date :</label>
                                                                        <div class="col-sm-6">
                                                                            <input type="text" class="form-control" name="order_date"
                                                                                   value="<?php echo date('d-m-Y',strtotime($order_row['order_date']))?>" readonly>
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="col-sm-4 control-label">Name :</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control" name="name" value="<?php echo $order_row['name']?>"
                                                                                   required>
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                </div>


                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="col-sm-4 control-label">Mobile :</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="number" class="form-control" name="mobile" value="<?php echo $order_row['mobile']?>" required>
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-md-3">

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">কাপড়</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" class="form-control" name="cloth" value="<?php echo $order_row['cloth']?>" id="cloth">
                                                                        </div>
                                                                    </div><!--/form-group-->
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">মজুরী</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" class="form-control" name="salary" value="<?php echo $order_row['salary']?>" id="salary">
                                                                        </div>
                                                                    </div><!--/form-group-->
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">মোট</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" class="form-control" name="total" value="<?php echo $order_row['total']?>" id="total" readonly>
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">অগ্রিম</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" class="form-control" name="advance" value="<?php echo $order_row['advance']?>" id="advance">
                                                                        </div>
                                                                    </div><!--/form-group-->
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">বাকী</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" class="form-control" name="due" value="<?php echo $order_row['due']?>" id="due" readonly>
                                                                        </div>
                                                                    </div><!--/form-group-->
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">ডিসকাউন্ট</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" class="form-control" name="discount" value="<?php echo $order_row['discount']?>" id="discount">
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                </div>
                                                                <div class="col-md-3">

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">পাঞ্জাবী</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" class="form-control" name="panjabi" value="<?php echo $order_row['panjabi']?>">
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">শেরওয়ানী</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" class="form-control" name="sherwani" value="<?php echo $order_row['sherwani']?>">
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">একছাটা পাঞ্জাবী</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" class="form-control" name="akchata" value="<?php echo $order_row['akchata']?>">
                                                                           
                                                                        </div>
                                                                    </div><!--/form-group-->


                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">কাবলী স্যুট</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" class="form-control" name="suit" value="<?php echo $order_row['kabli']?>">
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">এরাবিয়ান জুব্বা</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" class="form-control" name="jubba" value="<?php echo $order_row['jubba']?>">
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">ফতুয়া</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" class="form-control" name="fhatua" value="<?php echo $order_row['phatua']?>">
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label"> এমব্রয়ডারী</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" class="form-control" name="ambroydary" value="<?php echo $order_row['ambrodary']?>">
                                                                        </div>
                                                                    </div><!--/form-group-->


                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label"> বিবরণ </label>
                                                                        <div class="col-sm-9">
                                                                            <textarea class="form-control" name="cloth_biborn"><?php echo $order_row['cloth_biborn']?></textarea>
                                                                        </div>
                                                                    </div><!--/form-group-->


                                                                </div>

                                                                <div class="col-md-3">

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">লম্বা</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" name="lomba" value="<?php echo $order_row['lomba']?>">
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">বডি + লুছ</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" name="bodyluc" value="<?php echo $order_row['body']?>">
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">তিরা</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" name="tira" value="<?php echo $order_row['tira']?>">
                                                                        </div>
                                                                    </div><!--/form-group-->


                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">হাতা লম্বা </label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" name="hata" value="<?php echo $order_row['hata']?>">
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">কলার</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" name="kolar" value="<?php echo $order_row['colar']?>">
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">মহুরী / কফ</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" name="mohori_cof" value="<?php echo $order_row['mohorikof']?>">
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label"> প্লেট ফাডা </label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" name="plat_pada" value="<?php echo $order_row['plat_pada']?>">
                                                                        </div>
                                                                    </div><!--/form-group-->

                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> লুছ </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="luch" value="<?php echo $order_row['luch']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> মিডিয়াম </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="medium" value="<?php echo $order_row['medium']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> ফিটিং </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="fhiting" value="<?php echo $order_row['fhiting']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> সেরঃ কলার রাউন্ড </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="serkolarRound" value="<?php echo $order_row['serkolarRound']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->


                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> সেরঃ কলার কোনা </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="serkolarkona" value="<?php echo $order_row['serkolarkona']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> কলার রউন্দ </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="kolarRound" value="<?php echo $order_row['kolarRound']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> কলার কোনা </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="kolarKona" value="<?php echo $order_row['kolarKona']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> ভি কলার </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="vkolar" value="<?php echo $order_row['vkolar']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> সিঙ্গেল প্লেট  </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="singleplat" value="<?php echo $order_row['singleplat']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->


                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> ভি গলা </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="vgola" value="<?php echo $order_row['vgola']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> শার্ট কলার </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="surtorkolar" value="<?php echo $order_row['surtorkolar']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->


                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> গোল গলা </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="golgola" value="<?php echo $order_row['golgola']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> ডবল প্লেট </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="doubleplat" value="<?php echo $order_row['golgola']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> বক্স প্লেট </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="boxplat" value="<?php echo $order_row['boxplat']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> ঘুণ্টি </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="ghunti" value="<?php echo $order_row['ghunti']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> নেট </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="net" value="<?php echo $order_row['net']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> পাইপিং কলার </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="pikingkolar" value="<?php echo $order_row['pikingkolar']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> পেট  </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="pet" value="<?php echo $order_row['pet']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> হাতাই </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="hatai" value="<?php echo $order_row['hatai']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label"> ফুলের নং </label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="phular" value="<?php echo $order_row['phular']?>">
                                                                                </div>
                                                                            </div><!--/form-group-->


                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">আলীগড়</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="alighod" value="<?php echo $order_row['aligod']?>">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">সেলোয়ার</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="salware" value="<?php echo $order_row['saluar']?>">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">চুড়ি</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="chudi" value="<?php echo $order_row['cudi']?>">
                                                                    </div>
                                                                </div><!--/form-group-->


                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> চোস্ত </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="costo" value="<?php echo $order_row['costo']?>">
                                                                    </div>
                                                                </div><!--/form-group-->
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">বেল্ট সেলোয়ার</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="belt" value="<?php echo $order_row['veltsaluar']?>">
                                                                    </div>
                                                                </div><!--/form-group-->
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">ধুতি</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="dhuti" value="<?php echo $order_row['dhuti']?>">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> সেরঃ পাঃ </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="ser" value="<?php echo $order_row['ser']?>">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> পাকি পাঃ </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="paki" value="<?php echo $order_row['paki']?>">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> ঘন সিলাই </label>
                                                                    <div class="col-sm-6">
                                                                        <?php echo $order_row['ghono_silay']==1?'<input type="checkbox" checked class="form-control" name="ghono_silay">':'<input type="checkbox"  class="form-control" name="ghono_silay">' ?>
                                                                    </div>
                                                                </div><!--/form-group-->
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> মোটাসূতা </label>
                                                                    <div class="col-sm-6">
                                                                        <?php echo $order_row['motasuta']==1?'<input type="checkbox" checked class="form-control" name="motasuta">':'<input type="checkbox"  class="form-control" name="motasuta">' ?>
                                                                    </div>
                                                                </div><!--/form-group-->
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> চিকনসূতা </label>
                                                                    <div class="col-sm-6">
                                                                        <?php echo $order_row['cikonsuta']==1?'<input type="checkbox" checked class="form-control" name="cikonsuta">':'<input type="checkbox"  class="form-control" name="cikonsuta">' ?>
                                                                    </div>
                                                                </div><!--/form-group-->
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> চওডা রাবার </label>
                                                                    <div class="col-sm-6">
                                                                        <?php echo $order_row['rabar']==1?'<input type="checkbox" checked class="form-control" name="rabar">':'<input type="checkbox"  class="form-control" name="rabar">' ?>
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> ডুডি </label>
                                                                    <div class="col-sm-6">
                                                                        <?php echo $order_row['dudi']==1?'<input type="checkbox" checked class="form-control" name="dudi">':'<input type="checkbox"  class="form-control" name="dudi">' ?>
                                                                    </div>
                                                                </div><!--/form-group-->
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">মোঃ পঃ</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="totalpocket" value="<?php echo $order_row['totalpocket']?>">
                                                                    </div>
                                                                </div><!--/form-group-->


                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> পঃ চেন </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="chain" value="<?php echo $order_row['chain']?>">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> পিছে পঃ </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="backpocket" value="<?php echo $order_row['backpocket']?>">
                                                                    </div>
                                                                </div><!--/form-group-->
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> বিবরণ </label>
                                                                    <div class="col-sm-9">
                                                                        <textarea class="form-control" name="biborn"><?php echo $order_row['biborn']?></textarea>
                                                                    </div>
                                                                </div><!--/form-group-->
                                                            </div>
                                                            <div class="col-md-3">

                                                            </div>
                                                            <div class="col-md-3">

                                                            </div>
                                                        </div>
                                                </div>


                                            </div>

                                        </div><!--/block-web-->
                                        <input type="submit" name="booking_add" class="btn btn-primary" value="Save">
                                        <button type="button" class="btn btn-default">Cancel</button>
                                    </div><!--/col-md-6-->

                                    <!--/form-group-->
                                    </form>
                                </div><!--/porlets-content-->

                            </div><!--/block-web-->
                    </div><!--/col-md-6-->
                </div>

        </div>
        </section>
    </div>
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->

<?php require_once("include/footer.php"); ?>