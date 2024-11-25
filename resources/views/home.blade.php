@extends('layouts.main')

@section('title')
@if (isset($category ))
{{ ucfirst($category->name_fr )}} Posts
@else
Home
@endif
@endsection
@section('content')
<div class="row my-5">
    <div class="col-md-8">
        <div class="row">
            <div class="card p-4">
                <div class="card-body">
                    <div class="row">
                        @isset($premiumPost)
                        @foreach ($premiumPost as $post)
                        <div class="col-md-4 mb-2">
                            <div class="card h-100">
                                <img src="{{ $post->photo }}" class="card-img-top" alt="{{ $post->title_en }}">
                                <div class="card-body">
                                    <div class="card-title fw-bold">
                                        @if (null !== session()->get('lang') && session()->get('lang') === 'en')
                                        {{ $post->title_en }}
                                        @else
                                        {{ $post->title_fr }}
                                        @endif
                                    </div>
                                    <p class="card-text">
                                        @if (null !== session()->get('lang') && session()->get('lang') === 'en')
                                        {{ Str::limit($post->body_en, 100) }}
                                        @else
                                        {{ Str::limit($post->body_fr, 100) }}
                                        @endif

                                    </p>
                                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">
                                        @if (null !== session()->get('lang') && session()->get('lang') === 'en')

                                        Read More
                                        @else
                                        Lire plus
                                        @endif

                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card p-4">
                <div class="card-body">
                    <div class="row">
                        @isset($posts)
                        @foreach ($posts as $post)
                        <div class="col-md-4 mb-2">
                            <div class="card h-100">
                                <img src="{{ $post->photo }}" class="card-img-top" alt="{{ $post->title_en }}">
                                <div class="card-body">
                                    <div class="card-title fw-bold">
                                        @if (null !== session()->get('lang') && session()->get('lang') === 'en')
                                        {{ $post->title_en }}
                                        @else
                                        {{ $post->title_fr }}
                                        @endif
                                    </div>
                                    <p class="card-text">
                                        @if (null !== session()->get('lang') && session()->get('lang') === 'en')
                                        {{ Str::limit($post->body_en, 100) }}

                                        @else
                                        {{ Str::limit($post->body_fr, 100) }}

                                        @endif
                                    </p>
                                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">
                                        @if (null !== session()->get('lang') && session()->get('lang') === 'en')
                                        Read More
                                        @else
                                        lire plus
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endisset
                    </div>
                </div>
                <div class="card-footer">
                    <div class="flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.sidebare')
</div>
@endsection