@extends('templates.admin.layout')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

<script type="text/javascript" src="{{asset('admin/js/bootstrap-select.js')}}"></script>
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
                    <h2>{{$menu->id ? "Update Menu" : "Create Menu"}}<a href="{{url('/menu/list')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ url('/menu/store') }}/{{$menu->id ? $menu->id : 0}}" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Menu name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$menu->name}}" id="name" name="name" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Menu URL<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$menu->url}}" id="url" name="url" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Menu Order<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$menu->order}}" id="order" name="order" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Parent menu
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="parent" name="parent" class="form-control col-md-7 col-xs-12">
								  <option value="">Select Parent</option>
									@for($j=0;$j<count($menus);$j++)
										<option value="{{$menus[$j]->id}}" {{$menu->parent_id == $menus[$j]->id ? "selected" : ""}}{{$menu->id == $menus[$j]->id ? "disabled" : ""}}>{{$menus[$j]->name}}</option>
									@endfor
								  </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Menu Icon<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="icon" name="icon" class="form-control col-md-7 col-xs-12">
								  <option value="">Select icon</option>
								  <option value="cutlery" data-content="<i class='glyphicon glyphicon-cutlery'></i> cutlery"></option>
								  <option value="eye-open" data-content="<i class='glyphicon glyphicon-eye-open'></i> eye-open">&#xe105; </option>
								  <option value="heart-empty" data-content="<i class='glyphicon glyphicon-heart-empty'></i> heart-empty">&#xe143; heart-empty</option>
								  <option value="leaf" data-content="<i class='glyphicon glyphicon-leaf'></i> leaf"> </option>
								  <option value="calendar" data-content="<i class='glyphicon glyphicon-calendar'></i> calendar"> </option>
								  <option value="envelope"data-content="<i class='glyphicon glyphicon-envelope'></i> envelope"> </option>
								</select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">{{$menu->id ? "Update Menu" : "Create Menu"}}</button>
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
		$('select').selectpicker();
        $('form').validate({
            rules: {
                name: "required",
                url: "required",
				icon: "required",
                order: {
				  required: true,
				  number: true
				}
            }
        });
	});

</script>
@stop