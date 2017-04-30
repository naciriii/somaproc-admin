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
                    <h2>{{$package->id ? "Update Package" : "Create Package"}} <a href="{{url('/package/list')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ url('/package/store') }}/{{$package->id ? $package->id : 0}}" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Package name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$package->name}}" id="name" name="name" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Is Active ?
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="checkbox" {{$package->is_active ? "checked" : ""}} id="is_active" name="is_active" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" > Modules
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="modules" name="modules[]" class="form-control col-md-7 col-xs-12" multiple>
								  <option value="" disabled>Select Modules</option>
									@for($i=0;$i<count($modules);$i++)
										@if(in_array( $modules[$i]->id ,$assignments ))
											<option value="{{$modules[$i]->id}}" selected>{{$modules[$i]->name}} </option>
										@else
											<option value="{{$modules[$i]->id}}">{{$modules[$i]->name}}</option>
										@endif
									@endfor
								</select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">{{$package->id ? "Update Package" : "Create Package"}}</button>
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
                name: "required",
                modules: "required"
            }
        });
	});

</script>

@stop