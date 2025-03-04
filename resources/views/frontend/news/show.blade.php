@extends('frontend.layouts.master')

@section('title', $post->title ?? 'Détail de l\'actualité')

@section('content')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-item">
                    <h2>{{ $post->title ?? 'Détail de l\'actualité' }}</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li><a href="{{ route('news.index') }}">Actualités</a></li>
                        <li>{{ $post->title ?? 'Détail de l\'actualité' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Blog Detail Start -->
<div class="blog-detail-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-detail-item">
                    <div class="blog-detail-photo">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                        @else
                            <img src="{{ asset('images/news/default.jpg') }}" alt="{{ $post->title }}">
                        @endif
                    </div>
                    <div class="blog-detail-text">
                        <div class="blog-detail-info">
                            <span><i class="far fa-calendar-alt"></i> {{ $post->created_at->format('d/m/Y') }}</span>
                            @if($post->author)
                                <span><i class="fas fa-user"></i> {{ $post->author }}</span>
                            @endif
                            @if($post->category)
                                <span><i class="fas fa-folder"></i> {{ $post->category->name }}</span>
                            @endif
                        </div>
                        <div class="blog-detail-content">
                            <h3>{{ $post->title }}</h3>
                            {!! $post->content !!}
                        </div>
                        
                        <!-- Images gallery if available -->
                        @if(isset($post->gallery) && count($post->gallery) > 0)
                            <div class="blog-gallery mt-5">
                                <h4>Galerie photos</h4>
                                <div class="row mt-3">
                                    @foreach($post->gallery as $image)
                                        <div class="col-md-4 col-sm-6 mb-4">
                                            <div class="gallery-photo">
                                                <a href="{{ asset('storage/' . $image->image) }}" class="magnific">
                                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title ?? $post->title }}">
                                                    <div class="gallery-overlay">
                                                        <div class="gallery-icon">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
                        <!-- Tags if available -->
                        @if(isset($post->tags) && count($post->tags) > 0)
                            <div class="blog-detail-tag">
                                <h4>Tags:</h4>
                                <ul>
                                    @foreach($post->tags as $tag)
                                        <li><a href="{{ route('news.index', ['tag' => $tag->id]) }}">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <!-- Share buttons -->
                        <div class="blog-detail-share">
                            <h4>Partager:</h4>
                            <ul>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post->title) }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        
                        <!-- Related posts -->
                        @if(isset($relatedPosts) && count($relatedPosts) > 0)
                            <div class="blog-detail-related mt-5">
                                <h4>Articles similaires</h4>
                                <div class="row mt-3">
                                    @foreach($relatedPosts as $relatedPost)
                                        <div class="col-md-6 col-sm-6 mb-4">
                                            <div class="blog-item blog-item-small">
                                                <div class="blog-photo">
                                                    @if($relatedPost->image)
                                                        <img src="{{ asset('storage/' . $relatedPost->image) }}" alt="{{ $relatedPost->title }}">
                                                    @else
                                                        <img src="{{ asset('images/news/default-thumb.jpg') }}" alt="{{ $relatedPost->title }}">
                                                    @endif
                                                </div>
                                                <div class="blog-text">
                                                    <h3><a href="{{ route('news.show', $relatedPost->slug) }}">{{ $relatedPost->title }}</a></h3>
                                                    <div class="blog-info">
                                                        <span><i class="far fa-calendar-alt"></i> {{ $relatedPost->created_at->format('d/m/Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <!-- Search -->
                    <div class="sidebar-item">
                        <div class="sidebar-title">
                            <h3>Rechercher</h3>
                        </div>
                        <div class="sidebar-body">
                            <form action="{{ route('news.index') }}" method="GET" class="sidebar-search">
                                <input type="text" name="search" placeholder="Rechercher..." value="{{ request('search') }}">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Categories -->
                    @if(isset($categories) && count($categories) > 0)
                        <div class="sidebar-item">
                            <div class="sidebar-title">
                                <h3>Catégories</h3>
                            </div>
                            <div class="sidebar-body">
                                <ul class="sidebar-list">
                                    @foreach($categories as $category)
                                        <li><a href="{{ route('news.index', ['category' => $category->id]) }}">{{ $category->name }} <span>({{ $category->posts_count ?? 0 }})</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Recent Posts -->
                    @if(isset($recentPosts) && count($recentPosts) > 0)
                        <div class="sidebar-item">
                            <div class="sidebar-title">
                                <h3>Articles récents</h3>
                            </div>
                            <div class="sidebar-body">
                                <ul class="sidebar-recent">
                                    @foreach($recentPosts as $recentPost)
                                        <li>
                                            <div class="recent-photo">
                                                @if($recentPost->image)
                                                    <img src="{{ asset('storage/' . $recentPost->image) }}" alt="{{ $recentPost->title }}">
                                                @else
                                                    <img src="{{ asset('images/news/default-thumb.jpg') }}" alt="{{ $recentPost->title }}">
                                                @endif
                                            </div>
                                            <div class="recent-text">
                                                <a href="{{ route('news.show', $recentPost->slug) }}">{{ $recentPost->title }}</a>
                                                <span>{{ $recentPost->created_at->format('d/m/Y') }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Tags -->
                    @if(isset($tags) && count($tags) > 0)
                        <div class="sidebar-item">
                            <div class="sidebar-title">
                                <h3>Tags</h3>
                            </div>
                            <div class="sidebar-body">
                                <ul class="sidebar-tag">
                                    @foreach($tags as $tag)
                                        <li><a href="{{ route('news.index', ['tag' => $tag->id]) }}">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Detail End -->

@endsection 