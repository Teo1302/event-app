@extends('layouts.master')
@php
    use Illuminate\Support\Facades\Session;
@endphp
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">View Speaker</div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('speakeri.index') }}">Înapoi</a>
            </div>
            <div class="form-group">
                <strong>Nume: </strong> {{ $speaker->nume }}
            </div>
            <div class="form-group">
                <strong>Prenume: </strong> {{ $speaker->prenume }}
            </div>
            <div class="form-group">
                <strong>Prezentare: </strong> {{ $speaker->prezentare }}
            </div>
            <div class="form-group">
                <strong>Telefon: </strong> {{ $speaker->telefon }}
            </div>
            <div class="form-group">
                <strong>Email: </strong> {{ $speaker->email }}
            </div>
            <div class="form-group">
                <strong>Eveniment: </strong> {{ $speaker->eveniment->titlu }}
            </div>
        </div>
    </div>
@endsection
