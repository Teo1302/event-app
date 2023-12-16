@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Modificare informatii despre Speaker</div>
        <div class="panel-body">
            <!-- Există înregistrări în tabela Speakeri -->
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
            <!-- Populez câmpurile formularului cu datele aferente din tabela Speakeri -->
            {!! Form::model($speaker, ['method' => 'PATCH', 'route' => ['speakeri.update', $speaker->id]]) !!}
            <div class="form-group">
                <label for="nume">Nume</label>
                <input type="text" name="nume" class="form-control" value="{{ $speaker->nume }}">
            </div>
            <div class="form-group">
                <label for="prenume">Prenume</label>
                <input type="text" name="prenume" class="form-control" value="{{ $speaker->prenume }}">
            </div>
            <div class="form-group">
                <label for="prezentare">Prezentare</label>
                <textarea name="prezentare" class="form-control" rows="3">{{ $speaker->prezentare }}</textarea>
            </div>
            <div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="text" name="telefon" class="form-control" value="{{ $speaker->telefon }}">
            </div>
            <div class="form-group">
                <label for="telefon">Email</label>
                <input type="text" name="email" class="form-control" value="{{ $speaker->email }}">
            </div>
            <div class="form-group">
                <label for="eveniment_id">Eveniment</label>
                <select name="eveniment_id" class="form-control">
                    @foreach($evenimente as $eveniment)
                        <option value="{{ $eveniment->id }}" {{ $eveniment->id == $speaker->eveniment_id ? 'selected' : '' }}>
                            {{ $eveniment->titlu }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Salvare Modificări" class="btn btn-info">
                <a href="{{ route('speakeri.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
