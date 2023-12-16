@php
    use Illuminate\Support\Facades\Session;
    use Illuminate\Database\Eloquent\Collection;
@endphp
@extends('layouts.master')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">Lista sponsori</div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/sponsori/create" class="btn btn-default">Adaugare Sponsor nou</a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">Id</th>
                    <th>Nume</th>
                    <th>Descriere</th>
                    <th>Contact</th>
                    <th>Adresa</th>
                    <th>Eveniment</th>
                </tr>
                @php $i = 0 @endphp
                @if (count($sponsori) > 0)
                    @foreach ($sponsori as $key => $sponsor)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $sponsor->nume }}</td>
                            <td>{{ $sponsor->descriere }}</td>
                            <td>{{ $sponsor->contact}}</td>
                            <td>{{ $sponsor->adresa }}</td>
                            <td>{{ $sponsor->eveniment->titlu }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('sponsori.show', $sponsor->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('sponsori.edit', $sponsor->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['sponsori.destroy', $sponsor->id], 'style' => 'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">Nu exista sponsori ai acestui eveniment!</td>
                    </tr>
                @endif
            </table>

            <!-- Introduce nr pagina -->

        </div>
    </div>
@endsection
