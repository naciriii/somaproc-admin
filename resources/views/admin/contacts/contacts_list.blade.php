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
                          <th>Nom & Prénom</th>
                          <th>Email</th>
                          <th>Date</th>
                          <th>Action</th>
                         </tr>
                        </thead>
                        <tfoot>
                         <tr>
                          <th>Nom & Prénom</th>
                          <th>Email</th>
                          <th>Date</th>
                          <th>Action</th>
                         </tr>
                       </tfoot>
                       <tbody>
                        @if(count($contacts))
                        @foreach($contacts as $contact)
                        <tr>
                         <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                         <td>{{$contact->email}}</td>
                         <td>{{$contact->created_at}}</td>
                         <td>
                             <a href="{{route('contacts.edit',['id'=>$contact->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="info"></i> 
                              <a href="{{ route('contacts.show', ['id' => $contact->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
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