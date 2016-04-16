<div class="row">
    <form class="form form-filter" action="{{action('OrderController@filter')}}" method="post">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label>От</label>
                <input type="text" name="date-from" class="form-control datepicker">
            </div>
            <div class="form-group">
                <label>До</label>
                <input type="text" name="date-to" class="form-control datepicker">
            </div>
            <div class="form-group">
                <label>Статус</label>
                <select name="state_id" class="form-control">
                    <option value=""></option>
                    @foreach(\App\State::all() as $state)
                        <option value="{{$state->id}}">{{$state->state_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label>Телефон</label>
                <input name="order_client_phone" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label>Товар</label>
                <input name="order_good_name" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label>ID заказа</label>
                <input name="id" type="text" class="form-control">
            </div>

            <button type="submit" class="btn btn-default">Показать</button>
        </div>
        {{ csrf_field() }}
    </form>
</div>