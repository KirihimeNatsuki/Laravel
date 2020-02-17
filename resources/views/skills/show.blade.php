@extends('layouts.app')

@section('content')

<div class="jumbotron text-center">
 <div align="left">
  <a href="{{ route('skills.index') }}" class="btn btn-secondary">Retour</a>
 </div>
 <br />
 <img src="{{ URL::to('/') }}/images/{{ $skill->logo }}" class="img-thumbnail" width="200" height="200" />
 <h3>Nom - {{ $skill->name }} </h3>
 <h3>Description - {{ $skill->description }}</h3>
</div>
@endsection