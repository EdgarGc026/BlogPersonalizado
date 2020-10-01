@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card mb-4">
                @if($post->image)
                <img src="{{ $post->get_image }}" class="card-img-top">
                @endif
                @if($post->iframe)
                <div class="embed-responsive embed-responsive-16by9 mt-3">
                    {!! $post->iframe !!}
                </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">
                        {{ $post->get_excerpt }}
                        <a href="{{ route('post', $post) }}">Leer mas</a>
                    </p>
                    <p class="text-muted mb-0">
                        <em>
                            &ndash; {{ $post->user->name }}
                        </em>
                        {{ $post->created_at->format('d M Y') }}
                    </p>
                </div>
            </div>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection

{{-- 
    https://youtu.be/ArMga9b77Fs
https://youtu.be/-9FRON8yrqk
https://youtu.be/t2x6Yu9HtvM
https://youtu.be/UXUgflMZ1LY
https://youtu.be/nR6qyssqCOE
https://youtu.be/OzBTox9fpwQ
https://youtu.be/1CFrVkd2OVI
https://youtu.be/RV7IgNHn88Q
https://youtu.be/NbxSMx9_3PE
https://youtu.be/b8ldjkNMgUk
https://youtu.be/dhzzbx-Qh4o
https://youtu.be/k7ORQhXN9rQ
https://youtu.be/CxnMShXksWg
https://youtu.be/1_nHJPGJvIo
https://youtu.be/y2TAeAzeqo4 --}}