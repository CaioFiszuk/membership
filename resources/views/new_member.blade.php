@extends('layouts/app_layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 offset-sm-4">

                <h4 class="text-center">New Member</h4>

                <form action="{{route('submit')}}" method="post">
                  @csrf
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="text_name" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Birth Date</label>
                      <input type="date" name="birthdate" class="form-control">
                    </div>

                    <div class="form-group">
                      <input type="submit" value="Add" class="btn btn-success mt-2">
                      <a href="{{route('index')}}" class="btn btn-danger mt-2">Back</a>
                    </div>
                </form>


                @if ($errors->any())
                    <ul>
                      @foreach ($errors->all() as $e)
                          <li class="alert alert-danger mt-2">{{$e}}</li>
                      @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

@endsection