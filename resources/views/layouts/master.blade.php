@include('partials.header')
<div class="content col-md-6">
@yield('content')
    @if(Session::has('message'))
        <div class="alert alert-info">
            {{ Session::get('message') }}
        </div>
    @endif
</div>
@include('partials.footer')