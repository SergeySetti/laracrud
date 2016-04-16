<div class="row crud-table">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-bordered" id="table-sortable">

            <thead>
            <tr>
                <th></th>
                <th>#</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Рекламодатель</th>
            </tr>
            </thead>
            <tbody>
            @foreach($goods as $good)
                <tr>
                    <td scope="row">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">
                            </label>
                        </div>
                    </td>
                    <td>{{$good->id}}</td>
                    <td><a href="{{action('GoodController@edit', $good->id)}}">{{$good->good_name}}</a></td>
                    <td>{{$good->good_price}}</td>
                    <td data-sort-method='date'>
                        <a href="#">{{$good->advert->user_first_name}} {{$good->advert->user_last_name}}</a><br>
                        ({{$good->advert->email}})
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $goods->links() !!}
    </div>
</div>