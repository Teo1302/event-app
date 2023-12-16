@php
    use Illuminate\Support\Facades\Session;
@endphp

@extends('layouts.master')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">Lista Speakeri</div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    @if(auth()->check() && auth()->user()->can('is-admin'))
                    <a href="/speakeri/create" class="btn btn-default">Adaugare Speaker nou</a>
                    @endif
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">Id</th>
                    <th>Nume</th>
                    <th>Prenume</th>
                    <th>Prezentare</th>
                    <th>Telefon</th>
                    <th>Email</th>
                    <th>Eveniment</th>
                </tr>
                @php $i = 0 @endphp
                @if (count($speakeri) > 0)
                    @foreach ($speakeri as $key => $speaker)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $speaker->nume }}</td>
                            <td>{{ $speaker->prenume }}</td>
                            <td>{{ $speaker->prezentare }}</td>
                            <td>{{ $speaker->telefon }}</td>
                            <td>{{ $speaker->email }}</td>
                            <td>{{ $speaker->eveniment->titlu }}</td>
                            <td>
                                @if(auth()->check() && auth()->user()->can('is-admin'))
                                <a class="btn btn-success" href="{{ route('speakeri.show', $speaker->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('speakeri.edit', $speaker->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['speakeri.destroy', $speaker->id], 'style' => 'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu există speakeri disponibili!</td>
                    </tr>
                @endif
            </table>

            <!-- Introduce nr pagina -->
        </div>
    </div>
@endsection
