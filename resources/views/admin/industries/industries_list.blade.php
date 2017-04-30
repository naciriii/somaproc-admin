@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> {{$title}} <a href="{{route('industries.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
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
                            @if(count($industries))
                            @foreach ($industries as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                              
                            
                            
                           
                                <td>
                                    <a href="{{ route('industries.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    @if(!$row->trashed())

                                    <a href="{{ route('industries.show', ['id' => $row->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                    @endif
                                    @if($row->trashed())
                                      <a href="{{ route('industries.delete_forever', ['id' => $row->id]) }}" class="btn-sm btn-danger" > 
                                      Delete-Forever</a>
                                        <a href="{{ route('industries.restore', ['id' => $row->id]) }}" class="btn-sm btn-success "> Restore </a>
                                        @endif
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