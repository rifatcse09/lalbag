<?php
require_once("include/header.php");
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
    <style type="text/css">
        .control-label{
            font-size: 10px;
        }
    </style>

    <div class="contentpanel">
        <!--\\\\\\\ contentpanel start\\\\\\-->
        <div class="pull-left breadcrumb_admin clear_both">
            <div class="pull-left page_title theme_color">
                <h1>Setting</h1>
                <h2 class="">Booking</h2>
            </div>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Settings</li>
                </ol>
            </div>
        </div>
        <div class="container clear_both padding_fix">
            <section class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block-web">
                                <div class="header">
                                    <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                    <h3 class="content-header">Order Receipt</h3>
                                </div>
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
                                                                       name="deliver_date" required>
                                                            </div>
                                                        </div><!--/form-group-->
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="col-sm-6 control-label">Order date :</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="order_date"
                                                                       value="<?php

                                                                       $cls_datetime = new cls_datetime();
                                                                       echo $order_date_is = $cls_datetime->exat_date()?>" readonly>
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
                                                                <input type="text" class="form-control" name="name"
                                                                       required>
                                                            </div>
                                                        </div><!--/form-group-->

                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Mobile :</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" class="form-control" name="mobile"
                                                                       required>
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
                                                                <input type="number" class="form-control" name="cloth" id="cloth">
                                                            </div>
                                                        </div><!--/form-group-->
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">মজুরী</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="salary" id="salary">
                                                            </div>
                                                        </div><!--/form-group-->
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">মোট</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="total" id="total" readonly>
                                                            </div>
                                                        </div><!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">অগ্রিম</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="advance" id="advance">
                                                            </div>
                                                        </div><!--/form-group-->
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">বাকী</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="due" id="due" readonly>
                                                            </div>
                                                        </div><!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label"> ডিসকাউন্ট  </label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="discount" id=discount>
                                                            </div>
                                                        </div><!--/form-group-->

                                                    </div>
                                                    <div class="col-md-3">

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">পাঞ্জাবী</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="panjabi">
                                                            </div>
                                                        </div><!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">শেরওয়ানী</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="sherwani">
                                                            </div>
                                                        </div><!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">একছাটা পাঞ্জাবী</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="akchata">
                                                            </div>
                                                        </div><!--/form-group-->


                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">কাবলী স্যুট</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="suit">
                                                            </div>
                                                        </div><!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">এরাবিয়ান জুব্বা</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="jubba">
                                                            </div>
                                                        </div><!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">ফতুয়া</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="fhatua">
                                                            </div>
                                                        </div><!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label"> এমব্রয়ডারী</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" name="ambroydary">
                                                            </div>
                                                        </div><!--/form-group-->


                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label"> বিবরণ </label>
                                                            <div class="col-sm-9">
                                                            <textarea class="form-control"
                                                                      name="cloth_biborn"></textarea>
                                                            </div>
                                                        </div><!--/form-group-->


                                                    </div>

                                                    <div class="col-md-3">

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">লম্বা</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="lomba">
                                                            </div>
                                                        </div><!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">বডি + লুছ</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="bodyluc">
                                                            </div>
                                                        </div><!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">তিরা</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="tira">
                                                            </div>
                                                        </div><!--/form-group-->


                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">হাতা লম্বা </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="hata">
                                                            </div>
                                                        </div><!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">কলার</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="kolar">
                                                            </div>
                                                        </div><!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">মহুরী / কফ</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="mohori_cof">
                                                            </div>
                                                        </div><!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label"> প্লেট ফাডা </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="plat_pada">
                                                            </div>
                                                        </div><!--/form-group-->

                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> লুছ </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="luch">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> মিডিয়াম </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="medium">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> ফিটিং </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="fhiting">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> সেরঃ কলার রাউন্ড </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                               name="serkolarRound">
                                                                    </div>
                                                                </div><!--/form-group-->


                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> সেরঃ কলার কোনা </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="serkolarkona">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> কলার রউন্দ </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="kolarRound">
                                                                    </div>
                                                                </div><!--/form-group-->
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> কলার কোনা </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="kolarKona">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> ভি কলার </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="vkolar">
                                                                    </div>
                                                                </div><!--/form-group-->
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> সিঙ্গেল প্লেট  </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="singleplat">
                                                                    </div>
                                                                </div><!--/form-group-->


                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> ভি গলা </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="vgola">
                                                                    </div>
                                                                </div><!--/form-group-->
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> শার্ট কলার </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="surtorkolar">
                                                                    </div>
                                                                </div><!--/form-group-->


                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> গোল গলা </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="golgola">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> ডবল প্লেট </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="doubleplat">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> বক্স প্লেট </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="boxplat">
                                                                    </div>
                                                                </div><!--/form-group-->
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> ঘুণ্টি </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="ghunti">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> নেট </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="net">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> পাইপিং কলার </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="pikingkolar">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> পেট  </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" class="form-control" name="pet">
                                                                    </div>
                                                                </div><!--/form-group-->
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> হাতাই </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="hatai">
                                                                    </div>
                                                                </div><!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label"> ফুলের নং </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="phular">
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
                                                            <input type="number" class="form-control" name="alighod">
                                                        </div>
                                                    </div><!--/form-group-->

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">সেলোয়ার</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control" name="salware">
                                                        </div>
                                                    </div><!--/form-group-->

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">চুড়ি</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control" name="chudi">
                                                        </div>
                                                    </div><!--/form-group-->


                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label"> চোস্ত </label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control" name="costo">
                                                        </div>
                                                    </div><!--/form-group-->
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">বেল্ট সেলোয়ার</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control" name="belt">
                                                        </div>
                                                    </div><!--/form-group-->
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">ধুতি</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control" name="dhuti">
                                                        </div>
                                                    </div><!--/form-group-->

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label"> সেরঃ পাঃ </label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control" name="ser">
                                                        </div>
                                                    </div><!--/form-group-->

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label"> পাকি পাঃ </label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control" name="paki">
                                                        </div>
                                                    </div><!--/form-group-->

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label"> ঘন সিলাই </label>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" class="form-control"
                                                                   name="ghono_silay" value="1">
                                                        </div>
                                                    </div><!--/form-group-->
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label"> মোটাসূতা </label>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" class="form-control" name="motasuta"
                                                                   value="1">
                                                        </div>
                                                    </div><!--/form-group-->
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label"> চিকনসূতা </label>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" class="form-control" name="cikonsuta"
                                                                   value="1">
                                                        </div>
                                                    </div><!--/form-group-->
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label"> চওডা রাবার </label>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" class="form-control" name="rabar"
                                                                   value="1">
                                                        </div>
                                                    </div><!--/form-group-->

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label"> ডুডি </label>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" class="form-control" name="dudi"
                                                                   value="1">
                                                        </div>
                                                    </div><!--/form-group-->
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">মোঃ পঃ</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="totalpocket">
                                                        </div>
                                                    </div><!--/form-group-->


                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label"> পঃ চেন </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="chain">
                                                        </div>
                                                    </div><!--/form-group-->

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label"> পিছে পঃ </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="backpocket">
                                                        </div>
                                                    </div><!--/form-group-->
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label"> বিবরণ </label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" name="biborn"></textarea>
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
                                <!--/porlets-content-->
                                <input type="submit" name="booking_add" class="btn btn-primary" value="Save">
                                </form>
                            </div><!--/block-web-->


                            <!--      <button type="button" class="btn btn-default">Cancel</button>-->
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