<?php
require_once('functions/cls_dbconfig.php');
function __autoload($classname){
    require_once("functions/$classname.class.php");
}
$order_id = htmlspecialchars($_REQUEST['order'], ENT_QUOTES, 'UTF-8');
$cls_booking = new cls_booking();
$query = $cls_booking->view_order_by_id($order_id);
$order_row = $query->fetch_assoc();
?>
<html xmlns:width="http://www.w3.org/1999/xhtml">
<head>
    <style type="text/css">
        body {
            font-size:12px;
        }
        table tr td{
            font-size:12px;
            border:1px solid black;
            height: 40px;
            vertical-align: top;

        }
        table{
            border-collapse: collapse;
            width:100%;
        }

    </style>
</head>
<body>
<div style="width:40%;margin-left: 50px;">
    <div style="width:100%;float:left;margin-bottom: 20px">
        <div style="float:left">

            <div style="float:left;margin-right: 5px;">
                <table >
                    <tr>
                        <td>আল­আরাবীয়া <br>  <?php echo date('d/m/Y',strtotime($order_row['delivery_date']))?> </td>
                        <td valign="top"> ঘণ্টি </td>
                    </tr>
                    <tr>
                        <td>অঃ নং <br> <?php echo $order_row['order_no']?></td>
                        <td> বুতাম নং</td>
                    </tr>
                </table>


            </div>

            <div style="float:left;margin-right: 5px;">
                <table >
                    <tr>
                        <td>আল­আরাবীয়া <br> <?php echo date('d/m/Y',strtotime($order_row['delivery_date']))?> </td>
                        <td valign="top"> ঘণ্টি </td>
                    </tr>
                    <tr>
                        <td>অঃ নং <br> <?php echo $order_row['order_no']?></td>
                        <td> বুতাম নং</td>
                    </tr>
                </table>

            </div>
            <div style="float:left;margin-right: 5px;">
                <table >
                    <tr>
                        <td>আল­আরাবীয়া <br>  <?php echo date('d/m/Y',strtotime($order_row['delivery_date']))?> </td>
                        <td valign="top"> ঘণ্টি </td>
                    </tr>
                    <tr>
                        <td>অঃ নং <br> <?php echo $order_row['order_no']?></td>
                        <td> বুতাম নং</td>
                    </tr>
                </table>

            </div>
        </div>
        <div style="float:left;margin-top: 5px;">

            <div style="float:left;margin-right: 5px;">
                <table >
                    <tr>
                        <td>আল­আরাবীয়া <br>  <?php echo date('d/m/Y',strtotime($order_row['delivery_date']))?> </td>
                        <td valign="top"> ঘণ্টি </td>
                    </tr>
                    <tr>
                        <td>অঃ নং <br> <?php echo $order_row['order_no']?> </td>
                        <td> বুতাম নং</td>
                    </tr>
                </table>


            </div>

            <div style="float:left;margin-right: 5px;">
                <table >
                    <tr>
                        <td>আল­আরাবীয়া <br>  <?php echo date('d/m/Y',strtotime($order_row['delivery_date']))?> </td>
                        <td valign="top"> ঘণ্টি </td>
                    </tr>
                    <tr>
                        <td>অঃ নং <br> <?php echo $order_row['order_no']?></td>
                        <td> বুতাম নং</td>
                    </tr>
                </table>

            </div>
            <div style="float:left;margin-right: 5px;">
                <table >
                    <tr>
                        <td>আল­আরাবীয়া <br>  <?php echo date('d/m/Y',strtotime($order_row['delivery_date']))?> </td>
                        <td valign="top"> ঘণ্টি </td>
                    </tr>
                    <tr>
                        <td>অঃ নং <br> <?php echo $order_row['order_no']?></td>
                        <td> বুতাম নং</td>
                    </tr>
                </table>

            </div>
        </div>

    </div>
    <div style="width:100%;float:left;border-bottom: 1px solid darkgray;margin-bottom: 10px;">

        <div style="float:left;margin-right: 5px;">
            <div>
                <label class="control-label" style="text-align:left;"> অডার নং- </label>
                <label class=" control-label"> <?php echo $order_row['order_no']?> </label>

            </div><!--/form-group-->
            <div style="height:30px;width:120px;">
                <label class="control-label"> নামঃ </label>
                <label class="control-label"> <?php echo $order_row['name']?> </label>
            </div><!--/form-group-->

        </div>
        <div style="float:left;margin-right: 5px;">
            <?php echo $order_row['panjabi']>0?"<div class='form-group;'style='height:30px;'>
                   <label class='control-label' style='text-align:left;'>পাঞ্জাবী -</label>
                   <label class='control-label'>".$order_row['panjabi']."</label>
                   </div>":''?>
            <?php echo $order_row['sherwani']>0?"<div class='form-group' style='height:30px;'>
                  <label class='control-label' style='text-align:left;'>শেরওয়ানী -</label>
                  <label class='control-label'>".$order_row['sherwani']."pc</label>
                  </div>":''?>
            <?php echo $order_row['akchata']>0?"<div class='form-group' style='height:30px;'>
                  <label class='control-label' style='text-align:left;'>একছাটা পাঞ্জাবী - </label>
                  <label class='control-label'>".$order_row['akchata']."pc</label>
                  </div>":''?>



            <?php echo $order_row['kabli']>0?"<div class='form-group' style='height:30px;' >
                     <label class='control-label' style='text-align:left;'>কাবলী স্যুট -  </label>
                      <label class='control-label'>".$order_row['kabli']."pc</label>
                      </div>":''?>


            <?php echo $order_row['jubba']>0?"<div class='form-group'style='height:30px;'>
                      <label class='control-label' style='text-align:left;'>এরাবিয়ান জুব্বা -  </label>
                       <label class='control-label'>".$order_row['jubba']."pc</label>
                       </div>":''?>

            <?php echo $order_row['phatua']>0?"<div class='form-group' style='height:30px;'>
                     <label class='control-label' style='text-align:left;'>ফতুয়া -  </label>
                     <label class='control-label'>".$order_row['phatua']."pc</label>
                      </div>":''?>


            <?php echo $order_row['ambrodary']>0?"<div class='form-group' style='height:30px;'>
                   <label class='control-label' style='text-align:left;'>এমব্রয়ডারী -  </label>
                     <label class='control-label'>".$order_row['ambrodary']."pc</label>
                      </div>":''?>

        </div>
        <div style="float:right"> <div>
                <label  style="text-align:left;"> অডার তাং : </label>
                <label> <?php echo date('d/m/Y',strtotime($order_row['order_date']))?> </label>
            </div><!--/form-group-->
            <div>
                <label  style="text-align:left;"> ডেলিভারি তাং : </label>
                <label > <?php echo date('d/m/Y',strtotime($order_row['delivery_date']))?> </label>
            </div><!--/form-group-->
        </div>
    </div>

    <div style="width:100%;float:left">

        <div style="float:left;margin-right: 10px;">
            <div class="form-group" style='height:30px;'>
                <label class="control-label">লম্বা :</label>
                <label class="control-label"> <?php echo $order_row['lomba']?> </label>
            </div><!--/form-group-->

            <div class="form-group" style='height:30px;'>
                <label class="control-label">বডি + লুছ :</label>
                <label class="control-label"><?php echo $order_row['body']?></label>
            </div><!--/form-group-->

            <div class="form-group" style='height:30px;' >
                <label class="control-label">তিরা :</label>
                <label class="control-label"><?php echo $order_row['tira']?></label>
            </div><!--/form-group-->



        </div>

        <div style="float:left">

            <div class="form-group"style='height:30px;'>
                <label class="control-label">হাতা লম্বা  :</label>
                <label class="control-label"><?php echo $order_row['hata']?></label>
            </div><!--/form-group-->

            <div class="form-group" style='height:30px;'>
                <label class="control-label"> কলার :</label>
                <label class="control-label"><?php echo $order_row['colar']?></label>
            </div><!--/form-group-->
            <div class="form-group" style='height:30px;'>
                <label class="control-label"> মহুরী / কফ :</label>
                <label class="control-label"><?php echo $order_row['mohorikof']?></label>
            </div><!--/form-group-->

            <div class="form-group" style='height:30px;'>
                <label class="control-label"> প্লেট ফাডা :</label>
                <label class="control-label"><?php echo $order_row['plat_pada']?></label>
            </div><!--/form-group-->
            <?php echo !empty($order_row['cloth_biborn'])?"
                        <div class='form-group' style='width:160px'>
                          <label class='control-label' style='text-align:left;'> বিবরণ :</label>
                           <label class='control-label'>".$order_row['cloth_biborn']."</label>
                       </div>":''?>
        </div>

        <div style="float:left;margin-right: 10px;">
            <?php echo !empty($order_row['luch'])?"<div class='form-group' style='height:30px;'>
           <label   class='control-label' style='text-align:left;'> লুছ  :</label>
               <label class='control-label'>".$order_row['luch']."</label>
                      </div>":''?>


            <?php echo !empty($order_row['medium'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'> মিডিয়াম    :</label>
                                                                <label class='control-label'>".$order_row['medium']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['fhiting'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'> ফিটিং    :</label>
                                                                <label class='control-label'>".$order_row['fhiting']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['serkolarRound'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'> সেরঃ কলার রাউন্ড    :</label>
                                                                <label class='control-label'>".$order_row['serkolarRound']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['serkolarkona'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'> সেরঃ কলার কোনা   :</label>
                                                                <label class='control-label'>".$order_row['serkolarkona']."</label>
                                                            </div>":''?>


            <?php echo !empty($order_row['kolarRound'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'> কলার রউন্দ  :</label>
                                                                <label class='control-label'>".$order_row['kolarRound']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['kolarKona'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'> কলার কোনা :</label>
                                                                <label class='control-label'>".$order_row['kolarKona']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['vkolar'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'> ভি কলার :</label>
                                                                <label class='control-label'>".$order_row['vkolar']."</label>
                                                            </div>":''?>
            <?php echo !empty($order_row['vgola'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'> ভি গলা  :</label>
                                                                <label class='control-label'>".$order_row['vgola']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['surtorkolar'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'> শার্ট  কলার  :</label>
                                                                <label class='control-label'>".$order_row['surtorkolar']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['golgola'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'> গোল গলা  :</label>
                                                                <label class='control-label'>".$order_row['golgola']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['doubleplat'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'> ডবল প্লেট :</label>
                                                                <label class='control-label'>".$order_row['doubleplat']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['boxplat'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'> বক্স প্লেট :</label>
                                                                <label class='control-label'>".$order_row['boxplat']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['singleplat'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'> সিঙ্গেল প্লেট :</label>
                                                                <label class='control-label'>".$order_row['singleplat']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['ghunti'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'>  ঘুণ্টি  :</label>
                                                                <label class='control-label'>".$order_row['ghunti']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['net'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'>  নেট  :</label>
                                                                <label class='control-label'>".$order_row['net']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['pikingkolar'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'>  পাইপিং কলার  :</label>
                                                                <label class='control-label'>".$order_row['pikingkolar']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['pet'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'>  পেট  :</label>
                                                                <label class='control-label'>".$order_row['pet']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['hatai'])?"<div class='form-group' style='height:30px;'>
                                                               
                                                                <label class='control-label' style='text-align:left;'>  হাতাই   :</label>
                                                                <label class='control-label'>".$order_row['hatai']."</label>
                                                            </div>":''?>

            <?php echo !empty($order_row['phular'])?"
                    <div class='form-group' style='height:30px;'>
                          <label class='control-label' style='text-align:left;'>  ফুলের নং  :</label>
                           <label class='control-label'>".$order_row['phular']."</label>
                          </div>":''?>

        </div>


        <?php if(!empty($order_row['aligod']) || !empty($order_row['saluar']) || !empty($order_row['cudi'])
            || !empty($order_row['costo']) || !empty($order_row['veltsaluar']) || !empty($order_row['dhuti']) || !empty($order_row['ser']) || !empty($order_row['paki']) ){?>
            <div style="width:100%;float:left;border-top: 1px solid black;border-bottom: 1px solid black; margin-top:5px;">
                <div style="float:left;border-right: 1px solid black;padding: 1px;">
                    <div>
                        <label class="control-label" style="text-align:left;"> অডার নং- </label>
                        <label class=" control-label"> <?php echo $order_row['order_no']?> </label>

                    </div><!--/form-group-->
                    <div>
                        <label  style="text-align:left;"> ডেলিভারি তাং : </label>
                        <label > <?php echo date('d/m/Y',strtotime($order_row['delivery_date']))?> </label>
                    </div><!--/form-group-->

                </div>
                <div style="float:left;border-right: 1px solid black;padding: 2px;">
                    <div>
                        <label class="control-label" style="text-align:left;"> অডার নং- </label>
                        <label class=" control-label"> <?php echo $order_row['order_no']?> </label>

                    </div><!--/form-group-->
                    <div>
                        <label  style="text-align:left;"> ডেলিভারি তাং : </label>
                        <label > <?php echo date('d/m/Y',strtotime($order_row['delivery_date']))?> </label>
                    </div><!--/form-group-->


                </div>
                <div style="float:right;padding: 1px;">
                    <div>
                        <label class="control-label" style="text-align:left;"> অডার নং- </label>
                        <label class=" control-label"> <?php echo $order_row['order_no']?> </label>

                    </div><!--/form-group-->
                    <div>
                        <label  style="text-align:left;"> ডেলিভারি তাং : </label>
                        <label > <?php echo date('d/m/Y',strtotime($order_row['delivery_date']))?> </label>
                    </div><!--/form-group-->


                </div>


            </div>


            <div style="width:100%;float:left;border-bottom: 1px solid darkgray;margin-top: 20px;margin-bottom: 10px;">

                <div style="float:left;margin-right: 20px;">
                    <div>
                        <label class="control-label" style="text-align:left;"> অডার নং- </label>
                        <label class=" control-label"> <?php echo $order_row['order_no']?> </label>

                    </div><!--/form-group-->

                </div>
                <div style="float:left;margin-right: 20px;">
                    <?php echo $order_row['aligod']>0?"<div class='form-group' style='height:30px;'>                                           
                  <label class='control-label' style='text-align:left;'>আলীগড় -  </label>
                  <label class='control-label'>".$order_row['aligod']."pc</label>
                  </div>":''?>
                    <?php echo $order_row['saluar']>0?"<div class='form-group' style='height:30px;' >                                     
                    <label class='control-label' style='text-align:left;'>সেলোয়ার -  </label>
                     <label class='control-label'>".$order_row['saluar']."pc</label>
                    </div>":''?>

                    <?php echo $order_row['cudi']>0?"<div class='form-group'style='height:30px;'>
                     <label class='control-label' style='text-align:left;'>চুড়ি -  </label>
                     <label class='control-label'>".$order_row['cudi']."pc</label>
                      </div>":''?>
                    <?php echo $order_row['costo']>0?"<div class='form-group' style='height:30px;'>
                     <label class='control-label' style='text-align:left;'>চোস্ত -  </label>
                     <label class='control-label'>".$order_row['costo']."pc</label>
                      </div>":''?>

                    <?php echo $order_row['veltsaluar']>0?"<div class='form-group' style='height:30px;'>
                      <label class='control-label' style='text-align:left;'>বেল্ট সেলোয়ার -  </label>
                       <label class='control-label'>".$order_row['veltsaluar']."pc</label>
                       </div>":''?>
                    <?php echo $order_row['dhuti']>0?"<div class='form-group'style='height:30px;'>                                    
                   <label class='control-label' style='text-align:left;'>ধুতি -  </label>
                   <label class='control-label'>".$order_row['dhuti']."pc</label>
                   </div>":''?>

                    <?php echo $order_row['ser']>0?"<div class='form-group' style='height:30px;'>
                      <label class='control-label' style='text-align:left;'>সেরঃ পাঃ-  </label>
                      <label class='control-label'>".$order_row['ser']."pc</label>
                       </div>":''?>

                    <?php echo $order_row['paki']>0?"<div class='form-group' style='height:30px;'>
                    <label class='control-label' style='text-align:left;'>পাকি পাঃ -  </label>
                     <label class='control-label'>".$order_row['paki']."pc</label>
                     </div>":''?>

                </div>
                <div style="float:right">
                    <div>
                        <label  style="text-align:left;"> অডার তাং : </label>
                        <label> <?php echo date('d/m/Y',strtotime($order_row['order_date']))?> </label>
                    </div><!--/form-group-->
                    <div>
                        <label  style="text-align:left;"> ডেলিভারি তাং : </label>
                        <label > <?php echo date('d/m/Y',strtotime($order_row['delivery_date']))?> </label>
                    </div><!--/form-group-->
                </div>
            </div>

            <div style="width:100%;float:left">
                <div style="float:left">
                    <?php $sl = 1;?>
                    <div class="form-group" style='float:left;'>
                        <label class="control-label"><?php echo $order_row['ghono_silay']==1?$sl++ .' / ঘন সিলাই ':' ' ?> </label>
                    </div><!--/form-group-->
                    <div class="form-group" style='float:left;padding-left: 20px'>
                        <label class="control-label"><?php echo $order_row['motasuta']==1?$sl++ .' / মোটাসূতা ':' ' ?></label>
                    </div><!--/form-group-->
                    <div class="form-group" style='float:left;padding-left: 20px'>
                        <label class="control-label"> <?php echo $order_row['cikonsuta']==1?$sl++ .' / চিকনসূতা ':' ' ?></label>
                    </div><!--/form-group-->
                    <div class="form-group" style='float:left;padding-left: 20px'>
                        <label class="control-label"><?php echo $order_row['rabar']==1?$sl++ .' / চওডা রাবার ':' ' ?></label>
                    </div><!--/form-group-->
                    <div class="form-group" style='float:left;padding-left: 20px'>
                        <label class="control-label"><?php echo $order_row['dudi']==1?$sl++ .' / ডুডি ':'' ?></label>
                    </div><!--/form-group-->

                </div>
                <div style="float:left">
                    <?php echo !empty($order_row['totalpocket'])?"<div class='form-group' style='height:30px;'>
                <label class='control-label' style='text-align:left;'> মোঃ পঃ  :</label>
                  <label class='control-label'>".$order_row['totalpocket']."</label>
                  </div>":''?>

                    <?php echo !empty($order_row['chain'])?"<div class='form-group' style='height:30px;'>
                  <label class='control-label' style='text-align:left;'> পঃ চেন  :</label>
                   <label class='control-label'>".$order_row['chain']."</label>
                    </div>":''?>

                    <?php echo !empty($order_row['backpocket'])?"<div class='form-group' style='height:30px;'>
                 <label class='control-label' style='text-align:left;'> পিছে পঃ  :</label>
                  <label class='control-label'>".$order_row['backpocket']."</label>
                  </div>":''?>
                </div>
                <div style="float:left">
                    <?php echo !empty($order_row['biborn'])?"
                        <div class='form-group'>
                          <label class='control-label' style='text-align:left'> মাপ :</label>
                           <label class='control-label' style='width:160px;'>".$order_row['biborn']."</label>
                       </div>":''?>
                </div>
            </div>
        <?php }?>
    </div>
</div>
</body>
</html>
