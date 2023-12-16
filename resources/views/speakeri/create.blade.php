@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Speaker nou</div>
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
            {{ Form::open(array('route' => 'speakeri.store', 'method' => 'POST')) }}
            <div class="form-group">
                <label for="nume">Nume</label>
                <input type="text" name="nume" class="form-control" value="{{ old('nume') }}">
            </div>
                <div class="form-group">
                    <label for="prenume">Prenume</label>
                    <input type="text" name="prenume" class="form-control" value="{{ old('prenume') }}">
                </div>
            <div class="form-group">
                <label for="prezentare">Prezentare</label>
                <textarea name="prezentare" class="form-control" rows="3">{{ old('prezentare') }}</textarea>
            </div>
                <div class="form-group">
                    <label for="telefon">Telefon</label>
                    <input type="text" name="telefon" class="form-control" value="{{ old('telefon') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                </div>
            <div class="form-group">
                <label for="eveniment_id">Eveniment</label>
                <select name="eveniment_id" class="form-control">
                    @foreach($evenimente as $eveniment)
                        <option value="{{ $eveniment->id }}">{{ $eveniment->titlu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Adauga Speaker" class="btn btn-info">
                <a href="{{ route('speakeri.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
