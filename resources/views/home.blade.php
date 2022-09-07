@extends('layouts.app')

@php
  use App\Classes\HideId;
@endphp

@section('content')
    @include('includes.modal')

    <h1 class="text-center">Members List</h1>

    <hr>

    <form action="{{route('search')}}" method="get" class="d-flex float-end">
        <input type="search" name="q" class="form-control me-2">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>

    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#window">Add Member</button>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Frequency</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{$member->name}}</td>

                        <td>{{$member->age}}</td>

                        <td><a href="{{route('plus', ['id'=>HideId::hide($member->id)])}}" class="btn btn-secondary">{{$member->frequency}}</a></td>

                        <td><a href="{{route('update.page', ['id'=>HideId::hide($member->id)])}}" class="btn btn-success">Update</a></td>

                        <td><a href="{{route('delete.member', ['id'=>HideId::hide($member->id)])}}" class="btn btn-danger">Delete</a></td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
              <ul>
                <li class="alert alert-danger">{{$error}}</li>
              </ul>
            @endforeach
        @endif

        @if($members->count()>=10)
        {{$members->links()}}
        @endif
    
@endsection