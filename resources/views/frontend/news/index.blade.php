@extends('frontend.layouts.master')

@section('title', 'Actualités')

@section('content')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-item">
                    <h2>Nos actualités</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li>Actualités</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- News Area Start -->
<div class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if(isset($news) && count($news) > 0)
                    @foreach($news as $post)
                        <div class="blog-item">
                            <div class="blog-photo">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                @else
                                    <img src="{{ asset('images/news/default.jpg') }}" alt="{{ $post->title }}">
                                @endif
                                <div class="blog-date">
                                    <span>{{ $post->created_at->format('d') }}</span>
                                    <span>{{ $post->created_at->formatLocalized('%B') }}</span>
                                </div>
                            </div>
                            <div class="blog-text">
                                <h3><a href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a></h3>
                                <div class="blog-info">
                                    @if($post->author)
                                        <span><i class="fas fa-user"></i> {{ $post->author }}</span>
                                    @endif
                                    @if($post->category)
                                        <span><i class="fas fa-folder"></i> {{ $post->category->name }}</span>
                                    @endif
                                </div>
                                <p>{{ Str::limit(strip_tags($post->content), 200) }}</p>
                                <div class="blog-rm">
                                    <a href="{{ route('news.show', $post->slug) }}">Lire la suite <i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    <!-- Pagination -->
                    @if(method_exists($news, 'links'))
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="pagination-area">
                                    {{ $news->links() }}
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="blog-item">
                        <div class="blog-photo">
                            <img src="{{ asset('images/news/default1.jpg') }}" alt="Actualité 1">
                            <div class="blog-date">
                                <span>15</span>
                                <span>Juin</span>
                            </div>
                        </div>
                        <div class="blog-text">
                            <h3><a href="#">Lancement d'un nouveau projet d'éducation</a></h3>
                            <div class="blog-info">
                                <span><i class="fas fa-user"></i> Admin</span>
                                <span><i class="fas fa-folder"></i> Éducation</span>
                            </div>
                            <p>Notre ONG est fière de lancer un nouveau projet d'éducation visant à améliorer l'accès à l'éducation pour les enfants défavorisés.</p>
                            <div class="blog-rm">
                                <a href="#">Lire la suite <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="blog-item">
                        <div class="blog-photo">
                            <img src="{{ asset('images/news/default2.jpg') }}" alt="Actualité 2">
                            <div class="blog-date">
                                <span>10</span>
                                <span>Juin</span>
                            </div>
                        </div>
                        <div class="blog-text">
                            <h3><a href="#">Campagne de sensibilisation environnementale</a></h3>
                            <div class="blog-info">
                                <span><i class="fas fa-user"></i> Admin</span>
                                <span><i class="fas fa-folder"></i> Environnement</span>
                            </div>
                            <p>Nous avons lancé une campagne de sensibilisation environnementale pour promouvoir la préservation de notre planète.</p>
                            <div class="blog-rm">
                                <a href="#">Lire la suite <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="blog-item">
                        <div class="blog-photo">
                            <img src="{{ asset('images/news/default3.jpg') }}" alt="Actualité 3">
                            <div class="blog-date">
                                <span>05</span>
                                <span>Juin</span>
                            </div>
                        </div>
                        <div class="blog-text">
                            <h3><a href="#">Partenariat avec une ONG internationale</a></h3>
                            <div class="blog-info">
                                <span><i class="fas fa-user"></i> Admin</span>
                                <span><i class="fas fa-folder"></i> Partenariat</span>
                            </div>
                            <p>Nous sommes ravis d'annoncer un nouveau partenariat avec une ONG internationale pour renforcer notre impact sur le terrain.</p>
                            <div class="blog-rm">
                                <a href="#">Lire la suite <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endif
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
<!-- News Area End -->

<!-- Gallery Area Start -->
@if(isset($gallery) && count($gallery) > 0)
<div class="gallery-area pb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="sec-title">
                        <h2>Notre galerie</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="gallery-item">
                    @foreach($gallery as $item)
                        <div class="gallery-photo">
                            @if($item->image)
                                <a href="{{ asset('storage/' . $item->image) }}" class="magnific">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                                    <div class="gallery-overlay">
                                        <div class="gallery-icon">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- Gallery Area End -->

@endsection 