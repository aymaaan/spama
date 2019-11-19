
                      <div class="form-body">

                        @include('backend.includes.errors') 


                       
 <h4 class="form-section"><i class="la la-commenting"></i> {{__('backend.basic_information')}}</h4>
     


                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"> {{__('backend.name')}} </label>

                              {!! Form::text('name', null , ['class' => 'form-control' , 'placeholder'=> __('backend.name')] ) !!}
                             
                            </div>
                          </div>


                           <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  {{__('backend.phone')}}     </label>

                              {!! Form::number('phone' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: 01008939750'] ) !!}

                            </div>
                          
                            </div>
                            
                            
                            
                            
                     
                     

                          


                        </div>

 <h4 class="form-section"><i class="la la-commenting"></i>  {{__('backend.login_information')}}    </h4>
     
                          
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput3">  {{__('backend.email')}}   </label>

                              {!! Form::text('email', null , ['class' => 'form-control' , 'placeholder'=> __('backend.email')] ) !!}
                           
                            </div>
                          </div>


@if(!isset($user))
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  {{ __('backend.password')}}    </label>

                              {!! Form::password('password', ['class' => 'form-control' , 'placeholder'=> __('backend.password')] ) !!}

                            </div>
                          
                            </div>
@endif

                          



                            
                            </div>

<h4 class="form-section"><i class="la la-key"></i> {{ __('backend.roles')}}    </h4>

<div class="row">

                   
                             

@foreach ($roles as $role)

<div class="form-group  col-md-2">
<label>

<input             @if(isset($user->roles)) @foreach ( $user->roles as $current_role )
                    @if ($current_role->id == $role->id) checked @endif
                    @endforeach @endif
                     name='role_id[]' value='{{$role->id}}' type="checkbox"  class="icheck" data-checkbox="icheckbox_square-purple"> <B 
                     title='@foreach($role->permissions as $permission ){{$permission->label}} | @endforeach' > {{$role->title}}</B> 

</label>
</div>					

@endforeach


 </div>

                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> {{ __('backend.save')}}
                        </button>
                      </div>
                  