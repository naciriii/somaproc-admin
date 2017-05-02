@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$title}} <a href="{{route('products.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Retour </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                     <form method="post" action="{{ route('products.store') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text"  id="name" name="name" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Photo <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file"  id="photo" name="photo" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('photo'))
                                <span class="help-block">{{ $errors->first('photo') }}</span>
                                @endif
                            </div>
                          
                        </div>

                        <div class="form-group{{ $errors->has('min_price') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="min_price">Prix Min
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text"  id="min_price" name="min_price" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('min_price'))
                                <span class="help-block">{{ $errors->first('min_price') }}</span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('max_price') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="max_price">Prix Max
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text"  id="max_price" name="max_price" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('max_price'))
                                <span class="help-block">{{ $errors->first('max_price') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">Categorie <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="category_id">
                                    @foreach(config('categories') as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                    
                                </select>
                                @if ($errors->has('category_id'))
                                <span class="help-block">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('language_id') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="language_id">Langue <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="language_id">
                                    @foreach(config('languages') as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                    
                                </select>
                                @if ($errors->has('language_id'))
                                <span class="help-block">{{ $errors->first('language_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">Confirmer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop