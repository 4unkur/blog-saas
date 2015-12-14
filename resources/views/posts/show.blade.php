@extends('layouts.master')

@section('content')
    <h1>
        {{ $post->title }}
        @if ($post->draft) <span class="badge badge-lg">Draft</span>@endif
    </h1>
    <p>Published on:
        {{ $post->created_at->format('F d, Y \a\t H:i:s') }}
    </p>
    <p>
        {!! $post->body !!}
    </p>
    @if (Auth::check())
    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
    <div class="form-group">
        <a href="{{ URL::route('posts.edit', $post->slug) }}" class="btn btn-warning">Edit Post</a>
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this post?')">Delete post</button>
    </div>
    {!! Form::close() !!}
    @endif
    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES * * */
        var disqus_shortname = 'PUTYOURUSERNAMEHERE';

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
@stop
