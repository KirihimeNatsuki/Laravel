@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ajouter nouvelle competence</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('skills_user.index') }}"> Retour</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ah !</strong> Il y a un probleme dans votre entree.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('skills_user.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <select name="name">
                  @foreach ($skills as $skill) 
                    <option value="{{ $skill->id }}" name="">{{ $skill->name }}</option> 
                  @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Niveau:</strong>
                <select name="level">
                  <option value="1" name="1" selected>1</option> 
                  <option value="2" name="2">2</option>
                  <option value="3" name="3">3</option>
                  <option value="4" name="4">4</option> 
                  <option value="5" name="5">5</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </div>
   
</form>
@endsection