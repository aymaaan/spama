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
page[size="A4"] {  width: 21cm;  height: 29.7cm;    direction: ltr;    direction: ltr; background: url({{url('')}}/assets/backend/invoice/en_a4-1.jpg);
  background-repeat: no-repeat;   background-size: 100% 100%; position: relative;padding-top:100px;}
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
    <th class="tg-0lax">SKU</th>
    <th class="tg-0lax">Title</th>
    <th class="tg-0lax">Description</th>
    <th class="tg-0lax">Unit</th>
    <th class="tg-0lax">QTY.</th>
    <th class="tg-0lax">Unit Price</th>
    <th class="tg-0lax">DISC.%</th>
    <th class="tg-0lax">VAT</th>
    <th class="tg-0lax">Total</th>
  </tr>


  @foreach( $total_products as $k=>$product)
  <tr>

    <td class="tg-0lax"> {{ $k + 1 }} </td>
    <td class="tg-0lax"> @if( $product->info['sku']  != 'FAST_ADDED') {{ $product->info['sku'] }} @else 010101010101 @endif </td>
    <td class="tg-0lax"> {{ $product->info['title_en'] }} </td>
    <td class="tg-0lax"> {{ GetDescription('en',$total_products[0]->serial,$product->info['id']) }} </td>
    <td class="tg-0lax"> {{ $product->unit['title']  }}  </td>
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