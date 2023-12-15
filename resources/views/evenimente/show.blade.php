@extends('layouts.master')
@php
    use Illuminate\Support\Facades\Session;
@endphp
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">View Eveniment</div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('evenimente.index')}}">Inapoi</a>
            </div>
            <div class="form-group">
                <strong>Titlu: </strong> {{ $eveniment->titlu }}
            </div>
            <div class="form-group">
                <strong>Descriere: </strong> {{ $eveniment->descriere }}
            </div>
            <div class="form-group">
                <strong>Data: </strong> {{ $eveniment->data }}
            </div>
            <div class="form-group">
                <strong>Ora: </strong> {{ $eveniment->ora }}
            </div>
            <div class="form-group">
                <strong>Locatie: </strong> {{ $eveniment->locatie }}
            </div>
        </div>
    </div>
@endsection
