<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>

@include('layouts.nav')
@if ($flash = session('message'))
    <div class="alert alert-success" id="flash-message" role="alert">
        {{ $flash }}
    </div>
@endif

<div class="blog-header">
    <div class="container">
        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">An example blog template built with Bootstrap.</p>
    </div>
</div>
<div class="container">
    <div class="row">

        @yield('content')
        @include('layouts.nav-right')
    </div>
</div>


@include('layouts.footer')

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
@include('layouts.scripts')
</body>
</html>
