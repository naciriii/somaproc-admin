@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Account <a href="{{route('accounts.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('accounts.update', ['id' => $account->id]) }}" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$account->name}}" id="name" name="name" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('tax_number') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax_number">Tax Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$account->tax_number}}" id="tax_number" name="tax_number" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('tax_number'))
                                <span class="help-block">{{ $errors->first('tax_number') }}</span>
                                @endif
                            </div>
                        </div>
                          <div class="form-group{{ $errors->has('business_number') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="business_number">Business Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$account->business_number}}" id="business_number" name="business_number" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('business_number'))
                                <span class="help-block">{{ $errors->first('business_number') }}</span>
                                @endif
                            </div>
                        </div>

                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Country
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name='country' value="{{ Request::old('country') ?: '' }}" id="country" class="form-control col-md-7 col-xs-12">
                                  @if($account->country=='') 
                                <option value="">Choose</option>
                                @endif
                               
                                  @foreach($countries as $ind)
                                  <option value="{{$ind->id}}" @if($ind->id==$account->country) selected="selected" @endif>
                                  {{$ind->name}} </option>
                                  @endforeach
                                </select>
                                 @if ($errors->has('country'))
                                <span class="help-block">{{ $errors->first('country') }}</span>
                                @endif
                               
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('indestry') ? ' has-error' : '' }}">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="industry">Industry
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name='indestry' value="{{ Request::old('indestry') ?: '' }}" id="indestry" class="form-control col-md-7 col-xs-12">
                                @if($account->industry_id=='') 
                                <option value="">Choose</option>
                                @endif
                               
                                  @foreach($indestrys as $ind)

                                  <option value="{{$ind->id}}" @if($ind->id==$account->industry_id) selected="selected" @endif>
                                  {{$ind->name}} </option>
                                  @endforeach
                                </select>
                                 @if ($errors->has('indestry'))
                                <span class="help-block">{{ $errors->first('indestry') }}</span>
                                @endif
                               
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('package') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="package">Package
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name='package' value="{{ Request::old('package') ?: '' }}" id="package" class="form-control col-md-7 col-xs-12">
                                  @if($account->package_id=='') 
                                <option value="">Choose</option>
                                @endif
                               
                                  @foreach($packages as $pkg)
                                  <option value="{{$pkg->id}}" @if($pkg->id==$account->package_id) selected="selected" @endif>
                                  {{$pkg->name}} </option>
                                  @endforeach
                                </select>
                                 @if ($errors->has('package'))
                                <span class="help-block">{{ $errors->first('package') }}</span>
                                @endif
                               
                            </div>
                        </div>
                      <div class="from-group col-md-6 col-md-offset-1">
                       <label class="control-label col-md-4 col-sm-3 col-xs-12"  for="is_active"> Is Active</label>
                      
                               <div class="checkbox checkbox-primary" >
                                  
                          <input type="checkbox" style="margin-left: 20px;" name='is_active' value="1"
                          @if($account->is_active) checked="checked" @endif>
                          </div>
                      </div>
                        <div class="from-group col-md-6 col-md-offset-1">
                       <label class="control-label col-md-4 col-sm-3 col-xs-12"  for="is_active"> Is suspended</label>
                      
                               <div class="checkbox checkbox-primary" >
                                  
                          <input type="checkbox" style="margin-left: 20px;" name='is_suspended' value="1"
                          @if($account->is_suspended) checked="checked" @endif>
                          </div>
                      </div>

                       

                      
                            

                       

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            

                        
  
                    <br/><br/>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
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