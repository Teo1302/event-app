@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Modificare informatii despre Agenda</div>
        <div class="panel-body">
            <!-- Există înregistrări în tabela Agenda -->
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
            <!-- Populez câmpurile formularului cu datele aferente din tabela Agenda -->
            {!! Form::model($speaker, ['method' => 'PATCH', 'route' => ['agende.update', $agenda->id]]) !!}
            <div class="form-group">
                <label for="titlu">Titlu</label>
                <input type="text" name="titlu" class="form-control" value="{{ $agenda->titlu }}">
            </div>
            <div class="form-group">
                <label for="descriere">Descriere</label>
                <input type="text" name="descriere" class="form-control" value="{{ $agenda->descriere }}">
            </div>
            <div class="form-group">
                <label for="ora_inceput">Ora_inceput</label>
                <textarea name="ora_inceput" class="form-control" rows="3">{{ $agenda->ora_inceput }}</textarea>
            </div>
            <div class="form-group">
                <label for="ora_final">Ora_final</label>
                <input type="text" name="ora_final" class="form-control" value="{{ $agenda->ora_final }}">
            </div>

            <div class="form-group">
                <label for="eveniment_id">Eveniment</label>
                <select name="eveniment_id" class="form-control">
                    @foreach($evenimente as $eveniment)
                        <option value="{{ $eveniment->id }}" {{ $eveniment->id == $agenda->eveniment_id ? 'selected' : '' }}>
                            {{ $eveniment->titlu }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Salvare Modificări" class="btn btn-info">
                <a href="{{ route('agende.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
