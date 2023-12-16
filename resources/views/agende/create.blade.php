@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Vizualizeaza agenda</div>
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
            {{ Form::open(array('route' => 'agende.store', 'method' => 'POST')) }}
            <div class="form-group">
                <label for="titlu">Titlu</label>
                <input type="text" name="titlu" class="form-control" value="{{ old('titlu') }}">
            </div>
            <div class="form-group">
                <label for="descriere">Descriere</label>
                <input type="text" name="descriere" class="form-control" value="{{ old('descriere') }}">
            </div>
            <div class="form-group">
                <label for="ora_inceput">Ora_inceput</label>
                <textarea name="ora_inceput" class="form-control" rows="3">{{ old('ora_inceput') }}</textarea>
            </div>
            <div class="form-group">
                <label for="ora_final">Ora_final</label>
                <input type="text" name="ora_final" class="form-control" value="{{ old('ora_final') }}">
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
                <input type="submit" value="Adauga Agenda" class="btn btn-info">
                <a href="{{ route('agende.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
