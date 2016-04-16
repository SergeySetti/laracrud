@extends('layouts.app')
@section('content')
    <div class="row">
        <form class="form">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="limit">ID</label>
                    <input type="text" name="good_id" disabled="disabled" value="{{$good->id}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="advert_id">Рекламодатель</label>
                    <select name="advert_id" id="advert_id" class="form-control">
                        @foreach($allAdverts as $advert)
                            <option value="{{$advert->id}}">
                                {{$advert->user_first_name}} {{$advert->user_first_name}} / {{$advert->email}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="good_name">Название</label>
                    <input type="text" name="good_name" id="good_name" value="{{$good->good_name}}"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="good_price">Цена</label>
                    <input type="text" name="good_price" id="good_price" value="{{$good->good_price}}"
                           class="form-control">
                </div>
                <button type="submit" class="btn btn-default pull-right">Сохранить</button>
            </div>
            
        </form>
    </div>
@endsection