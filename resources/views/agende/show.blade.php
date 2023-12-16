@extends('layouts.master')
@php
    use Illuminate\Support\Facades\Session;
@endphp
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">View Agenda</div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('agende.index') }}">Înapoi</a>
            </div>
            <div class="form-group">
                <strong>Titlu: </strong> {{ $agenda->titlu }}
            </div>
            <div class="form-group">
                <strong>Descriere: </strong> {{ $agenda->Descriere }}
            </div>
            <div class="form-group">
                <strong>Ora_inceput: </strong> {{ $agenda->ora_inceput }}
            </div>
            <div class="form-group">
                <strong>Ora_final: </strong> {{ $agenda->ora_final }}
            </div>
            <div class="form-group">
                <strong>Eveniment: </strong> {{ $agenda->eveniment->titlu }}
            </div>
        </div>
    </div>
@endsection
