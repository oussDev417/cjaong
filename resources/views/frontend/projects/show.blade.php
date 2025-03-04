@extends('frontend.layouts.master')

@section('title', $project->title ?? 'Détail du projet')

@section('content')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-item">
                    <h2>{{ $project->title ?? 'Détail du projet' }}</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li><a href="{{ route('projects.index') }}">Nos projets</a></li>
                        <li>{{ $project->title ?? 'Détail du projet' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Project Detail Start -->
<div class="blog-detail-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-detail-item">
                    <div class="blog-detail-photo">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                        @else
                            <img src="{{ asset('images/projects/default.jpg') }}" alt="{{ $project->title }}">
                        @endif
                    </div>
                    <div class="blog-detail-text">
                        <div class="blog-detail-info">
                            @if($project->start_date)
                                <span><i class="far fa-calendar-alt"></i> Début: {{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</span>
                            @endif
                            @if($project->end_date)
                                <span><i class="far fa-calendar-check"></i> Fin: {{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}</span>
                            @endif
                            @if($project->location)
                                <span><i class="fas fa-map-marker-alt"></i> {{ $project->location }}</span>
                            @endif
                            @if($project->status)
                                <span><i class="fas fa-info-circle"></i> {{ $project->status }}</span>
                            @endif
                        </div>
                        <div class="blog-detail-content">
                            <h3>{{ $project->title }}</h3>
                            {!! $project->content !!}
                        </div>
                        
                        @if($project->goals)
                            <div class="project-goals mt-4">
                                <h4>Objectifs du projet</h4>
                                {!! $project->goals !!}
                            </div>
                        @endif
                        
                        @if($project->results)
                            <div class="project-results mt-4">
                                <h4>Résultats</h4>
                                {!! $project->results !!}
                            </div>
                        @endif
                        
                        @if($project->partners)
                            <div class="project-partners mt-4">
                                <h4>Partenaires</h4>
                                {!! $project->partners !!}
                            </div>
                        @endif
                        
                        <!-- Gallery if available -->
                        @if(isset($projectImages) && count($projectImages) > 0)
                            <div class="project-gallery mt-5">
                                <h4>Galerie du projet</h4>
                                <div class="row mt-3">
                                    @foreach($projectImages as $image)
                                        <div class="col-md-4 col-sm-6 mb-4">
                                            <div class="gallery-photo">
                                                <a href="{{ asset('storage/' . $image->image) }}" class="magnific">
                                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title ?? $project->title }}">
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
                        
                        <!-- Share buttons -->
                        <div class="blog-detail-share">
                            <h4>Partager ce projet:</h4>
                            <ul>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($project->title) }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($project->title) }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://wa.me/?text={{ urlencode($project->title . ' ' . request()->url()) }}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        
                        <!-- Call to action -->
                        <div class="project-cta mt-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4>Soutenez ce projet</h4>
                                    <p>Vous souhaitez contribuer à la réussite de ce projet ? Faites un don ou devenez bénévole dès maintenant.</p>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="{{ route('donation') }}" class="btn2">Faire un don</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <!-- Project Info -->
                    <div class="sidebar-item">
                        <div class="sidebar-title">
                            <h3>Informations</h3>
                        </div>
                        <div class="sidebar-body">
                            <ul class="sidebar-list">
                                @if($project->category)
                                    <li><span>Catégorie:</span> {{ $project->category->name }}</li>
                                @endif
                                @if($project->status)
                                    <li><span>Statut:</span> {{ $project->status }}</li>
                                @endif
                                @if($project->start_date)
                                    <li><span>Date de début:</span> {{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</li>
                                @endif
                                @if($project->end_date)
                                    <li><span>Date de fin:</span> {{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}</li>
                                @endif
                                @if($project->location)
                                    <li><span>Lieu:</span> {{ $project->location }}</li>
                                @endif
                                @if($project->budget)
                                    <li><span>Budget:</span> {{ $project->budget }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Recent Projects -->
                    @if(isset($recentProjects) && count($recentProjects) > 0)
                        <div class="sidebar-item">
                            <div class="sidebar-title">
                                <h3>Projets récents</h3>
                            </div>
                            <div class="sidebar-body">
                                <ul class="sidebar-recent">
                                    @foreach($recentProjects as $recentProject)
                                        <li>
                                            <div class="recent-photo">
                                                @if($recentProject->image)
                                                    <img src="{{ asset('storage/' . $recentProject->image) }}" alt="{{ $recentProject->title }}">
                                                @else
                                                    <img src="{{ asset('images/projects/default-thumb.jpg') }}" alt="{{ $recentProject->title }}">
                                                @endif
                                            </div>
                                            <div class="recent-text">
                                                <a href="{{ route('projects.show', $recentProject->slug) }}">{{ $recentProject->title }}</a>
                                                <span>{{ \Carbon\Carbon::parse($recentProject->created_at)->format('d/m/Y') }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Contact Box -->
                    <div class="sidebar-item">
                        <div class="sidebar-title">
                            <h3>Besoin d'informations?</h3>
                        </div>
                        <div class="sidebar-body">
                            <div class="sidebar-contact">
                                <p>Pour plus d'informations sur ce projet, n'hésitez pas à nous contacter.</p>
                                <div class="sidebar-contact-btn">
                                    <a href="{{ route('contact') }}" class="btn1">Contactez-nous</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Project Detail End -->

<!-- Related Projects Start -->
@if(isset($relatedProjects) && count($relatedProjects) > 0)
<div class="project-area related-project pt-50 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="sec-title">
                        <h2>Projets similaires</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($relatedProjects as $relatedProject)
                <div class="col-md-4 col-sm-6">
                    <div class="project-item">
                        <div class="project-photo">
                            @if($relatedProject->image)
                                <img src="{{ asset('storage/' . $relatedProject->image) }}" alt="{{ $relatedProject->title }}">
                            @else
                                <img src="{{ asset('images/projects/default.jpg') }}" alt="{{ $relatedProject->title }}">
                            @endif
                            <div class="project-overlay">
                                <div class="project-text">
                                    <h3><a href="{{ route('projects.show', $relatedProject->slug) }}">{{ $relatedProject->title }}</a></h3>
                                    <div class="button-rm">
                                        <a href="{{ route('projects.show', $relatedProject->slug) }}">Lire la suite</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!-- Related Projects End -->

@endsection 