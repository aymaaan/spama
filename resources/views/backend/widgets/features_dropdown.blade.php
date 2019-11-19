
@foreach ( $data as $k=>$row )

<div id="feature_{{$k + 1}}" class="col-md-3">
  <div class="form-group">
    <label for="projectinput3"> {{$row->title}} </label>

    <select  required name="feature_{{$k + 1}}" class="form-control">


      <option serial="" title_ar="" title_en ="" value=""> -- {{$row->title}} -- </option>

      @foreach ( $row->sub_features as $feature )
      <option title_ar="{{$feature->title}}" title_en="{{$feature->title_en}}" serial="{{$feature->serial}}"  value="{{$feature->serial}}">{{$feature->title}}</option>
      @endforeach



    </select>

  </div>
</div>

@endforeach                 



<script>
  $(document).ready(function(){

 $('select[name="feature_1"]').on('change', function() {


//Change Product Name

//Arabic
var brand_title_ar = $('select[name="brand_id"]').find('option:selected').attr("title_ar");
var firstname_title_ar = $('select[name="first_name"]').find('option:selected').attr("title_ar");
var feature_1_title_ar = $('select[name="feature_1"]').find('option:selected').attr("title_ar");
var feature_2_title_ar = $('select[name="feature_2"]').find('option:selected').attr("title_ar");
var feature_3_title_ar = $('select[name="feature_3"]').find('option:selected').attr("title_ar");

$('#title_ar').val(brand_title_ar + ' ' + firstname_title_ar + ' ' + feature_1_title_ar + ' ' + feature_2_title_ar + ' ' + feature_3_title_ar);

//English
var brand_title_en = $('select[name="brand_id"]').find('option:selected').attr("title_en");
var firstname_title_en = $('select[name="first_name"]').find('option:selected').attr("title_en");
var feature_1_title_en = $('select[name="feature_1"]').find('option:selected').attr("title_en");
var feature_2_title_en = $('select[name="feature_2"]').find('option:selected').attr("title_en");
var feature_3_title_en = $('select[name="feature_3"]').find('option:selected').attr("title_en");


$('#title_en').val(brand_title_en + ' ' + firstname_title_en + ' ' + feature_1_title_en + ' ' + feature_2_title_en + ' '  + feature_3_title_en);


//End Change Product Name

//Change SKU

      var serial_product =  "{{$last_serial}}";
      var mother_product_serial = $('select[name="mother_product_id"]').find('option:selected').attr("serial");
      var brand_serial = $('select[name="brand_id"]').find('option:selected').attr("serial");
      var firstname = $('select[name="first_name"]').find('option:selected').attr("serial");
      var feature_1 = $('select[name="feature_1"]').find('option:selected').attr("serial");
      var feature_2 = $('select[name="feature_2"]').find('option:selected').attr("serial");
      var feature_3 = $('select[name="feature_3"]').find('option:selected').attr("serial");
      if(!feature_3 || feature_1.length == 2 ) var feature_3 = '';
      $('#sku').val(mother_product_serial + brand_serial + firstname + feature_1  + feature_2 + feature_3 + serial_product);


      if( feature_1.length == 1 ) {
        $('#feature_3').show();
      } else {

        $('#feature_3').hide();
      }


    });


$('select[name="feature_2"]').on('change', function() {
//Change Product Name

//Arabic
var brand_title_ar = $('select[name="brand_id"]').find('option:selected').attr("title_ar");
var firstname_title_ar = $('select[name="first_name"]').find('option:selected').attr("title_ar");
var feature_1_title_ar = $('select[name="feature_1"]').find('option:selected').attr("title_ar");
var feature_2_title_ar = $('select[name="feature_2"]').find('option:selected').attr("title_ar");
var feature_3_title_ar = $('select[name="feature_3"]').find('option:selected').attr("title_ar");

$('#title_ar').val(brand_title_ar + ' ' + firstname_title_ar + ' ' + feature_1_title_ar + ' ' + feature_2_title_ar + ' ' + feature_3_title_ar);

//English
var brand_title_en = $('select[name="brand_id"]').find('option:selected').attr("title_en");
var firstname_title_en = $('select[name="first_name"]').find('option:selected').attr("title_en");
var feature_1_title_en = $('select[name="feature_1"]').find('option:selected').attr("title_en");
var feature_2_title_en = $('select[name="feature_2"]').find('option:selected').attr("title_en");
var feature_3_title_en = $('select[name="feature_3"]').find('option:selected').attr("title_en");


$('#title_en').val(brand_title_en + ' ' + firstname_title_en + ' ' + feature_1_title_en + ' ' + feature_2_title_en + ' '  + feature_3_title_en);


//End Change Product Name


// Change SKU

      var serial_product =  "{{$last_serial}}";
      var mother_product_serial = $('select[name="mother_product_id"]').find('option:selected').attr("serial");
      var brand_serial = $('select[name="brand_id"]').find('option:selected').attr("serial");
      var firstname = $('select[name="first_name"]').find('option:selected').attr("serial");
      var feature_1 = $('select[name="feature_1"]').find('option:selected').attr("serial");
      var feature_2 = $('select[name="feature_2"]').find('option:selected').attr("serial");
      var feature_3 = $('select[name="feature_3"]').find('option:selected').attr("serial");
      if(!feature_3 || feature_1.length == 2 ) var feature_3 = '';
      $('#sku').val(mother_product_serial + brand_serial + firstname + feature_1  + feature_2 + feature_3 + serial_product);

//End Change SKU


    });



$('select[name="feature_3"]').on('change', function() {


//Change Product Name

//Arabic
var brand_title_ar = $('select[name="brand_id"]').find('option:selected').attr("title_ar");
var firstname_title_ar = $('select[name="first_name"]').find('option:selected').attr("title_ar");
var feature_1_title_ar = $('select[name="feature_1"]').find('option:selected').attr("title_ar");
var feature_2_title_ar = $('select[name="feature_2"]').find('option:selected').attr("title_ar");
var feature_3_title_ar = $('select[name="feature_3"]').find('option:selected').attr("title_ar");

$('#title_ar').val(brand_title_ar + ' ' + firstname_title_ar + ' ' + feature_1_title_ar + ' ' + feature_2_title_ar + ' ' + feature_3_title_ar);

//English
var brand_title_en = $('select[name="brand_id"]').find('option:selected').attr("title_en");
var firstname_title_en = $('select[name="first_name"]').find('option:selected').attr("title_en");
var feature_1_title_en = $('select[name="feature_1"]').find('option:selected').attr("title_en");
var feature_2_title_en = $('select[name="feature_2"]').find('option:selected').attr("title_en");
var feature_3_title_en = $('select[name="feature_3"]').find('option:selected').attr("title_en");


$('#title_en').val(brand_title_en + ' ' + firstname_title_en + ' ' + feature_1_title_en + ' ' + feature_2_title_en + ' '  + feature_3_title_en);
//End Change Product Name

//Change SKU

      var serial_product =  "{{$last_serial}}";
      var mother_product_serial = $('select[name="mother_product_id"]').find('option:selected').attr("serial");
      var brand_serial = $('select[name="brand_id"]').find('option:selected').attr("serial");
      var firstname = $('select[name="first_name"]').find('option:selected').attr("serial");
      var feature_1 = $('select[name="feature_1"]').find('option:selected').attr("serial");
      var feature_2 = $('select[name="feature_2"]').find('option:selected').attr("serial");
      var feature_3 = $('select[name="feature_3"]').find('option:selected').attr("serial");
      if(!feature_3 || feature_1.length == 2 ) var feature_3 = '';
      $('#sku').val(mother_product_serial + brand_serial + firstname + feature_1  + feature_2 + feature_3 + serial_product);

//END Change SKU



   });






  });








</script>