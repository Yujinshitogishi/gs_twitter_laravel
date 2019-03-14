@extends('layouts.app')

@section('content')

    <form action = "{{url('/user')}}/{{Auth::user()->id}}" method="POST" class="form-horizontal">
         {{csrf_field()}}
    <div class="container">
        <div class="form-group">
        <label for="exampleFormControlTextarea1">abcd</label>
         <textarea class="form-control" id="choices" rows="3" name="choices"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tweet</button>
    </form>
    </div>
 @endsection