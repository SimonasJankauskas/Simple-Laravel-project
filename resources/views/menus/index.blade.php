@extends('layouts.app')
@section('content')
@if($errors->any())
<h4 style="color: red">{{$errors->first()}}</h4>
@endif
@if(session()->has('menu_created_message'))
    <div class="alert alert-success">
        {{ session()->get('menu_created_message') }}
    </div>
@endif
@if(session()->has('menu_updated_message'))
    <div class="alert alert-info">
        {{ session()->get('menu_updated_message') }}
    </div>
@endif
@if(session()->has('menu_deleted_message'))
    <div class="alert alert-danger">
        {{ session()->get('menu_deleted_message') }}
    </div>
@endif
<div class="card">
    <div class="card-body">
        <table class="table">
            <tr>
                <th>Pavadinimas</th>
                <th>Kaina / eur</th>
                <th>Porcijos svoris / g</th>
                <th>Mėsos kiekis porcijoje / g</th>
                <th>Aprašymas</th>
            </tr>
            @foreach ($menus as $menu)
            <tr>
                <td>{{ $menu->title }}</td>
                <td>{{ $menu->price }}</td>
                <td>{{ $menu->weight }}</td>
                <td>{{ $menu->meat }}</td>
                <td>{!! $menu->about !!}</td>
                <td>
                    <form action={{ route('menu.destroy', $menu->id) }} method="POST">
                        <a class="btn btn-outline-success" href={{ route('menu.edit', $menu->id) }}>{{__('menu.edit')}}</a>
                        @csrf @method('delete')
                        <input type="submit" class="btn btn-outline-danger" value="{{__('menu.delete')}}"/>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('menu.create') }}" class="theme_btn btn btn-outline-success">{{__('menu.create')}}</a>
        </div>
    </div>
    <footer></footer>
</div>
@endsection
