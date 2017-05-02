@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Confirmation <a href="{{route('contacts.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> retour </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>Etes-vous sûr que vous voulez supprimer <strong>{{$contact->name}}</strong></p>
                    <form method="POST" action="{{ route('contacts.destroy', ['id' => $contact->id]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger">Oui, je suis sûr. Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop