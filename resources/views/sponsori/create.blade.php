@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Sponsor nou</div>
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
            {{ Form::open(array('route' => 'sponsori.store','method'=>'POST')) }}
            <div class="form-group">
                <label for="nume">Nume</label>
                <input type="text" name="nume" class="form-control" value="{{old('nume') }}">
            </div>
            <div class="form-group">
                <label for="descriere">Descriere</label>
                <textarea name="descriere" class="form-control" rows="3">{{old('descriere') }}</textarea>
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <textarea name="contact" class="form-control" rows="3">{{old('contact') }}</textarea>
            </div>
            <div class="form-group">
                <label for="adresa">Adresa</label>
                <textarea name="adresa" class="form-control" rows="3">{{old('adresa') }}</textarea>
            </div>
                <div class="form-group">
                    <label for="eveniment_id">Eveniment_id</label>
                    <textarea name="eveniment_id" class="form-control" rows="3">{{old('eveniment_id') }}</textarea>
                </div>

            <div class="form-group">
                <input type="submit" value="Adauga Sponsor" class="btn btn-info">
                <a href="{{ route('sponsori.index') }}" class="btn btndefault">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
