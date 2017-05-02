@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$title}} <a href="{{route('contacts.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Retour </a></h2>
                     <ul class="nav navbar-right panel_toolbox">
                          <li><h2><a href="{{ route('contacts.show', ['id' => $contact->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a></h2></li>
                      </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                     <table  class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nom & Prénom</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nom & Prénom</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                       </tfoot>
                       <tbody>
                        <tr>
                         <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                         <td>{{$contact->email}}</td>
                         <td>{{$contact->message}}</td>
                         <td>{{$contact->created_at}}</td>
                        </tr>
                 </tbody>
             </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop