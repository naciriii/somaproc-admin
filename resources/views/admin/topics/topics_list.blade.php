@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$title or 'Actualités'}} <a href="{{route('topics.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Nouveau </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Photo1</th>
                                 <th>Photo2</th>
                                  <th>Photo3</th>
                                  <th>Langue</th>
                                   
                                
                                
                            
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>Titre</th>
                                <th>Description</th>
                                <th>Photo1</th>
                                 <th>Photo2</th>
                                  <th>Photo3</th>
                                  <th>Langue</th>
                            
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($topics))
                            @foreach ($topics as $row)
                            <tr>
                                <td>{{$row->title}}</td>
                                <td>{!!str_limit($row->description,20,'...')!!}</td>
                                <td><img src='{{asset($row->photo1)}}'  style="height: 60px;" class='img-responsive'></td>
                                 <td><img src='{{asset($row->photo2)}}'  style="height: 60px;" class='img-responsive'></td>
                                  <td><img src='{{asset($row->photo3)}}'  style="height: 60px;" class='img-responsive'></td>
                         
                                
                                <td>{{config('languages')[$row->language_id]}}</td>

                            
                           
                                <td>
                                    <a href="{{ route('topics.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('topics.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
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