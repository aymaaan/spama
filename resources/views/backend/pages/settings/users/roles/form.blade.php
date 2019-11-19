
<div class="form-body">


    @if (count($errors))


    <div id='msg' class="note note-danger">

     من فضلك أدخل بيانات جميع الحقول المميزة بعلامة *

 </div>


 @endif


 <div class="form-group  margin-top-20 @if ($errors->has('title')) has-error @endif">
    <label class="control-label col-md-3"> أسم المجموعة
        <span class="required"> * </span>
    </label>
    <div class="col-md-4">
        <div class="input-icon right">
            <i class="fa"></i>

            {!! Form::text('title', null ,  ['class' => 'form-control' , 'placeholder' => 'HR,User,Aprrover ... etc'] ) !!}
            @if ($errors->has('title'))
            <span class="help-block">
                {{ $errors->first('title') }}
            </span>
            @endif


        </div>
    </div>
</div>



<div class="row">

                   

@foreach ($permissions as $permission)

<div class="form-group  col-md-12">


<h4 class="form-section"><i class="{{$permission->icon}}"></i>  {{$permission->label}}   <input @if ( isset($role->id) && $role->permissions->contains('id' , $permission->id)) checked @endif name='permissions[]' value='{{$permission->id}}' type="checkbox"  class="input-chk" data-checkbox="icheckbox_square-purple"></h4>




</div>	

@foreach ( $permission->list_permissions as $list_permission)

<div class="form-group  col-md-3">
<label>

<input @if ( isset($role->id) && $role->permissions->contains('id' , $list_permission->id)) checked @endif name='permissions[]' value='{{$list_permission->id}}' type="checkbox"  class="input-chk" data-checkbox="icheckbox_square-purple"> <B >{{$list_permission->label}} </B> 

</label>
</div>	

@endforeach



@endforeach


 </div>
                        





</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green">{{ $submiteText }}</button>

        </div>
    </div>
</div>


</div> 






