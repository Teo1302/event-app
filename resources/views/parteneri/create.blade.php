@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Partener nou</div>
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
            {{ Form::open(array('route' => 'parteneri.store', 'method' => 'POST')) }}
            <div class="form-group">
                <label for="nume">Nume</label>
                <input type="text" name="nume" class="form-control" value="{{ old('nume') }}">
            </div>
            <div class="form-group">
                <label for="descriere">Descriere</label>
                <textarea name="descriere" class="form-control" rows="3">{{ old('descriere') }}</textarea>
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
                <input type="submit" value="Adauga Partener" class="btn btn-info">
                <a href="{{ route('parteneri.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
