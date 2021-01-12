@extends('layouts.app')
@section('content')
@if(session()->has('restaurant_created_message'))
    <div class="alert alert-success">
        {{ session()->get('restaurant_created_message') }}
    </div>
@endif
@if(session()->has('restaurant_updated_message'))
    <div class="alert alert-info">
        {{ session()->get('restaurant_updated_message') }}
    </div>
@endif
@if(session()->has('restaurant_deleted_message'))
    <div class="alert alert-danger">
        {{ session()->get('restaurant_deleted_message') }}
    </div>
@endif
<div class="card">
    <div class="card-body">
        <form class="form-inline" action="{{ route('restaurant.index') }}" method="GET">
            <select name="menu_id" id="" class="form-control">
                <option value="" selected disabled>Pasirinkite patiekalą restoranų filtravimui: </option>
                @foreach ($menus as $menu)
                <option value="{{ $menu->id }}" 
                    @if($menu->id == app('request')->input('menu_id')) 
                        selected="selected" 
                    @endif>{{ $menu->title }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="card-body">
        @if($errors->any())
        <h4 style="color: red">{{$errors->first()}}</h4>
        @endif
        <table class="table">
            <tr>
                <th>Pavadinimas</th>
                <th>Žmonių kiekis telpantis restorane</th>
                <th>Darbuotojų kiekis</th>
            </tr>
            @foreach ($restaurants as $restaurant)
            <tr>
                <td>{{ $restaurant->title }}</td>
                <td>{{ $restaurant->customers }}</td>
                <td>{{ $restaurant->employees }}</td>
                <td>
                    <form action={{ route('restaurant.destroy', $restaurant->id) }} method="POST">
                        <a class="btn btn-outline-success" href={{ route('restaurant.edit', $restaurant->id) }}>Redaguoti</a>
                        @csrf @method('delete')
                        <input type="submit" class="btn btn-outline-danger" value="Trinti"/>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('restaurant.create') }}" class="theme_btn btn btn-outline-success">Pridėti</a>
        </div>
    </div>
    <footer></footer>
</div>
@endsection
