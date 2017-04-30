@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$title or ''}} <a href="{{route('permissions.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                               
                                <th>Name</th>
                                <th>Tag</th>
                                <th> Category</th>
                                
                            
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                   <th>Name</th>
                                <th>Tag</th>
                                <th> Category</th>
                                
                            
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($permissions))
                            @foreach ($permissions as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->tag}}</td>
                                <td>
                                @if($row->category){{$row->category->name}} @else
                                {{$row->permission_categorie_id}}
                                @endif</td>
                            
                            
                           
                                <td>
                                    <a href="{{ route('permissions.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('permissions.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
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