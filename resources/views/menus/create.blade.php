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
               <div class="card-header">Patiekalo sukūrimas</div>
               <div class="card-body">
                   <form action="{{ route('menu.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                           <label>Pavadinimas: </label>
                           <input type="text" name="title" class="form-control">
                       </div>
                       <div class="form-group">
                           <label>Kaina / eur: </label>
                           <input type="number" name="price" class="form-control"> 
                       </div>
                       <div class="form-group">
                           <label>Poricjos svoris / g: </label>
                           <input type="number" name="weight" class="form-control"> 
                       </div>
                       <div class="form-group">
                           <label>Mėsos kiekis porcijoje / g: </label>
                           <input type="number" name="meat" class="form-control"> 
                       </div>
                       <div class="form-group">
                           <label>Aprašymas: </label>
                           <textarea id="mce" name="about" rows=10 cols=100 class="form-control"></textarea>
                       </div>
                       <button type="submit" class="theme_btn btn btn-outline-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
