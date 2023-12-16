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
        <div class="panel-heading">Lista Bilete</div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/bilete/create" class="btn btn-default">Adaugare Bilet nou</a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">Id</th>
                    <th>Tip_bilet</th>
                    <th>Pret</th>
                    <th>Cantitate</th>
                    <th>Eveniment</th>
                </tr>
                @php $i = 0 @endphp
                @if (count($bilete) > 0)
                    @foreach ($bilete as $key => $bilet)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $bilet->tip_bilet }}</td>
                            <td>{{ $speaker->pret }}</td>
                            <td>{{ $speaker->cantitate }}</td>
                            <td>{{ $speaker->eveniment->titlu }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('bilete.show', $bilet->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('bilete.edit', $bilet->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['bilete.destroy', $bilet->id], 'style' => 'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu există bilete disponibile!</td>
                    </tr>
                @endif
            </table>

            <!-- Introduce nr pagina -->
        </div>
    </div>
@endsection
