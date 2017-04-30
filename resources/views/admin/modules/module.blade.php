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
                    <h2>{{$module->id ? "Update Module" : "Create Module"}} <a href="{{url('/module/list')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ url('/module/store') }}/{{$module->id ? $module->id : 0}}" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Module name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$module->name}}" id="name" name="name" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">{{$module->id ? "Update Module" : "Create Module"}}</button>
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
                name: "required"
            }
        });
	});

</script>

@stop