@extends('layouts.app')

@section('content')

  <h1 class="text-center">Update member</h1>
  <hr>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="{{route('update.member')}}" method="post">
                    @csrf

                    <input type="hidden" name="the_id" value="{{$member->id}}">

                    <input type="text" class="form-control" name="name" value="{{$member->name}}">

                    <input type="date" name="birthdate" class="form-control">

                    <input type="submit" value="Update member" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
@endsection