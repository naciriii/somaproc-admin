@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$title}} <a href="{{route('admins.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Nouveau</a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                               
                                     <th>Email</th>
                                <th>Nom</th>
                                <th>Super</th>
                                
                            
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                   <th>Email</th>
                                <th>Nom</th>
                                <th>Super</th>
                                
                            
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($admins))
                            @foreach ($admins as $row)
                            <tr>
                            <td>{{$row->email}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{($row->super==1)?'Oui':'Non'}}</td>

                                
                            
                            
                           
                                <td>
                                    <a href="{{ route('admins.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('admins.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                    
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