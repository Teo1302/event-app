@extends('layouts.master')
@php
    use Illuminate\Support\Facades\Session;
@endphp
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">View Partener</div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('parteneri.index') }}">Înapoi</a>
            </div>
            <div class="form-group">
                <strong>Nume: </strong> {{ $partener->nume }}
            </div>
            <div class="form-group">
                <strong>Contact: </strong> {{ $partener->contact }}
            </div>
            <div class="form-group">
                <strong>Email: </strong> {{ $partener->email }}
            </div>
            <div class="form-group">
                <strong>Descriere: </strong> {{ $partener->descriere }}
            </div>
            <div class="form-group">
                <strong>Eveniment: </strong> {{ $partener->eveniment->titlu }}
            </div>
        </div>
    </div>
@endsection
