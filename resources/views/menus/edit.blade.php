@extends('layouts.app')
@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ 'Patiekalo svoris negali būti mažesnis už mėsos svorį!' }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Patiekalo informacijos keitimas</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('menu.update', $menu->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Pavadinimas: </label>
                            <input type="text" name="title" class="form-control" value="{{ $menu->title }}">
                        </div>
                        <div class="form-group">
                            <label for="">Kaina / eur: </label>
                            <input type="number" name="price" class="form-control" value="{{ $menu->price }}">
                        </div>
                        <div class="form-group">
                            <label for="">Porcijos svoris / g: </label>
                            <input type="number" name="weight" class="form-control" value="{{ $menu->weight }}">
                        </div>
                        <div class="form-group">
                            <label for="">Mėsos kiekis porcijoje / g: </label>
                            <input type="number" name="meat" class="form-control" value="{{ $menu->meat }}">
                        </div>
                        <div class="form-group">
                            <label for="">Aprašymas: </label>
                            <textarea id="mce" type="text" name="about" rows=10 cols=100 class="form-control">{{ $menu->about }}</textarea>
                        </div>
                        <button type="submit" class="theme_btn btn btn-outline-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
