@include('partials.header')

<div class="container">
@yield('content')
    @if(Session::has('message'))
        <div class="alert alert-info">
            {{ Session::get('message') }}
        </div>
    @endif
@include('partials.footer')
</div>
