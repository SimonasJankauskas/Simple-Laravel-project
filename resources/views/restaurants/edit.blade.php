@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Restorano informacijos keitimas</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('restaurant.update', $restaurant->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label>Pavadinimas: </label>
                            <input type="text" name="title" class="form-control" value="{{ $restaurant->title }}">
                        </div>
                        <div class="form-group">
                            <label>Žmonių kiekis telpantis restorane: </label>
                            <input type="number" name="customers" class="form-control" value="{{ $restaurant->customers }}"> 
                        </div>
                        <div class="form-group">
                            <label>Darbuotojų kiekis: </label>
                            <input type="number" name="employees" class="form-control" value="{{ $restaurant->employees }}"> 
                        </div>
                        <div class="form-group">
                            <label>Patiekalo priskyrimas: </label>
                            <select name="menu_id" id="" class="form-control">
                                 <option value="" selected disabled>Pasirinkite patiekalą: </option>
                                 @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}" @if($menu->id == $restaurant->menu_id) selected="selected" @endif>{{ $menu->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="theme_btn btn btn-outline-primary">Pakeisti</button>
                    </form>
                </div>
                <footer></footer>
            </div>
        </div>
    </div>
</div>
@endsection
v