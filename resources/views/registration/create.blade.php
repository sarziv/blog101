@extends('layouts.master')
    @section('content')
        <div class="col-sm-8 blog-main">
            <div class="row">

                <div class="container">

                    <h1>Registation</h1>
                    <form method="POST" action="/register">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password"  name="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Password confrimation</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                    @include('layouts.errors')
                </div>
            </div>
        </div>
    @endsection