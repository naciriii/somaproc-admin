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
                <div class="col-md-12 col-sm-12 col-xs-12 message-content">
                <div class="message-header x_title">
                  <p class="date pull-right text-muted">
                  {{$contact->created_at->format('d M Y - H:i')}}
                  </p>
                  <p>
                    <strong>{{$contact->first_name}} {{$contact->last_name}}</strong><br><span class="text-muted">Email : {{$contact->email}}</span>
                  </p>
                  <div class="clearfix"></div>
                </div>
                <div class="message-text">
                  <p>
                   <strong>Message : </strong>{{$contact->message}}
                  </p>
                 
                 
                </div>
              </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@stop