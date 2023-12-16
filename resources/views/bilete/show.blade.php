@extends('layouts.master')
@php
    use Illuminate\Support\Facades\Session;
@endphp
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">View Bilet</div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('bilete.index') }}">Înapoi</a>
            </div>
            <div class="form-group">
                <strong>Tip_bilet: </strong> {{ $bilet->tip_bilet }}
            </div>
            <div class="form-group">
                <strong>Pret: </strong> {{ $bilet->pret }}
            </div>
            <div class="form-group">
                <strong>Cantitate: </strong> {{ $bilet->cantitate }}
            </div>
            <div class="form-group">
                <strong>Eveniment: </strong> {{ $bilet->eveniment->titlu }}
            </div>
        </div>
    </div>
@endsection
