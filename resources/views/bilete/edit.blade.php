@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Modificare informatii despre Bilete</div>
        <div class="panel-body">
            <!-- Există înregistrări în tabela Bilete -->
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
            <!-- Populez câmpurile formularului cu datele aferente din tabela Bilete -->
            {!! Form::model($bilet, ['method' => 'PATCH', 'route' => ['bilete.update', $bilet->id]]) !!}
            <div class="form-group">
                <label for="tip_bilet">Tip_bilet</label>
                <input type="text" name="tip_bilet" class="form-control" value="{{ $bilet->tip_bilet }}">
            </div>
            <div class="form-group">
                <label for="pret">Pret</label>
                <input type="text" name="pret" class="form-control" value="{{ $bilet->pret }}">
            </div>
            <div class="form-group">
                <label for="cantitate">Cantitate</label>
                <textarea name="cantitate" class="form-control" rows="3">{{ $bilet->cantitate }}</textarea>
            </div>
            <div class="form-group">
                <label for="eveniment_id">Eveniment</label>
                <select name="eveniment_id" class="form-control">
                    @foreach($evenimente as $eveniment)
                        <option value="{{ $eveniment->id }}" {{ $eveniment->id == $bilet->eveniment_id ? 'selected' : '' }}>
                            {{ $eveniment->titlu }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Salvare Modificări" class="btn btn-info">
                <a href="{{ route('bilete.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
