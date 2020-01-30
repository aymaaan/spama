<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title></title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link href="https://fonts.googleapis.com/css?family=Cairo:400,700&display=swap&subset=arabic" rel="stylesheet">
  <style>
body {  background: rgb(204,204,204);  font-family: 'Cairo', sans-serif; direction: ltr; text-align: left;color: #636466; }
page {   background: white;  display: block;  margin: 0 auto;  margin-bottom: 0.5cm;  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);}
page[size="A4"] {  width: 21cm;  height: 29.7cm;    direction: ltr;    direction: ltr; background: url({{url('')}}/assets/backend/invoice/en_header-bg.jpg);
  background-repeat: no-repeat;   background-size: cover; position: relative;}
@media print {  body, page {    margin: 0;    box-shadow: 0;  } }
.noleft{position: absolute;top: 210px;left: 35px;}
.noleft2{position: absolute;top: 240px;left: 35px;background-color: #ebebec;padding: 5px 30px;border-radius: 10px;}
.dateleft{position: absolute;top: 210px;right: 35px;}
.dateleft2{position: absolute;top: 240px;right: 35px;background-color: #ebebec;padding: 5px 30px;border-radius: 10px;}
.tit{position: absolute;top: 290px;left: 35px;}
.tit2{position: absolute;top: 320px;left: 35px;}
.tit3{position: absolute;top: 350px;left: 35px;}
.salam{position: absolute;top: 390px;left: 35px;}
.total{position: absolute;top: 470px;left: 35px;}
.total2{position: absolute;top: 470px;left: 175px;border: 1px solid #ebebec;padding: 0px 41px;border-radius: 10px;}
.dis{position: absolute;top: 500px;left: 35px;}
.dis2{position: absolute;top: 500px;left: 175px;border: 1px solid #ebebec;padding: 0px 41px;border-radius: 10px;}
.net{position: absolute;top: 530px;left: 35px;}
.net2{position: absolute;top: 530px;left: 175px;border: 1px solid #ebebec;padding: 0px 41px;border-radius: 10px;}
.tax{position: absolute;top: 560px;left: 35px;}
.tax2{position: absolute;top: 560px;left: 175px;border: 1px solid #ebebec;padding: 0px 41px;border-radius: 10px;}
.nettax{position: absolute;top: 590px;left: 35px;}
.nettax2{position: absolute;top: 590px;left: 175px;border: 1px solid #ebebec;padding: 0px 41px;border-radius: 10px;}
.payment{position: absolute;top: 665px;left: 35px;}
.exp{position: absolute;top: 690px;left: 35px;}
.du{position: absolute;top: 690px;left: 320px;}
.place{position: absolute;top: 720px;left: 35px;}
.note{position: absolute;top: 796px;left: 35px;}
.by1{position: absolute;top: 894px;left: 35px;}
.by2{position: absolute;top: 894px;left: 476px;}
  </style>
</head>

<body>
<page size="A4">
 <table width="100%" cellpadding="0" cellspacing="0" border="0">
   <tr>
     <td >
  <div class="noleft">NO.</div>
  <div class="noleft2">{{ $total_products[0]->serial }}</div>
  <div class="dateleft">Date</div>
  <div class="dateleft2">{{ $total_products[0]->assessment_date }}</div>
  <!--
  <div class="tit"><b>M/S :</b>{{$customer->name}}</div>
-->
  <div class="tit2"><b>Mr.</b>{{$customer->name}}</div>
  <div class="tit3"><b>Address:</b>{{$customer->address}}</div>
  <div class="salam"><b>We are pleased to offer you our quotation:</div>
  <div class="total">Total</div>
  <div class="total2">@if($total_products)
      
      {{ $total_products->sum('total_all_price') }} SR

      @else

      0

     @endif</div>
  <div class="dis">DISC.</div>
  <div class="dis2">{{ $total_discount }} SR</div>
  <div class="net">Net</div>
  <div class="net2">@if($total_products)
      
      {{ $total_products->sum('total_all_price') - $total_discount  }} SR

      @else

      0

     @endif</div>
  <div class="tax">VAT.</div>
  <div class="tax2">@if( isset($total_vat) && $total_vat > 0)
      
      {{ $total_vat }}

    @else

    0

    @endif</div>
  <div class="nettax">Net+VAT</div>
  <div class="nettax2">@if($total_products)
      
      {{ $total_products->sum('total_all_price') + $total_vat -  $total_discount }} SR

      @else

     0

     @endif</div>
  <div class="payment"><b>- Payment Terms:&nbsp;:&nbsp;</b>  Before approval {{$payment_before}}% - Upon delivery {{$payment_while}}% - After installation {{$payment_after }}% </div>
  <div class="exp"><b>- Validity:&nbsp;:&nbsp;</b>{{$offer_validity}} Day</div>
  <div class="du"><b>- Delivery Terms:&nbsp;:&nbsp;</b>{{$supplying_duration}} Work Day</div>
  <div class="place"><b>- Delivery Place:&nbsp;:&nbsp;</b>{{$delivery_place_value}}</div>
  <div class="note"><b>- Notes:&nbsp;:&nbsp;</b>{{$notes}} </div>
  <div class="by1"><b>Prepared by:&nbsp;:&nbsp;</b>  {{$delgate_name->name}} {{$delgate_name->data['last_name'] ?? ''}}    </div>
  <div class="by2"><b>Prepared by:&nbsp;:&nbsp;</b>   {{$delgate_name->data->manager->data->first_name ?? ''}} {{$delgate_name->data->manager->data->last_name ?? ''}}   </div>
  </td>
   </tr>





 </table>




</page>
</body>

</html>