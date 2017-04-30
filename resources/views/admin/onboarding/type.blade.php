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
                    <h2>{{$itype->id ? "Update ".ucfirst(explode("_", $type)[0])." ".ucfirst(explode("_", $type)[1]) : "Create ".ucfirst(explode("_", $type)[0])." ".ucfirst(explode("_", $type)[1])}}
					<a href="{{url('/list/'.$type)}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ url('/store/'.$type) }}/{{$itype->id ? $itype->id : 0}}" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> {{ ucfirst(explode("_", $type)[0]).' '.ucfirst(explode("_", $type)[1]) }} name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$itype->name}}" id="name" name="name" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">{{$itype->id ? "Update ".ucfirst(explode("_", $type)[0])." ".ucfirst(explode("_", $type)[1]) : "Create ".ucfirst(explode("_", $type)[0])." ".ucfirst(explode("_", $type)[1])}}</button>
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