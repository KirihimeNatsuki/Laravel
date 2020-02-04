@extends('layouts.app')
<?php
use App\User;
use App\Skill;
?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <table>
            <thead>
              <tr>
                <td>Username</td>
                <td>Mail</td>
                <td>Skills</td>
                <td>Level</td>
              </tr>
            </thead>
          <tbody>
            @foreach ($users as $user) 
              <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
            @foreach ($user->skills as $skill) 
                <td>{{ $skill->name }}</td>
                <td>{{ $skill->pivot->level }}</td>
            @endforeach
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
    </div>
</div>
@endsection