<div class="col-md-4">
    <div class="card">
        <div class="card-header bg-white">
        <h3>Catgories</h3>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ url('/')}}" class="text-dark text-decoration-none">
                        @if (null !== session()->get('lang') && session()->get('lang') === 'en')
                        ALL catgories {{ \App\Models\Post::count() }}
                        @else
                       
                        Toutes les catgories  {{ \App\Models\Post::count() }}
                        @endif
                    </a>
                </li>
                @foreach ($catgories as $catgorie )
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('category.posts', $catgorie) }}" class="text-dark text-decoration-none">
                        @if (null !== session()->get('lang') && session()->get('lang') === 'en')
                        {{$catgorie->name_en}}
                        @else
                        {{$catgorie->name_fr}}
                        @endif
                    </a>
                    <span class="badge bg-primary rounded-pill">{{$catgorie->posts()->count()}}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>