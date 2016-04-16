<div class="row crud-table">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-bordered" id="table-sortable">

            <thead>
            <tr>
                <th>#</th>
                <th>Дата</th>
                <th>Клиент</th>
                <th>Телефон</th>
                <th>Товар</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td scope="row">{{$order->id}}</td>
                    <td data-sort-method='date'>{{$order->created_at}}</td>
                    <td>{{$order->order_client_name}}</td>
                    <td>{{$order->order_client_phone}}</td>
                    <td data-sort-method='date'>
                        <a href="/good/{{$order->good->id}}">{{$order->good->good_name}}</a><br>
                        {{$order->good->advert->user_first_name}} {{$order->good->advert->user_last_name}}
                        ({{$order->good->advert->email}})
                    </td>
                    <td data-sort="{{$order->state->id}}">
                        {{$order->state->state_name}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{--{!! $orders->links() !!}--}}
        {!! $orders->appends(Request::all())->render() !!}
    </div>
</div>