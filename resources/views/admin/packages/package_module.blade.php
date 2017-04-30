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
                    <h2>{{$assignement->id ? "Update Assignment" : "Create Assignment"}} <a href="{{url('/package_modules/list')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ url('/package_modules/store') }}/{{$assignement->id ? $assignement->id : 0}}" data-parsley-validate class="form-horizontal form-label-left">

						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Package
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="package" name="package" class="form-control col-md-7 col-xs-12">
								  <option value="">Select Package</option>
									@for($j=0;$j<count($packages);$j++)
										<option value="{{$packages[$j]->id}}" {{$assignement->package_id == $packages[$j]->id ? "selected" : ""}}>{{$packages[$j]->name}}</option>
									@endfor
								  </select>
                            </div>
                        </div>
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

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">{{$assignement->id ? "Update Assignment" : "Create Assignment"}}</button>
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
                package: "required",
                module: "required"
            }
        });
	});

</script>

@stop