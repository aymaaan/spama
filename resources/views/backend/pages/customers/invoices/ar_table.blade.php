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
page[size="A4"] {  width: 21cm;  height: 29.7cm;    direction: rtl;    direction: rtl; background: url({{url('')}}/assets/backend/invoice/a4-1.jpg);
  background-repeat: no-repeat;   background-size: cover; position: relative;padding-top:85px;}
@media print {  body, page {    margin: 0;    box-shadow: 0;  } }
table{width:100%}
.tg  {border-collapse:collapse;border-spacing:0;border-color:#9ABAD9;}
.tg td{font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#9ABAD9;color:#444;background-color:#EBF5FF;text-align:center;}
.tg th{font-size:12px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#9ABAD9;color:#fff;background-color:#0098dd;text-align:center;}
.tg .tg-0lax{text-align:center;vertical-align:top}
  </style>
</head>

<body>
<page size="A4">

<table class="tg">
  <tr>
    <th class="tg-0lax">#</th>
    <th class="tg-0lax">رقم المنتج</th>
    <th class="tg-0lax">البيان</th>
    <th class="tg-0lax">الوحدة</th>
    <th class="tg-0lax">الكمية</th>
    <th class="tg-0lax">سعر الوحدة</th>
    <th class="tg-0lax">الخصم %</th>
    <th class="tg-0lax">الضريبة</th>
    <th class="tg-0lax">المجموع</th>
  </tr>

  @foreach( $total_products as $k=>$product)
  <tr>

    <td class="tg-0lax"> {{ $k + 1 }} </td>
    <td class="tg-0lax"> @if( $product->info['sku']  != 'FAST_ADDED') {{ $product->info['sku'] }} @else 010101010101 @endif </td>
    <td class="tg-0lax"> {{ $product->info['title_ar'] }} </td>
    <td class="tg-0lax"> {{ $product->unit['title']  }} </td>
    <td class="tg-0lax"> {{ $product->total_all_products  }} </td>
    <td class="tg-0lax"> {{ $product->unit_price }} </td>
    <td class="tg-0lax"> %{{ $product->discount OR '0' }} </td>
    <td class="tg-0lax">  @if($product->info['value_added'] == 'YES') {{ ($product->total_all_price - ( $product->total_all_price * $product->discount / 100  ) ) * 5 / 100 }} @else 0  @endif </td>
    <td class="tg-0lax"> @if($product->info['value_added'] == 'YES')
               {{ $product->total_all_price - ( $product->total_all_price * $product->discount / 100  ) +  (($product->total_all_price - ( $product->total_all_price * $product->discount / 100  ) ) * 5 / 100)  }}
               @else
               {{ $product->total_all_price -  ( $product->total_all_price * $product->discount / 100  ) }}
               @endif </td>


  </tr>

  @endforeach

</table>



</page>
</body>

</html>