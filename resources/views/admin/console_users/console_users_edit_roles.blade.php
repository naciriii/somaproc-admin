@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Console User {{$console_user->name}} roles <a href="{{route('console_users.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('console_users.roles_update', ['id' => $console_user->id]) }}" data-parsley-validate class="form-horizontal form-label-left">

                       

                       

                      
                          <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}"></div>
                          <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6 col-sm-6 col-xs-12">
                          

                            @foreach($roles as $r)
                            <div class="checkbox checkbox-primary" style="margin-left: 20px;margin-right: 20px"><input   type="checkbox" name="roles[]" value='{{$r->id}}' id='{{$r->name}}' @if($console_user->hasRole($r->name))
                            checked="checked"
                            @endif>
                            <label for="{{$r->name}}">{{$r->name}}</label></div>

                            
                          
                            @endforeach

                       
                              
                            </div>
                        </div>

                        

                    

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                               
                                <button type="submit" class="btn btn-success">Save </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop