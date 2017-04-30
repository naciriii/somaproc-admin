@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$title or '' }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                         <thead>
                            <tr>
                               
                                <th>Old version</th>
                                <th>New version</th>
                                <th>Action</th>
                            
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>old version</th>
                                <th>New version</th>
                                <th>Action</th>
                                
                            </tr>
                        </tfoot>
                        <tbody>

                        @foreach($translationUp as $tr)
                         @foreach($translation as $ts)
                           @if($tr->tran_id==$ts->id)
                        <tr>
                            
                            <td>
                                @foreach(json_decode($ts->text) as $s=>$l)
                            {{$s}} : {{$l}}</br>


                            @endforeach
                            </td>
                            <td>
                          
                            @foreach(json_decode($tr->text) as $s=>$l)
                            {{$s}} : {{$l}}</br>


                            @endforeach</td>
                            <td><a href="{{ url('validation/delete', ['id' => $tr->tran_id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                            <a href="{{ url('validation', ['id' => $tr->tran_id]) }}" class="btn btn-success btn-xs"><i class="fa fa-check" title="Validation"></i> </a></td>
                        </tr>
                        @endif
                        @endforeach
                        @endforeach

                      
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop