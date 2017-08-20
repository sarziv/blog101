@extends('layouts.master')
@section('content')
    <div class="col-sm-8 blog-main">
        <div class="row">

            <div class="container">

                <h1>Sign In</h1>
                <form method="post" action="/login">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input for="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" for="password" name="password" class="form-control" id="password"required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Log in</button>
                    </div>
                </form>
                @include('layouts.errors')
            </div>
        </div>
    </div>
@endsection