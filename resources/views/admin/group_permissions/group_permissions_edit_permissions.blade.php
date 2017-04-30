@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Group Permissions {{$group_permissions->group_name}} permissions  <a href="{{route('group_permissions.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                  
                    <span class="badge pull-right">{{count($group_permissions->permissions_list())}}  Permissions </span>

                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  
                          @if(count($permissions_categories))
                    <form method="post" action="{{ route('group_permissions.permissions_update', ['id' => $group_permissions->id]) }}" data-parsley-validate class="form-horizontal form-label-left">
                       <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
                             
                               
                                <button type="submit" class="btn btn-success pull-right">Save </button>
                            </div>
                        </div>

                       

                       

                
                          <div class="form-group{{ $errors->has('permissions') ? ' has-error' : '' }}"></div>
                          <div class="form-group{{ $errors->has('permissions') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6 col-sm-6 col-xs-12">
                          

                           @for ($i = 0; $i < count($permissions_categories)/2; $i++)
                               <div class="well" id="permissions_cat_{{$permissions_categories[$i]->id}}">
                               <div class="checkbox checkbox-primary" style="margin-left: 50px;margin-right: 20px"><input  onchange="checkPermissions('permissions_cat_{{$permissions_categories[$i]->id}}')" id="{{$permissions_categories[$i]->name}}" type="checkbox" ><label for="{{$permissions_categories[$i]->name}}" class="label label-primary">
                                   {{$permissions_categories[$i]->name}}
                               </label></div> <br/>;
                               @foreach($permissions_categories[$i]->permissions as $permission)

                            <div class="checkbox checkbox-primary" style="margin-left: 20px;margin-right: 20px"><input   type="checkbox" name="permissions[]" value='{{$permission->id}}' id='{{$permission->name}}' 
                            @if(in_array($permission->id,json_decode($group_permissions->permissions,true)))
                            checked="checked"
                            @endif>
                            <label for="{{$permission->name}}">{{$permission->name}}</label>
                            </div>
                            @endforeach
                            </div> <br/>

                            
                          
                            @endfor

                       
                              
                            </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                          

                           @for ($i = (count($permissions_categories)/2); $i < count($permissions_categories); $i++)
                        
                               <div class="well" id="permissions_cat_{{$permissions_categories[$i]->id}}">
                               <div class="checkbox checkbox-primary" style="margin-left: 50px;margin-right: 20px"><input  onchange="checkPermissions('permissions_cat_{{$permissions_categories[$i]->id}}')" id="{{$permissions_categories[$i]->name}}" type="checkbox" ><label for="{{$permissions_categories[$i]->name}}" class="label label-primary">
                                   {{$permissions_categories[$i]->name}}
                               </label></div> <br/>;
                               @foreach($permissions_categories[$i]->permissions as $permission)

                            <div class="checkbox checkbox-primary" style="margin-left: 20px;margin-right: 20px"><input   type="checkbox" name="permissions[]" value='{{$permission->id}}' id='{{$permission->name}}' 
                            @if(in_array($permission->id,json_decode($group_permissions->permissions,true)))
                            checked="checked"
                            @endif>
                            <label for="{{$permission->name}}">{{$permission->name}}</label>
                            </div>
                            @endforeach
                            </div> <br/>

                            
                          
                            @endfor

                       
                              
                            </div>
                        </div>

                        

                    

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                               
                                <button type="submit" class="btn btn-success pull-right">Save </button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function checkPermissions(categorie) {
    checked=$('#'+categorie+' input').first().prop('checked');



    $('#'+categorie+' input').each(function() {
      this.checked=checked;
   

    });


  }
</script>
@stop