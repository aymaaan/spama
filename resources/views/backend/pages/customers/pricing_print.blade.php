<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title></title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link href="https://fonts.googleapis.com/css?family=Cairo:400,700&display=swap&subset=arabic" rel="stylesheet">
  <style>
body {  background: rgb(204,204,204);  font-family: 'Cairo', sans-serif; direction: rtl; text-align: right;color: #636466; }
page {   background: white;  display: block;  margin: 0 auto;  margin-bottom: 0.5cm;  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);}
page[size="A4"] {  width: 21cm;  height: 29.7cm;    direction: rtl;    direction: rtl; background: url({{url('')}}/assets/backend/invoice/header-bg.jpg);
  background-repeat: no-repeat;   background-size: cover; position: relative;}
@media print {  body, page {    margin: 0;    box-shadow: 0;  } }
.noright{position: absolute;top: 210px;right: 35px;}
.noright2{position: absolute;top: 240px;right: 35px;background-color: #ebebec;padding: 5px 30px;border-radius: 10px;}
.dateright{position: absolute;top: 210px;left: 35px;}
.dateright2{position: absolute;top: 240px;left: 35px;background-color: #ebebec;padding: 5px 30px;border-radius: 10px;}
.tit{position: absolute;top: 290px;right: 35px;}
.tit2{position: absolute;top: 320px;right: 35px;}
.tit3{position: absolute;top: 350px;right: 35px;}
.salam{position: absolute;top: 390px;right: 35px;}
.total{position: absolute;top: 470px;right: 35px;}
.total2{position: absolute;top: 470px;right: 175px;border: 1px solid #ebebec;padding: 0px 41px;border-radius: 10px;}
.dis{position: absolute;top: 500px;right: 35px;}
.dis2{position: absolute;top: 500px;right: 175px;border: 1px solid #ebebec;padding: 0px 41px;border-radius: 10px;}
.net{position: absolute;top: 530px;right: 35px;}
.net2{position: absolute;top: 530px;right: 175px;border: 1px solid #ebebec;padding: 0px 41px;border-radius: 10px;}
.tax{position: absolute;top: 560px;right: 35px;}
.tax2{position: absolute;top: 560px;right: 175px;border: 1px solid #ebebec;padding: 0px 41px;border-radius: 10px;}
.nettax{position: absolute;top: 590px;right: 35px;}
.nettax2{position: absolute;top: 590px;right: 175px;border: 1px solid #ebebec;padding: 0px 41px;border-radius: 10px;}
.payment{position: absolute;top: 665px;right: 35px;}
.exp{position: absolute;top: 690px;right: 35px;}
.du{position: absolute;top: 690px;right: 320px;}
.place{position: absolute;top: 720px;right: 35px;}
.note{position: absolute;top: 796px;right: 35px;}
.by1{position: absolute;top: 894px;right: 35px;}
.by2{position: absolute;top: 894px;right: 476px;}
  </style>
</head>

<body>
<page size="A4">
 <table width="100%" cellpadding="0" cellspacing="0" border="0">
   <tr>
     <td >
  <div class="noright">رقم</div>
  <div class="noright2">{{ $total_products[0]->serial }}</div>
  <div class="dateright">التاريخ</div>
  <div class="dateright2">{{ $total_products[0]->assessment_date }}</div>

  <!--
  <div class="tit"><b>السادة :</b>{{$customer->name}}</div>
-->
  
  <div class="tit2"><b>السيد : </b>{{$customer->name}}</div>
  <div class="tit3"><b>العنوان : </b>{{$customer->address}}</div>
  <div class="salam"><b>السلام عليكم ورحمة الله وبركاته</b> <br /> يسرنا أن نقدم لكم عرض أسعارنا</div>
  <div class="total">المجموع</div>
  <div class="total2">@if($total_products)
      
      {{ $total_products->sum('total_all_price') }} ريال سعودى

      @else

      0

     @endif</div>
  <div class="dis">الخصم</div>
  <div class="dis2">{{ $total_discount }} ريال سعودى</div>
  <div class="net">الصافى</div>
  <div class="net2">@if($total_products)
      
      {{ $total_products->sum('total_all_price') - $total_discount  }} ريال سعودى

      @else

      0

     @endif</div>
  <div class="tax">الضريبة</div>
  <div class="tax2">@if( isset($total_vat) && $total_vat > 0)
      
      {{ $total_vat }}

    @else

    0

    @endif</div>
  <div class="nettax">الصافى مع الضريبة</div>
  <div class="nettax2">@if($total_products)
      
      {{ $total_products->sum('total_all_price') + $total_vat -  $total_discount }} ريال سعودى

      @else

     0

     @endif</div>
     
  <div class="payment"><b>طريقة الدفع&nbsp;:&nbsp;</b>  قبل التعميد {{$payment_before}}% - عند التسليم {{$payment_while}}% - بعد التركيب {{$payment_after }}%</div>
  <div class="exp"><b>صلاحية العرض&nbsp;:&nbsp;</b>  {{$offer_validity}} يوم </div>
  <div class="du"><b>مدة التوريد&nbsp;:&nbsp;</b> {{$supplying_duration}} يوم عمل</div>
  <div class="place"><b>مكان التسليم&nbsp;:&nbsp;</b> {{$delivery_place_value}}  </div>
  <div class="note"><b>ملاحظات&nbsp;:&nbsp;</b> {{$notes}}</div>
  <div class="by1"><b>أعدت بواسطة&nbsp;:&nbsp;</b>   </div>
  <div class="by2"><b>أعتمدت من&nbsp;:&nbsp;</b>   </div>
  </td>
   </tr>


 </table>


</page>
</body>

</html>