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
        <div class="panel-heading">Lista Parteneri</div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    @if(auth()->check() && auth()->user()->can('is-admin'))
                    <a href="/parteneri/create" class="btn btn-default">Adaugare Partener nou</a>
                        @endif
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">Id</th>
                    <th>Nume</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Descriere</th>
                    <th>Eveniment</th>
                </tr>
                @php $i = 0 @endphp
                @if (count($parteneri) > 0)
                    @foreach ($parteneri as $key => $partener)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $partener->nume }}</td>
                            <td>{{ $partener->contact }}</td>
                            <td>{{ $partener->email }}</td>
                            <td>{{ $partener->descriere }}</td>
                            <td>{{ $partener->eveniment->titlu }}</td>
                            <td>
                                @if(auth()->check() && auth()->user()->can('is-admin'))
                                <a class="btn btn-success" href="{{ route('parteneri.show', $partener->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('parteneri.edit', $partener->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['parteneri.destroy', $partener->id], 'style' => 'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu există parteneri disponibili!</td>
                    </tr>
                @endif
            </table>

            <!-- Introduce nr pagina -->
        </div>
    </div>
@endsection
