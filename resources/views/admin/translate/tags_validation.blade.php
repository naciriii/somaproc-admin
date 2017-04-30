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
                                <th>File name</th>
                                <th>Tags</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>File name</th>
                                <th>Tags</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                        @foreach($TranslateAddNewTags as $tr=>$t)
                         
                         
                        <tr>
                            
                            <td>{{$t->file_name}}</td>
                            @foreach(json_decode($t->tags) as $s=>$v)
                            <td> 
                                
                                {{$s}}
                                
                            </td>
                            <td>{{$v}}</td>
                            @endforeach
                            <td><a href="{{ route('validateTag', ['id' => $t->id,'v'=>'f']) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                            <a href="{{ route('validateTag', ['id' => $t->id,'v'=>'t']) }}" class="btn btn-success btn-xs"><i class="fa fa-check" title="Validation"></i> </a></td>
                        </tr>
                     
                        @endforeach

                      
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop