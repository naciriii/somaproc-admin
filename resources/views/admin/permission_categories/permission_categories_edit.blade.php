@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Permission <a href="{{route('permissions.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('permissions.update', ['id' => $permission->id]) }}" data-parsley-validate class="form-horizontal form-label-left">

                       

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Permission Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$permission->name}}" id="name" name="name" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tag">Permission Tag
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$permission->tag}}" id="tag" name="tag" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('tag'))
                                <span class="help-block">{{ $errors->first('tag') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Industry
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name='category' class='form-control'>
                                @foreach($categories as $ind)
                                <option value="{{$ind->id}}" 
                                @if($ind->id==$permission->permission_categorie_id)
                                selected='selected'
                                @endif
                                >{{$ind->name}}</option>
                                @endforeach
                            </select>
                                
                                @if ($errors->has('tag'))
                                <span class="help-block">{{ $errors->first('tag') }}</span>
                                @endif
                            </div>
                        </div>

                        

                    

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-success">Save Permission Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop