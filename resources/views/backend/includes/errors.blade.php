@if (count($errors))
<div id='msg' class="note note-danger">
@foreach ($errors->all() as $error)
<p style="color:red;">   {!! $error !!} </p>      
@endforeach 
</div>
@endif


@if (Session()->has('msg'))

<div class="alert alert-{{ Session::get('alert') }}" role="{{ Session::get('alert') }}"  >

{!! Session::get("msg") !!}
  
</div>


@endif