@php
    use Illuminate\Support\Facades\Session;
@endphp
@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">Lista evenimente</div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/evenimente/create" class="btn btn-default">Adaugare Eveniment nou</a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">Id</th>
                    <th>Titlu</th>
                    <th>Descriere</th>
                    <th>Data</th>
                    <th>Ora</th>
                    <th>Locatie</th>
                </tr>

                @if (count($evenimente) > 0)
                    @foreach ($evenimente as $key => $eveniment)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $eveniment->titlu }}</td>
                            <td>{{ $eveniment->descriere }}</td>
                            <td>{{ $eveniment->data }}</td>
                            <td>{{ $eveniment->ora }}</td>
                            <td>{{ $eveniment->locatie }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('evenimente.show', $eveniment->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('evenimente.edit', $eveniment->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['evenimente.destroy', $eveniment->id], 'style' => 'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">Nu exista evenimente la care puteti participa!</td>
                    </tr>
                @endif
            </table>

            <!-- Introduce nr pagina -->
            {{ $evenimente->render() }}
        </div>
    </div>
@endsection
