@extends('layouts.master')
@section('title', 'Cart')
@section('content')
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Tip_bilet</th>
            <th style="width:10%">Pret</th>
            <th style="width:8%">Cantitate</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        <?php $total = 0 ?>
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                    <?php $total += $details['pret'] * $details['quantity'] ?>
                <tr>
                    <td data-th="Tip_bilet">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['tip_bilet'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Pret">${{ $details['pret'] }}
                    </td>
                    <td data-th="Cantitate">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{$details['pret'] * $details['quantity'] }}</td>

                </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total {{ $total}}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fafa-angle-left"></i> Continuare Cumparaturi</a></td>
           <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total}}</strong></td>
        </tr>
        </tfoot>
    </table>
    <tr><a href="{{ url('/checkout') }}" class="btn btn-warning"><i class="fafa-angle-left"></i> Spre Plata</a></tr>
    @section('scripts')
        <script type="text/javascript">
            $(".update-cart").click(function (e) {
                e.preventDefault();
                var ele = $(this);
                $.ajax({
                    url: '{{ url('update-cart') }}',
                    method: "patch",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            });
            $(".remove-from-cart").click(function (e) {
                e.preventDefault();
                var ele = $(this);
                if(confirm("Esti sigur!!!")) {
                    $.ajax({
                        url: '{{ url('remove-from-cart') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
        </script>
    @endsection
    <script type="text/javascript">
        $(".update-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()},
                success: function (response) {
                    window.location.reload();
                }
            });
        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Esti sigur!!!")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
















