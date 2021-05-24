@extends('layouts.default')

@section('content')
   @include('partials.flash')

    <form method="post" class="w-100">
        @csrf
        <div class="form-group">
            <label for="text">Text</label>
            <input type="text" name="text" id="text" class="form-control" value="{{ old('text') }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
@stop
