<?php

class cls_booking {
    //view by id all//
    public function view_order_by_id($order_id) {
        $result = DB::query("SELECT * FROM tbl_order,tbl_master WHERE tbl_order.order_no = tbl_master.order_id and tbl_order.order_no = '$order_id'");
        return $result;
    }

    public function view_order() {
        $result = DB::query("select id,order_no,order_date,delivery_date,name,mobile from tbl_order where status = 1 ORDER BY order_no,order_date DESC");
        return $result;
    }

    public function update_booking() {

        $cls_datetime = new cls_datetime();
        $datetime = $cls_datetime->datetime();
        $db= new DB();
        $order_no = $db->con()->real_escape_string("$_POST[order_no]");
        $deliver_date = $db->con()->real_escape_string("$_POST[deliver_date]");
        $name = $db->con()->real_escape_string("$_POST[name]");
        $mobile = $db->con()->real_escape_string("$_POST[mobile]");
        $cloth = $db->con()->real_escape_string("$_POST[cloth]");
        $salary = $db->con()->real_escape_string("$_POST[salary]");
        $total = $db->con()->real_escape_string("$_POST[total]");
        $advance = $db->con()->real_escape_string("$_POST[advance]");
        $due = $db->con()->real_escape_string("$_POST[due]");
        $discount = $db->con()->real_escape_string("$_POST[discount]");
        $panjabi = $db->con()->real_escape_string("$_POST[panjabi]");
        $sherwani = $db->con()->real_escape_string("$_POST[sherwani]");
        $akchata = $db->con()->real_escape_string("$_POST[akchata]");
        $alighod = $db->con()->real_escape_string("$_POST[alighod]");
        $dhuti = $db->con()->real_escape_string("$_POST[dhuti]");
        $salware = $db->con()->real_escape_string("$_POST[salware]");
        $chudi = $db->con()->real_escape_string("$_POST[chudi]");
        $suit = $db->con()->real_escape_string("$_POST[suit]");
        $jubba = $db->con()->real_escape_string("$_POST[jubba]");
        $fhatua = $db->con()->real_escape_string("$_POST[fhatua]");
        $belt = $db->con()->real_escape_string("$_POST[belt]");
        $ambroydary = $db->con()->real_escape_string("$_POST[ambroydary]");
        $costo = $db->con()->real_escape_string("$_POST[costo]");
        $ser = $db->con()->real_escape_string("$_POST[ser]");
        $paki = $db->con()->real_escape_string("$_POST[paki]");
        $cloth_biborn = $db->con()->real_escape_string("$_POST[cloth_biborn]");
        $cls_datetime = new cls_datetime();
      
        $order_date_is=$cls_datetime->exat_date();

        $lomba = $db->con()->real_escape_string("$_POST[lomba]");
        $bodyluc = $db->con()->real_escape_string("$_POST[bodyluc]");
        $tira = $db->con()->real_escape_string("$_POST[tira]");
        $hata = $db->con()->real_escape_string("$_POST[hata]");
        $kolar = $db->con()->real_escape_string("$_POST[kolar]");
        $mohori_cof = $db->con()->real_escape_string("$_POST[mohori_cof]");
        $plat_pada = $db->con()->real_escape_string("$_POST[plat_pada]");
        $totalpocket = $db->con()->real_escape_string("$_POST[totalpocket]");
        $chain = $db->con()->real_escape_string("$_POST[chain]");
        $backpocket = $db->con()->real_escape_string("$_POST[backpocket]");
        $luch = $db->con()->real_escape_string("$_POST[luch]");
        $medium = $db->con()->real_escape_string("$_POST[medium]");
        $fhiting = $db->con()->real_escape_string("$_POST[fhiting]");
        $serkolarRound = $db->con()->real_escape_string("$_POST[serkolarRound]");
        $serkolarkona = $db->con()->real_escape_string("$_POST[serkolarkona]");
        $kolarRound = $db->con()->real_escape_string("$_POST[kolarRound]");
        $kolarKona = $db->con()->real_escape_string("$_POST[kolarKona]");
        $vkolar = $db->con()->real_escape_string("$_POST[vkolar]");
        $vgola = $db->con()->real_escape_string("$_POST[vgola]");
        $surtorkolar = $db->con()->real_escape_string("$_POST[surtorkolar]");
        $golgola = $db->con()->real_escape_string("$_POST[golgola]");
        $doubleplat = $db->con()->real_escape_string("$_POST[doubleplat]");
        $boxplat = $db->con()->real_escape_string("$_POST[boxplat]");
        $singleplat = $db->con()->real_escape_string("$_POST[singleplat]");
        $ghunti = $db->con()->real_escape_string("$_POST[ghunti]");
        $net = $db->con()->real_escape_string("$_POST[net]");
        $pikingkolar = $db->con()->real_escape_string("$_POST[pikingkolar]");
        $pet = $db->con()->real_escape_string("$_POST[pet]");
        $hatai = $db->con()->real_escape_string("$_POST[hatai]");
        $phular = $db->con()->real_escape_string("$_POST[phular]");
        $biborn = $db->con()->real_escape_string("$_POST[biborn]");
        $ghono_silay = isset($_POST['ghono_silay'])?1:0;
        $motasuta = isset($_POST['motasuta'])?1:0;
        $cikonsuta = isset($_POST['cikonsuta'])?1:0;
        $rabar = isset($_POST['rabar'])?1:0;
        $dudi = isset($_POST['dudi'])?1:0;

        $result = DB::query("update tbl_order set delivery_date = '$deliver_date', name = '$name', mobile='$mobile', 
                            cloth = '$cloth', salary = '$salary', panjabi = '$panjabi', sherwani = '$sherwani', akchata = '$akchata', aligod = '$alighod', 
                            dhuti = '$dhuti', saluar = '$salware', cudi = '$chudi', kabli = '$suit', jubba = '$jubba', phatua = '$fhatua',
                            veltsaluar = '$belt', ambrodary = '$ambroydary', total = '$total', advance = '$advance', due = '$due',discount = '$discount',costo = '$costo', ser = '$ser', paki = '$paki'
                            where order_no='$order_no'");
        $resultMasterTable = DB::query("update tbl_master set lomba ='$lomba',body = '$bodyluc',tira = '$tira',hata = '$hata',colar = '$kolar',mohorikof ='$mohori_cof',plat_pada ='$plat_pada',totalpocket='$totalpocket',chain='$chain',backpocket='$backpocket',luch='$luch',medium='$medium',fhiting='$fhiting',serkolarRound='$serkolarRound',serkolarkona='$serkolarkona',kolarRound='$kolarRound',kolarKona='$kolarKona',vkolar='$vkolar',vgola='$vgola',surtorkolar='$surtorkolar',golgola = '$golgola',doubleplat='$doubleplat',boxplat='$boxplat',singleplat='$singleplat',ghunti='$ghunti',net='$net',pikingkolar='$pikingkolar',pet='$pet',hatai='$hatai',phular='$phular',cloth_biborn ='$cloth_biborn',ghono_silay='$ghono_silay',motasuta='$motasuta',cikonsuta='$cikonsuta',rabar='$rabar',dudi='$dudi',biborn ='$biborn' where order_id ='$order_no'");


        if($result && $resultMasterTable)
        {
            $db->con()->commit();
            return "Order Updated Successfully";
        } else{
            $db->con()->rollback();
            return "Not Updated";
        }

    }
    
    public function supplier_payment(){
        $db= new DB();
       // $db->con()->begin_transaction();
        $order_no = $db->con()->real_escape_string("$_POST[order_no]");
        $deliver_date = $db->con()->real_escape_string("$_POST[deliver_date]");
        $name = $db->con()->real_escape_string("$_POST[name]");
        $mobile = $db->con()->real_escape_string("$_POST[mobile]");
        $cloth = $db->con()->real_escape_string("$_POST[cloth]");
        $salary = $db->con()->real_escape_string("$_POST[salary]");
        $total = $db->con()->real_escape_string("$_POST[total]");
        $advance = $db->con()->real_escape_string("$_POST[advance]");
        $due = $db->con()->real_escape_string("$_POST[due]");
        $discount = $db->con()->real_escape_string("$_POST[discount]");
        $panjabi = $db->con()->real_escape_string("$_POST[panjabi]");
        $sherwani = $db->con()->real_escape_string("$_POST[sherwani]");
        $akchata = $db->con()->real_escape_string("$_POST[akchata]");
        $alighod = $db->con()->real_escape_string("$_POST[alighod]");
        $dhuti = $db->con()->real_escape_string("$_POST[dhuti]");
        $salware = $db->con()->real_escape_string("$_POST[salware]");
        $chudi = $db->con()->real_escape_string("$_POST[chudi]");
        $suit = $db->con()->real_escape_string("$_POST[suit]");
        $jubba = $db->con()->real_escape_string("$_POST[jubba]");
        $fhatua = $db->con()->real_escape_string("$_POST[fhatua]");
        $belt = $db->con()->real_escape_string("$_POST[belt]");
        $ambroydary = $db->con()->real_escape_string("$_POST[ambroydary]");
        $costo = $db->con()->real_escape_string("$_POST[costo]");
        $ser = $db->con()->real_escape_string("$_POST[ser]");
        $paki = $db->con()->real_escape_string("$_POST[paki]");
        $cloth_biborn = $db->con()->real_escape_string("$_POST[cloth_biborn]");
        $cls_datetime = new cls_datetime();
        $order_date_is = $cls_datetime->exat_date();

        $lomba = $db->con()->real_escape_string("$_POST[lomba]");
        $bodyluc = $db->con()->real_escape_string("$_POST[bodyluc]");
        $tira = $db->con()->real_escape_string("$_POST[tira]");
        $hata = $db->con()->real_escape_string("$_POST[hata]");
        $kolar = $db->con()->real_escape_string("$_POST[kolar]");
        $mohori_cof = $db->con()->real_escape_string("$_POST[mohori_cof]");
        $plat_pada = $db->con()->real_escape_string("$_POST[plat_pada]");
        $totalpocket = $db->con()->real_escape_string("$_POST[totalpocket]");
        $chain = $db->con()->real_escape_string("$_POST[chain]");
        $backpocket = $db->con()->real_escape_string("$_POST[backpocket]");
        $luch = $db->con()->real_escape_string("$_POST[luch]");
        $medium = $db->con()->real_escape_string("$_POST[medium]");
        $fhiting = $db->con()->real_escape_string("$_POST[fhiting]");
        $serkolarRound = $db->con()->real_escape_string("$_POST[serkolarRound]");
        $serkolarkona = $db->con()->real_escape_string("$_POST[serkolarkona]");
        $kolarRound = $db->con()->real_escape_string("$_POST[kolarRound]");
        $kolarKona = $db->con()->real_escape_string("$_POST[kolarKona]");
        $vkolar = $db->con()->real_escape_string("$_POST[vkolar]");
        $vgola = $db->con()->real_escape_string("$_POST[vgola]");
        $surtorkolar = $db->con()->real_escape_string("$_POST[surtorkolar]");
        $golgola = $db->con()->real_escape_string("$_POST[golgola]");
        $doubleplat = $db->con()->real_escape_string("$_POST[doubleplat]");
        $boxplat = $db->con()->real_escape_string("$_POST[boxplat]");
        $singleplat = $db->con()->real_escape_string("$_POST[singleplat]");
        $ghunti = $db->con()->real_escape_string("$_POST[ghunti]");
        $net = $db->con()->real_escape_string("$_POST[net]");
        $pikingkolar = $db->con()->real_escape_string("$_POST[pikingkolar]");
        $pet = $db->con()->real_escape_string("$_POST[pet]");
        $hatai = $db->con()->real_escape_string("$_POST[hatai]");
        $phular = $db->con()->real_escape_string("$_POST[phular]");
        $biborn = $db->con()->real_escape_string("$_POST[biborn]");
        $ghono_silay = isset($_POST['ghono_silay'])?1:0;
        $motasuta = isset($_POST['motasuta'])?1:0;
        $cikonsuta = isset($_POST['cikonsuta'])?1:0;
        $rabar = isset($_POST['rabar'])?1:0;
        $dudi = isset($_POST['dudi'])?1:0;

        $id = $this->lastInsertId()+1;
        $result =DB::query("insert into tbl_order(order_no,order_date,delivery_date,name,mobile,cloth,salary,total,advance,due,discount,panjabi,sherwani,akchata,aligod,dhuti,saluar,cudi,kabli,jubba,phatua,veltsaluar,ambrodary,costo,ser,paki) 
              values ('$id','$order_date_is','$deliver_date','$name','$mobile','$cloth','$salary','$total','$advance','$due','$discount','$panjabi','$sherwani','$akchata','$alighod','$dhuti','$salware','$chudi','$suit','$jubba','$fhatua','$belt','$ambroydary','$costo','$ser','$paki')");

        $resultMasterTable = DB::query("insert into tbl_master(order_id,lomba,body,tira,hata,colar,mohorikof,plat_pada,totalpocket,chain,backpocket,luch,medium,fhiting,serkolarRound,serkolarkona,kolarRound,kolarKona,vkolar,vgola,surtorkolar,golgola,doubleplat,boxplat,singleplat,ghunti,net,pikingkolar,pet,hatai,phular,cloth_biborn,ghono_silay,motasuta,cikonsuta,rabar,dudi,biborn)
                 values ('$id','$lomba','$bodyluc','$tira','$hata','$kolar','$mohori_cof','$plat_pada','$totalpocket','$chain','$backpocket','$luch','$medium','$fhiting','$serkolarRound','$serkolarkona','$kolarRound','$kolarKona','$vkolar','$vgola','$surtorkolar','$golgola','$doubleplat','$boxplat','$singleplat','$ghunti','$net','$pikingkolar','$pet','$hatai','$phular','$cloth_biborn','$ghono_silay','$motasuta','$cikonsuta','$rabar','$dudi','$biborn')");

        if($result && $resultMasterTable)
        {
            $db->con()->commit();
            return "Order Received Successfully";

        }

        else{
            $db->con()->rollback();
            return 'Not Inserted';;
        }

    }
    //supplier payment end//
    public function lastInsertId(){
        $result = DB::query("SELECT max(order_no) as lastOrderId FROM tbl_order");
        $output = $result->fetch_assoc();
        return $output['lastOrderId'];

    }

    public function invoice_details($invoice_id)
    {
        $result = DB::query("select * from tbl_order where order_no = '$invoice_id' ");
        return $result;
    
	}
	public function deliveryDateAfterTwoDayes(){
		$date = date("Y-m-d");
		$mod_date = strtotime($date."+ 2 days");
		  $deliveryDate = date("Y-m-d",$mod_date);
		  $result = DB::query("select * from tbl_order where delivery_date BETWEEN '$date' AND '$deliveryDate' AND status =1 order by  delivery_date asc");
        return $result;
	}

 public function completeOrder(){

        $result = DB::query("select * from tbl_order where delivery_date  AND status =2 order by  delivery_date DESC");
        return $result;
    }
    public  function order_complete($orderId){
        $result = DB::query("update tbl_order set status = '2'
                            where order_no='$orderId'");
    }

}
?>