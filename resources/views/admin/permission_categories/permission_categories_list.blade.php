@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$title or ''}} <a href="{{route('permission_categories.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                               
                                <th>Name</th>
                               
                                
                            
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                   <th>Name</th>
                          
                                
                            
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($permission_categories))
                            @foreach ($permission_categories as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                     
                            
                            
                           
                                <td>
                                    <a href="{{ route('permission_categories.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('permission_categories.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                           <a href="{{ route('permissions.show_by_cat', ['id' => $row->id]) }}"> <button class="btn-sm btn-info"> Permissions</button>
                                    </a>
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