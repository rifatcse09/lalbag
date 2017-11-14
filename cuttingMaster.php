<?php
require_once("include/header.php");
?>

    <script>
        $(':checkbox').checkboxpicker();
        $(function() {
            $("[name='order_no']").focus();
        });
    </script>

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
                        <form  id="booking_add" method="post" class="form-horizontal row-border" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="block-web">
                                    <div class="header">
                                        <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                        <h3 class="content-header">Master Entry</h3>
                                    </div>
                                    <div class="porlets-content">

                                        <div class="row">


                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Order No.</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="order_id">
                                                            <option value="">Select</option>
                                                            <?php $invd_q = $cls_booking->view_order();
                                                            while($order_info = $invd_q->fetch_assoc())
                                                            {
                                                                echo "<option  value='" . $order_info['id'] . "'>" . $order_info['order_no'] . "</option>";
                                                            }

                                                            ?>
                                                        </select>

                                                    </div>
                                                </div><!--/form-group-->


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Order No</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="order_no">
                                                    </div>
                                                </div><!--/form-group-->

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Order date</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="order_date" value="<?php echo date('d-m-Y')?>" readonly>
                                                    </div>
                                                </div><!--/form-group-->

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Deliver date</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="deliver_date" class="form-control" name="deliver_date" required>
                                                    </div>
                                                </div><!--/form-group-->


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="name" required >
                                                    </div>
                                                </div><!--/form-group-->

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Mobile</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="mobile" required>
                                                    </div>
                                                </div><!--/form-group-->

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label"> লম্বা  </label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="cloth">
                                                    </div>
                                                </div><!--/form-group-->
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">বডি + লুছ</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="salary">
                                                    </div>
                                                </div><!--/form-group-->
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">তিরা</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="total">
                                                    </div>
                                                </div><!--/form-group-->
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">হাতা লম্বা </label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="advance">
                                                    </div>
                                                </div><!--/form-group-->
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">কলার</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="due">
                                                    </div>
                                                </div><!--/form-group-->

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">মহুরী / কফ</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="panjabi">
                                                    </div>
                                                </div><!--/form-group-->

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label"> একছটা </label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="sherwani" >
                                                    </div>
                                                </div><!--/form-group-->

                                            </div>
                                            <div class="col-md-12" style=" float:left ; border: 1px solid gray">
                                                <div class="form-group"  style=" float:left">
                                                    <label class="col-sm-6 control-label">(১) আলীগড় </label>
                                                    <div class="col-sm-4">
                                                        <input type="checkbox" name="down_1[]" value="আলীগড়">
                                                    </div>
                                                </div><!--/form-group-->
                                                <div class="form-group" style=" float:left">
                                                    <label class="col-sm-6 control-label">(২) সেলোয়ার </label>
                                                    <div class="col-sm-4">
                                                        <input type="checkbox" name="down_1[]" value="সেলোয়ার">
                                                    </div>
                                                </div><!--/form-group-->
                                                <div class="form-group" style=" float:left">
                                                    <label class="col-sm-8 control-label">(৩) চুড়ি / চোস্ত  </label>
                                                    <div class="col-sm-2">
                                                        <input type="checkbox" name="down_1[]" value=" চুড়ি / চোস্ত ">
                                                    </div>
                                                </div><!--/form-group-->
                                                <div class="form-group" style=" float:left">
                                                    <label class="col-sm-8 control-label"> (৪) বেল্টকাটিং </label>
                                                    <div class="col-sm-4">
                                                        <input type="checkbox" name="down_1[]" value="বেল্টকাটিং">
                                                    </div>
                                                </div><!--/form-group-->
                                                <div class="form-group" style=" float:left">
                                                    <label class="col-sm-6 control-label"> (৫) ধুতি পাঃ </label>
                                                    <div class="col-sm-4">
                                                        <input type="checkbox" name="down_1[]" value="ধুতি পাঃ">
                                                    </div>
                                                </div><!--/form-group-->
                                                <div class="form-group" style=" float:left">
                                                    <label class="col-sm-6 control-label"> (৬) সেরঃ পাঃ / পাকি পাঃ </label>
                                                    <div class="col-sm-4">
                                                        <input type="checkbox" name="down_1[]" value="সেরঃ পাঃ / পাকি পাঃ">
                                                    </div>
                                                </div><!--/form-group-->
                                            </div>

                                            <div class="col-md-12" style=" float:left ;  border-left: 1px solid gray; border-right: 1px solid gray; border-top:1px solid gray; margin-top:5px">
                                                <div class="form-group"  style=" float:left">
                                                    <label class="col-sm-6 control-label">(১) ঘন সিলাই </label>
                                                    <div class="col-sm-4">
                                                        <input type="checkbox" name="down_1[]" value="ঘন সিলাই">
                                                    </div>
                                                </div><!--/form-group-->
                                                <div class="form-group" style=" float:left">
                                                    <label class="col-sm-6 control-label">(২) মোটা সূতা </label>
                                                    <div class="col-sm-4">
                                                        <input type="checkbox" name="down_1[]" value="মোটা সূতা">
                                                    </div>
                                                </div><!--/form-group-->
                                                <div class="form-group" style=" float:left">
                                                    <label class="col-sm-8 control-label">(৩) চিকন সূতা </label>
                                                    <div class="col-sm-2">
                                                        <input type="checkbox" name="down_1[]" value=" চিকন সূতা ">
                                                    </div>
                                                </div><!--/form-group-->
                                                <div class="form-group" style=" float:left">
                                                    <label class="col-sm-6 control-label"> (৪) চওড়া রাবার </label>
                                                    <div class="col-sm-4">
                                                        <input type="checkbox" name="down_1[]" value="চওড়া রাবার">
                                                    </div>
                                                </div><!--/form-group-->
                                                <div class="form-group" style=" float:left">
                                                    <label class="col-sm-6 control-label"> (৫) ডুডি </label>
                                                    <div class="col-sm-4">
                                                        <input type="checkbox" name="down_1[]" value="ডুডি">
                                                    </div>
                                                </div><!--/form-group-->


                                            </div>
                                            <div class="col-md-12" style=" float:left; border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray"">
                                                <div class="form-group" style=" float:left">
                                                    <label class="col-sm-6 control-label"> (৬) পঃ চেন </label>
                                                    <div class="col-sm-4">
                                                        <input type="checkbox" name="down_1[]" value="মোঃ পাঃ">
                                                    </div>
                                                </div><!--/form-group-->
                                                <div class="form-group" style=" float:left">
                                                    <label class="col-sm-6 control-label"> (৬) পিছে পঃ </label>
                                                    <div class="col-sm-4">
                                                        <input type="checkbox" name="down_1[]" value="পিছে পঃ">
                                                    </div>
                                                </div><!--/form-group-->
                                                <div class="form-group" style=" float:left">
                                                    <label class="col-sm-6 control-label"> (৬) মোঃ পঃ </label>
                                                    <div class="col-sm-4">
                                                        <input type="checkbox" name="down_1[]" value="মোঃ পাঃ">
                                                    </div>
                                                </div><!--/form-group-->
                                            </div>
                                        </div>

                                    </div>
                                    <input type="submit" name="booking_add" class="btn btn-primary" value="Submit">
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>

                            </div>


                        </form>
                    </div>
                </div>
        </div>
    </div>
    </section>
    </div>
    </div>

<?php require_once("include/footer.php"); ?>