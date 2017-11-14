<?php require_once("include/header.php");
$item=$cls_item->viewitemAll();
?>
    <script>
        $('document').ready(function(){
            purchase.pur_inv_control_dis();
        });
        $(function() {
            $("[name='pur_item_code']").focus();
        });
    </script>
    <div class="contentpanel">
        <!--\\\\\\\ contentpanel start\\\\\\-->
        <div class="pull-left breadcrumb_admin clear_both">
            <div class="pull-left page_title theme_color">
                <h1>Purchase</h1>
                <h2 class="">Item Purchase</h2>
            </div>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>Purchase</li>
                    <li class="active">Purchase Item</li>
                </ol>
            </div>
        </div>
        <div class="container clear_both padding_fix">
            <section class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="block-web">
                                <div class="header">
                                    <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                    <h3 class="content-header">Search Cloth</h3>
                                </div>
                                <div class="porlets-content">
                                    <form action=""  id="pur_item_add_form" method="post" class="form-horizontal row-border">
                                        <div class="form-group">
                                            <!--<input type="text" class="form-control" name="pur_item_code" id="pur_item_code" placeholder="Item Code">-->
                                            <input type="text" class="form-control" name="pur_item_code"  placeholder="Item Code">
                                        </div><!--/form-group-->
                                        <div class="form-group">
                                            <!-- <div id="itemShow" style="width:100%;border:1px solid #ccc;height:auto;">-->
                                            <select id="pur_item_show" class="form-control select">
                                                <option value="">Select Item</option>
                                                <?php
                                                while($itemName=$item->fetch_assoc()){
                                                    echo "<option  value='" . $itemName['id'] . "'>" . $itemName['item_name'] . "</option>";
                                                }?>
                                            </select>
                                            <!-- </div>-->
                                        </div><!--/form-group-->
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Sale Price</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="sale_price" required placeholder="0.00" onkeypress="return OnlyNumberKey(event);">
                                            </div>
                                        </div><!--/form-group-->
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Purchase Price</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="pur_price" required placeholder="0.00" onkeypress="return OnlyNumberKey(event);">
                                            </div>
                                        </div><!--/form-group-->

                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Quantity (<span id="pur_item_unit"></span>)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" required name="pur_quantity" placeholder="0" onkeypress="return OnlyNumberKey(event);">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Total Price</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="pur_subtotal_price" readonly placeholder="0.00" onkeypress="return OnlyNumberKey(event);">
                                            </div>

                                        </div><!--/form-group-->

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"></label>
                                            <div class="col-sm-9">
                                                <input type="button" style="display:none;" name="pur_item_update" value="Item Update" class="btn btn-primary">
                                                <input type="button" style="display:none;" name="pur_item_cancel" value="Cancel" class="btn btn-primary">
                                                <input type="submit" name="pur_item_add" value="Item Add" class="btn btn-primary">

                                                <input type="hidden" name="pur_tr_index" value="">
                                                <input type="hidden" name="pur_item_id" value="">
                                            </div>
                                        </div><!--/form-group-->

                                    </form>
                                </div><!--/porlets-content-->
                            </div><!--/block-web-->

                            <div class="block-web">
                                <div class="header">
                                    <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a><a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                    <h3 class="content-header">Inovice</h3>
                                </div>
                                <div class="porlets-content">
                                    <form action=""  method="post" class="form-horizontal row-border">
                                        <div class="form-group">
                                            <label style="text-align:left;" class="col-sm-4 control-label">Supplier</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="dis_supp" name="sup_id">
                                                    <option value="">Select Supplier</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="text-align:left;" class="col-sm-4 control-label"></label>
                                            <div class="col-sm-8">
                                                <a  class="btn btn-default btn-icon" href="supplierAdd" target='_blank'>Add new</a>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label style="text-align:left;" class="col-sm-4 control-label">Invoice</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" required name="inovice_num" style="width:100%;" placeholder="Invoice Number" onkeypress="return OnlyNumberKey(event);">
                                            </div>
                                        </div><!--/form-group-->


                                        <div class="form-group">
                                            <label style="text-align:left;" class="col-sm-4 control-label">Total</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control" name="pur_total_price" placeholder="Total">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="text-align:left;" class="col-sm-4 control-label">Payable</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="abcd" name="pur_net_payable" onkeypress="return OnlyNumberKey(event);" placeholder="0.00">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label style="text-align:left;" class="col-sm-4 control-label">Due</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="pur_amt_due" readonly placeholder="0.00" ><br> <input type="button" name="pur_item_insert" value="Purchase" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div><!--/porlets-content-->
                            </div><!--/block-web-->
                        </div><!--/col-md-4-->
                        <div class="col-md-8">
                            <table class="table table-hover" id="pur_item_table">
                                <thead>
                                <tr>
                                    <th style="display:none;"></th>
                                    <th class="text-center">SL NO.</th>
                                    <th>ITEM</th>
                                    <th class="text-right">QUANTITY</th>
                                    <th class="text-right">P.PRICE</th>
                                    <th class="text-right">SUBTOTAL</th>
                                    <th class="text-right">S.PRICE</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="display:none;"><strong></strong></td>
                                    <td><strong></strong></td>
                                    <td style="text-align: right"><strong></strong></td>
                                    <td class="text-right"><strong></strong></td>
                                    <td class="text-right">Total</td>
                                    <td class="text-right"><strong><span id="pur_total_price">0.00</span></strong></td>
                                    <td class="text-right"></td>
                                    <td><strong></strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->
    <script type="text/javascript">
        $(document).ready(function() {
            $(".select").select2();
        });
    </script>
<?php require_once("include/footer.php"); ?>