@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Vos competences</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('skills_user.create') }}">Ajouter nouvelle competence</a>
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
            <th>Name</th>
            <th>Description</th>
            <th>Logo</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($skills_user as $skills)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $skills->name }}</td>
            <td>{{ $skills->description }}</td>
            <td>{{ $skills->logo }}</td>
            <td>
                  <a class="btn btn-primary" href="{{ route('skills_user.edit', $skills->id) }}">Edit</a>
   
                <form action="{{ route('skills_user.destroy',$skills->id) }}" method="POST">
    
                    
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection