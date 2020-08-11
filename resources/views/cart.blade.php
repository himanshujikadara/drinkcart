@extends('layout')
 
@section('title', 'Cart')
 
@section('content')
 
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Caffeine</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
 
        <?php $total = 0 ?>
 
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
 
                <?php $total += $details['caffine'] * $details['quantity'] ?>
 
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Caffeine">{{ $details['caffine'] }} mg</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ $details['caffine'] * $details['quantity'] }} mg</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                        <!--button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button-->
                    </td>
                </tr>
            @endforeach
        @endif
 
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td colspan="5" class="text-center">You have consumed total <strong>{{ $total }} mg</strong> Caffeine.</td>
        </tr>
        @if( $total < 500 )
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)

                    <?php $total = $details['caffine'] * $details['quantity'];
                          $unconsumed = 500 - $total;
                          $can_consume = floor($unconsumed/$details['caffine']);
                    ?>

            @endforeach
            @endif
            @if( $can_consume > 0 )
                <tr class="visible-xs">
                    <td colspan="5" class="text-center btn-info">You can consume more <strong>{{ $unconsumed }} mg</strong> Caffeine. You can have {{ $can_consume }} more of your favorite drinks.</td>
                </tr>
            @else
                <tr class="visible-xs">
                    <td colspan="5" class="text-center btn-danger">You can consume more <strong>{{ $unconsumed }} mg</strong> Caffeine. You can't have more of your favorite drinks.</td>
                </tr>
            @endif
        @elseif( $total >= 500 )
        <tr class="visible-xs">
            <td colspan="5" class="text-center btn-danger">You have already consumed more <strong>{{ $total - 500 }} mg</strong> Caffeine than safe limit.</td>
        </tr>
        @endif
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Drinking</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td colspan="2" class="hidden-xs text-center">You have consumed total <strong>{{ $total }} mg</strong> Caffeine.</td>
        </tr>
        </tfoot>
    </table>
 
@endsection

@section('scripts')
 
 
    <script type="text/javascript">
 
        $(".update-cart").click(function (e) {
           e.preventDefault();
 
           var ele = $(this);
 
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
 
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
            if(confirm("Are you sure you want to delete?")) {
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