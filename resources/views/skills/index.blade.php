@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Vos competences</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('skills.create') }}">Ajouter nouvelle competence</a>
            </div>
        </div>
    </div>
   
    @if (Session::has('success'))
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Logo</th>
            <th width="280px">Actions</th>
        </tr>
        @foreach ($skills as $skills)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="{{asset('images/' . $skills->logo)}}" class="img-thumbnail" width="75" /></td>
            <td>{{ $skills->name }}</td>
            <td>{{ $skills->description }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('skills.show',$skills->id) }}">Voir profil competence</a>
                <a class="btn btn-primary" href="{{ route('skills.edit',$skills->id) }}">Editer</a>
                
                <form action="{{ route('skills.destroy',$skills->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection