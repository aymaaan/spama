@foreach($categories->mother_products as $category)
<li id="mother_id" value="{{ $category->id }}">
<a href="#">  <B> {{ $category->title }} </B> </a> 
</li> <br>
@endforeach





<a href="#" id="back_to_categories" class="btn btn-success btn">
<i class="icon-action-undo"></i> التصنيفات الاساسية
</a>