@extends('layouts.master')
@php
    use Illuminate\Support\Facades\Session;
@endphp
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">View Sponsor</div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('sponsori.index')}}">Inapoi</a>
            </div>
            <div class="form-group">
                <strong>Nume: </strong> {{ $sponsor->nume }}
            </div>
            <div class="form-group">
                <strong>Descriere: </strong> {{ $sponsor->descriere }}
            </div>
            <div class="form-group">
                <strong>Contact: </strong> {{ $sponsor->contact }}
            </div>
            <div class="form-group">
                <strong>Adresa: </strong> {{ $sponsor->adresa }}
            </div>
            <div class="form-group">
                <strong>Eveniment_id: </strong> {{ $sponsor->eveniment_id }}
            </div>
        </div>
    </div>
@endsection
