@extends('layouts.master')
@php
    use Illuminate\Support\Facades\Session;
@endphp
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            View Task
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('tasks.index')
}}">Inapoi</a>
            </div>
            <div class="form-group">
                <strong>Nume: </strong> {{ $task->name }}
            </div>
            15
            <div class="form-group">
                <strong>Descriere: </strong> {{ $task->description }}
            </div>
        </div>
    </div>
@endsection
