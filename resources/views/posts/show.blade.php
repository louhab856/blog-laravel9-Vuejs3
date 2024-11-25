@extends('layouts.main')
@section('title')
{{ $post->title }}
@endsection
@section('content')
<div class="row my-5">
    <div class="col-md-8">
        <div class="row">
            <div class="card p-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="card h-100">
                                <img src="{{ $post->photo }}" class="card-img-top" alt="{{ $post->title_en }}">
                                < class="card-body">
                                    <div class="card-title fw-bold">

                                        @if (null !== session()->get('lang') && session()->get('lang') === 'en')
                                        {{ $post->title_en }}
                                        @else
                                        {{ $post->title_fr }}
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-center my-3">
                                        <span class="badge bg-success ">
                                            <i class="fas fa-user mr-1"></i>
                                            {{ $post->admin->name }}
                                        </span>
                                        <span class="badge bg-danger mx-2 ">
                                            <i class="fas fa-clock mr-1"></i>
                                            {{ $post->created_at->diffForHumans() }}
                                        </span>
                                        <span class="badge bg-primary ">
                                            <i class="fas fa-tag mr-1"></i>
                                            @if (null !== session()->get('lang') && session()->get('lang') === 'en')
                                            {{ $post->category->name_en }}
                                            @else
                                            {{ $post->category->name_fr }}
                                            @endif

                                        </span>
                                    </div>
                                    <p class="card-text">
                                        @if (null !== session()->get('lang') && session()->get('lang') === 'en')
                                        {{ $post->body_en }}
                                        @else
                                        {{ $post->body_fr }}
                                        @endif
                                    </p>
                                    <div class="row my-2">
                                        <div class="col-md-6">
                                            @isset($previous)
                                            <a href="{{route('posts.show', $previous)}}" class="btn btn-link">
                                                @if (null !== session()->get('lang') && session()->get('lang') === 'en')
                                                Previous <br>
                                                {{ $previous->title_en }}
                                                @else

                                                Précédent <br>
                                                {{ $previous->title_fr}}
                                                @endif
                                            </a>
                                            @endisset
                                        </div>
                                        <div class="col-md-6">
                                            @isset($next)
                                            <a href="{{route('posts.show', $next)}}" class="btn btn-link">
                                                @if (null !== session()->get('lang') && session()->get('lang') === 'en')
                                                Next <br>
                                                {{ $next->title_en }}
                                                @else
                                                Suivant <br>
                                                {{ $next->title_fr}}
                                                @endif
                                            </a>
                                            @endisset
                                        </div>
                                    </div>
                                    <comments-count></comments-count>
                                    <hr>
                                    @guest
                                    <div class="alert alert-info">
                                        <a href="{{route('login')}}" class="btn btn-link">
                                            Log in to add you comment
                                        </a>
                                    </div>
                                    @endguest
                                    @auth
                                    @if (auth()->user()->hasVerifiedEmail())
                                    <add-comments :post_id="{{ $post->id }}" :user_id="{{auth()->user()->id}}"></add-comments>
                                    @else
                                        @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                        @endif

                                        {{ __('Before proceeding, please check your email for a verification link.') }}
                                        {{ __('If you did not receive the email') }},
                                        <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                                        </form>
                                    @endif
                                    @endauth
                                    <hr>
                                    <div id="app">
                                    <comments-component :post_id="{{ $post->id }}"><comments-component />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.sidebare')
</div>
@endsection