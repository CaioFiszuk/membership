@extends('layouts/app_layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 offset-sm-4">

                <h4 class="text-center">Update Member</h4>

                {{--form--}}
                <form action="{{route('update')}}" method="post">
                  @csrf

                  <input type="hidden" name="the_id" value="{{$members->id}}">

                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="text_name" class="form-control" value="{{$members->name}}">
                    </div>

                    <div class="form-group">
                      <input type="submit" value="Update" class="btn btn-success mt-2">
                      <a href="{{route('index')}}" class="btn btn-danger mt-2">Back</a>
                    </div>

                </form>
                {{--end of form--}}
            </div>
        </div>
    </div>

@endsection