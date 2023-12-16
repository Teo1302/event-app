@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Bilet  nou</div>
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
            {{ Form::open(array('route' => 'bilete.store', 'method' => 'POST')) }}
            <div class="form-group">
                <label for="tip_bilet">Tip_bilet</label>
                <input type="text" name="tip_bilet" class="form-control" value="{{ old('tip_bilet') }}">
            </div>
            <div class="form-group">
                <label for="pret">Pret</label>
                <input type="text" name="pret" class="form-control" value="{{ old('pret') }}">
            </div>
            <div class="form-group">
                <label for="cantitate">Cantitate</label>
                <textarea name="cantitate" class="form-control" rows="3">{{ old('cantitate') }}</textarea>
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
                <input type="submit" value="Adauga Bilet" class="btn btn-info">
                <a href="{{ route('bilete.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
