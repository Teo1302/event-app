@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Modificare informatii despre Partener</div>
        <div class="panel-body">
            <!-- Există înregistrări în tabela Parteneri -->
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
            <!-- Populez câmpurile formularului cu datele aferente din tabela Parteneri -->
            {!! Form::model($partener, ['method' => 'PATCH', 'route' => ['parteneri.update', $partener->id]]) !!}
            <div class="form-group">
                <label for="nume">Nume</label>
                <input type="text" name="nume" class="form-control" value="{{ $partener->nume }}">
            </div>
            <div class="form-group">
                <label for="descriere">Descriere</label>
                <textarea name="descriere" class="form-control" rows="3">{{ $partener->descriere }}</textarea>
            </div>
            <div class="form-group">
                <label for="eveniment_id">Eveniment</label>
                <select name="eveniment_id" class="form-control">
                    @foreach($evenimente as $eveniment)
                        <option value="{{ $eveniment->id }}" {{ $eveniment->id == $partener->eveniment_id ? 'selected' : '' }}>
                            {{ $eveniment->titlu }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Salvare Modificări" class="btn btn-info">
                <a href="{{ route('parteneri.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
