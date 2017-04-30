@extends('templates.admin.layout')

@section('content')

<div class="">
    <div class="clearfix">
		@if($errors->any())
			<h4 style="color:red;">{{$errors->first()}}</h4>
		@endif

	</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$assignement->id ? "Update Assignement" : "Create Assignement"}}<a href="{{url('/module/menu/list')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ url('/module/menu/store') }}/{{$assignement->id ? $assignement->id : 0}}" data-parsley-validate class="form-horizontal form-label-left">
                        
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Module
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="module" name="module" class="form-control col-md-7 col-xs-12">
								  <option value="">Select Module</option>
									@for($j=0;$j<count($modules);$j++)
										<option value="{{$modules[$j]->id}}" {{$assignement->module_id == $modules[$j]->id ? "selected" : ""}}>{{$modules[$j]->name}}</option>
									@endfor
								  </select>
                            </div>
                        </div>

						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Menu
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="menu" name="menu" class="form-control col-md-7 col-xs-12">
								  <option value="">Select Menu</option>
									@for($j=0;$j<count($menus);$j++)
										<option value="{{$menus[$j]->id}}" {{$assignement->menu_id == $menus[$j]->id ? "selected" : ""}}>{{$menus[$j]->name}}</option>
									@endfor
								  </select>
                            </div>
                        </div>

						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Role
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="role" name="role" class="form-control col-md-7 col-xs-12">
								  <option value="">Select Role</option>
									@for($j=0;$j<count($roles);$j++)
										<option value="{{$roles[$j]->id}}" {{$assignement->role_id == $roles[$j]->id ? "selected" : ""}}>{{$roles[$j]->name}}</option>
									@endfor
								  </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">{{$assignement->id ? "Update Assignement" : "Create Assignement"}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	$(document).ready(function(){
        $('form').validate({
            rules: {
                module: "required",
                menu: "required",
				role: "required"
            }
        });
	});

</script>
@stop