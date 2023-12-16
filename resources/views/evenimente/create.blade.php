@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Eveniment nou</div>
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ Form::open(array('route' => 'evenimente.store','method'=>'POST')) }}
            <div class="form-group">
                <label for="titlu">Titlu</label>
                <input type="text" name="titlu" class="form-control"
                       value="{{old('titlu') }}">
            </div>
            <div class="form-group">
                <label for="descriere">Descriere</label>
                <textarea name="descriere" class="form-control"
                          rows="3">{{old('descriere') }}</textarea>
            </div>
                <div class="form-group">
                    <label for="data">Data</label>
                    <textarea name="data" class="form-control"
                              rows="3">{{old('data') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="ora">Ora</label>
                    <textarea name="ora" class="form-control"
                              rows="3">{{old('ora') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="locatie">Locatie</label>
                    <textarea name="locatie" class="form-control"
                              rows="3">{{old('locatie') }}</textarea>
                </div>
            <div class="form-group">
                <input type="submit" value="Adauga Eveniment" class="btn btn-info">
                <a href="{{ route('evenimente.index') }}" class="btn btndefault">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
