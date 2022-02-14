@extends('layouts/app_layout')

@php
  use App\Classes\HideId;
@endphp

@section('content')
 <div class="container-fluid">

    <a href="{{route('index')}}" style="text-decoration: none"><h1 class="text-center text-dark">Membership</h1></a>

    <div class="clearfix">
        <a href="{{route('add')}}" class="btn btn-primary float-start">Add a new member</a>

        <form action="{{route('search')}}" method="get" class="d-flex float-end">
            <input type="search" name="q" class="form-control me-2">
            <button type="submit" class="btn btn-secondary">Search</button>
        </form>
    </div>
    <hr>

    @if ($members->count()==0)
        <p>Nothing to see here</p>
    @else
        <table class="table table-stripped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Visits</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $me)
                    <tr>
                        <td>{{$me->name}}</td>
                        <td>{{$me->age}}</td>

                        <td><a href="{{route('plus', ['id'=>HideId::hide($me->id)])}}" class="btn btn-secondary">{{$me->how_often}}</a></td>

                        <td><a href="{{route('update_page', ['id'=>HideId::hide($me->id)])}}" class="btn btn-success">Update</a></td>
                        
                        <td><a href="{{route('delete', ['id'=>HideId::hide($me->id)])}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
   
    <p>Total of members: <strong>{{$members->count()}}</strong></p>
 </div>   
@endsection