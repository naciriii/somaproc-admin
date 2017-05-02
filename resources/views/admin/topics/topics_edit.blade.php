@extends('templates.admin.layout')

@section('content')
<script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>

<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$title}} <a href="{{route('topics.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Retour </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('topics.update', ['id' => $topic->id]) }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Titre <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{{$topic->title}}" id="title" name="title" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('title'))
                                <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('photo1') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo1">Photo 1 <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="file"  id="photo1" name="photo1" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('photo1'))
                                <span class="help-block">{{ $errors->first('photo1') }}</span>
                                @endif
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                            <img src="{{asset($topic->photo1)}}" class='img-responsive'>
                             
                            </div>
                        </div>
                          <div class="form-group{{ $errors->has('photo2') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo2">Photo 2 <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="file"  id="photo2" name="photo2" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('photo2'))
                                <span class="help-block">{{ $errors->first('photo2') }}</span>
                                @endif
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                            <img src="{{asset($topic->photo2)}}" class='img-responsive'>
                             
                            </div>
                        </div>
                          <div class="form-group{{ $errors->has('photo3') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo3">Photo <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="file"  id="photo3" name="photo3" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('photo3'))
                                <span class="help-block">{{ $errors->first('photo3') }}</span>
                                @endif
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                            <img src="{{asset($topic->photo3)}}" class='img-responsive'>
                             
                            </div>
                        </div>


                   
                           <div class="form-group{{ $errors->has('language_id') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="language_id">Langue <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="language_id">
                                    @foreach(config('languages') as $key=>$value)
                                    <option value="{{$key}}" @if($key==$topic->language_id) selected='selected' @endif>{{$value}}</option>
                                    @endforeach
                                    
                                </select>
                                @if ($errors->has('language_id'))
                                <span class="help-block">{{ $errors->first('language_id') }}</span>
                                @endif
                            </div>
                        </div>
                               <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="description" id="description">
                                {!! $topic->description !!}
                                    
                                </textarea> 
                                      <script>
                                
        
             
               CKEDITOR.replace( 'description');
            </script>
                                @if ($errors->has('description'))
                                <span class="help-block">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>

                    

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
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