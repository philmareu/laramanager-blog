@foreach($posts as $post)
    <div>
        <h2><a href="{{ url('blog/' . $post->published_at->format('Y/m/d') . '/' . $post->slug) }}">{{ $post->title }}</a></h2>
    </div>
@endforeach