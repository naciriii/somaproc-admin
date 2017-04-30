@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$lng}} {{$title or '' }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                               
                                <th>File name</th>
                                <th>Action</th>
                            
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                   <th>File name</th>
                                <th>Action</th>
                                
                            </tr>
                        </tfoot>
                        <tbody>
                        @if(count($fname))
                            @foreach ($fname as $row)
                            <tr>
                            <td>{{$row->file_name}}</td>
                            
                                <td>
                                    <a href="{{ url('file/edit', ['fn' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop