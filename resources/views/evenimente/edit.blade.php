@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Modificare informatii despre Eveniment</div>
        <div class="panel-body">
            <!—exista inregistrari in tabela Evenimente 
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Eroare:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!—populez campurile formularului cu datele aferente din tabela Evenimente -->
            {!! Form::model($eveniment, ['method' => 'PATCH','route' =>['evenimente.update', $eveniment->id]]) !!}
            <div class="form-group">
                <label for="titlu">Titlu</label>
                <input type="text" name="titlu" class="form-control" value="{{$eveniment->titlu }}">
            </div>
            <div class="form-group">
                <label for="descriere">Descriere</label>
                <textarea name="descriere" class="form-control" rows="3">{{ $eveniment->descriere }}</textarea>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <textarea name="data" class="form-control" rows="3">{{ $eveniment->data }}</textarea>
            </div>
            <div class="form-group">
                <label for="ora">Ora</label>
                <textarea name="ora" class="form-control" rows="3">{{ $eveniment->ora }}</textarea>
            </div>
            <div class="form-group">
                <label for="locatie">Locatie</label>
                <textarea name="locatie" class="form-control" rows="3">{{ $eveniment->locatie }}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Salvare Modificari" class="btn btn-info">
                <a href="{{route('evenimente.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
