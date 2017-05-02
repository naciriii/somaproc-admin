@extends('templates.admin.layout')

@section('content')

<div class="">
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Confirmer suppression actualité <a href="{{route('topics.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Retour</a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>Vous êtes sur de supprimer l'actualité <strong>{{$topic->title}}</strong></p>

                    <form method="POST" action="{{ route('topics.destroy', ['id' => $topic->id]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger">Oui Je suis sur </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop