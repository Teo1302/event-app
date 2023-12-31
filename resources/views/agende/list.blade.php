@php
    use Illuminate\Support\Facades\Session;
@endphp

@extends('layouts.master')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            //{{ $message }} este o sintaxă Blade pentru a afișa variabile PHP în cadrul unui view
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">Lista Agende</div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    @if(auth()->check() && auth()->user()->can('is-admin'))
                    <a href="/agende/create" class="btn btn-default">Adaugare Agenda noua</a>
                    @endif
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">Id</th>
                    <th>Titlu</th>
                    <th>Descriere</th>
                    <th>Ora_inceput</th>
                    <th>Ora_final</th>
                    <th>Eveniment</th>
                </tr>
                @php $i = 0 @endphp
                @if (count($agenda) > 0)
                    @foreach ($agenda as $key => $agenda)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $agenda->ttilu }}</td>
                            <td>{{ $agenda->descriere}}</td>
                            <td>{{ $agenda->ora_inceput }}</td>
                            <td>{{ $agenda->ora_final }}</td>
                            <td>{{ $agenda->eveniment->titlu }}</td>
                            <td>
                                @if(auth()->check() && auth()->user()->can('is-admin'))
                                <a class="btn btn-success" href="{{ route('agende.show', $agenda->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('agende.edit', $agenda->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['agende.destroy', $agenda->id], 'style' => 'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu există agende de vizualizat!</td>
                    </tr>
                @endif
            </table>

            <!-- Introduce nr pagina -->
        </div>
    </div>
@endsection
