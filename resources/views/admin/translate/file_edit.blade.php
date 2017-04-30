@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         <form method="post" action="{{ url('/file', ['id' => $file_id]) }}"  data-parsley-validate class="form-horizontal">
            <div class="x_panel">
           
                <div class="x_title">
                    <h2>{{$title or '' }} {{$file_name}}: {{$language}} 
                    
                    

                    <a href="{{ url('file_list',['id'=>$language]) }}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><h2><a href="{{route('addnewtag',['lng'=>$language,'fname'=>$file_name,'fid'=>$file_id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add New </a></h2></li>
                        <li> 
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                   <input name="_method" type="hidden" value="PUT">
                                    <button type="submit" class="btn btn-success">Save </button>
                                   
                                </li>
                      </ul>

                    <div class="clearfix"></div>

                </div>
              
                <div class="x_content">
                 @if ($file_name!='validation')
                          @if(count($translation))
                            @foreach ($translation as $row=>$t)
                                         <div class="form-group{{ $errors->has('word') ? ' has-error' : '' }}">
                            <div class="row">
                             <div class="col-md-4">
                               <label for="word">{{ $row}} <span class="required">*</span></label>
                             </div>
                             <div class="col-md-8">
                               <input type="text" value="{{$t}}" id="word" name="{{$row}}" class="form-control">
                               
                                @if ($errors->has('word'))
                                <span class="help-block">{{ $errors->first('word') }}</span>
                                @endif
                             </div>
                           </div>
                              
                            </div>
                            @endforeach
                  @endif
                   @else
                    <h3>validation</h3>
                   @foreach($translation as $row=>$t)

                    @if(!(is_array($t)))
                      {{$row}}: {{$t}}<br>
                    @else
                    
                      @foreach($t as $r=>$q)
                        {{$r}}: @if(!(is_array($q)))
                                  {{$q}}<br>
                                @else
                                  @foreach($q as $b=>$n)
                                    {{$b}}: {{$n}}<br>
                                  @endforeach
                                @endif
                     @endforeach
                    @endif
                   @endforeach
                   
             
                  @endif
                

                   
                   
                </div>
            </div>
            <div class="panel-footer">
              <div class="x_title">
                    <h2>{{$title or '' }} {{$file_name}}: {{$language}} 
                    
                    

                    <a href="{{ url('file_list',['id'=>$language]) }}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><h2><a href="{{route('addnewtag',['lng'=>$language,'fname'=>$file_name,'fid'=>$file_id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add New </a></h2></li>
                        <li> 
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                   <input name="_method" type="hidden" value="PUT">
                                    <button type="submit" class="btn btn-success">Save </button>
                               
                                </li>
                      </ul>

                    <div class="clearfix"></div>

                </div>
            </div>
                
        </div>
        </form>
    </div>
</div>
@stop