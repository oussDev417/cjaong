@extends('frontend.layouts.master')

@section('title', 'Nos projets')

@section('content')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-item">
                    <h2>Nos projets</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li>Nos projets</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Project Area Start -->
<div class="project-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="sec-title">
                        <h2>Nos projets et initiatives</h2>
                    </div>
                    <p>Découvrez les projets que nous menons pour un impact durable en Afrique.</p>
                </div>
            </div>
        </div>
        
        <!-- Category Filter -->
        @if(isset($categories) && count($categories) > 0)
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="project-menu">
                        <ul>
                            <li class="filter active" data-filter="all">Tous</li>
                            @foreach($categories as $category)
                                <li class="filter" data-filter=".cat-{{ $category->id }}">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        
        <div class="row">
            @if(isset($projects) && count($projects) > 0)
                @foreach($projects as $project)
                    <div class="col-md-4 col-sm-6 mix {{ isset($project->category_id) ? 'cat-'.$project->category_id : '' }}">
                        <div class="project-item">
                            <div class="project-photo">
                                @if($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                                @else
                                    <img src="{{ asset('images/projects/default.jpg') }}" alt="{{ $project->title }}">
                                @endif
                                <div class="project-overlay">
                                    <div class="project-text">
                                        <h3><a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a></h3>
                                        <div class="button-rm">
                                            <a href="{{ route('projects.show', $project->slug) }}">Lire la suite</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="project-info">
                                <h3><a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a></h3>
                                <p>{{ Str::limit(strip_tags($project->content), 100) }}</p>
                                <div class="project-meta">
                                    @if($project->status)
                                        <span class="project-status">{{ $project->status }}</span>
                                    @endif
                                    @if($project->start_date)
                                        <span class="project-date">{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-4 col-sm-6">
                    <div class="project-item">
                        <div class="project-photo">
                            <img src="{{ asset('images/projects/default1.jpg') }}" alt="Projet Éducation">
                            <div class="project-overlay">
                                <div class="project-text">
                                    <h3><a href="#">Éducation pour tous</a></h3>
                                    <div class="button-rm">
                                        <a href="#">Lire la suite</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project-info">
                            <h3><a href="#">Éducation pour tous</a></h3>
                            <p>Un projet visant à améliorer l'accès à l'éducation pour les enfants défavorisés.</p>
                            <div class="project-meta">
                                <span class="project-status">En cours</span>
                                <span class="project-date">01/01/2023</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="project-item">
                        <div class="project-photo">
                            <img src="{{ asset('images/projects/default2.jpg') }}" alt="Projet Environnement">
                            <div class="project-overlay">
                                <div class="project-text">
                                    <h3><a href="#">Reforestation communautaire</a></h3>
                                    <div class="button-rm">
                                        <a href="#">Lire la suite</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project-info">
                            <h3><a href="#">Reforestation communautaire</a></h3>
                            <p>Initiative de plantation d'arbres impliquant les communautés locales pour lutter contre la déforestation.</p>
                            <div class="project-meta">
                                <span class="project-status">En cours</span>
                                <span class="project-date">15/03/2023</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="project-item">
                        <div class="project-photo">
                            <img src="{{ asset('images/projects/default3.jpg') }}" alt="Projet Santé">
                            <div class="project-overlay">
                                <div class="project-text">
                                    <h3><a href="#">Santé pour tous</a></h3>
                                    <div class="button-rm">
                                        <a href="#">Lire la suite</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project-info">
                            <h3><a href="#">Santé pour tous</a></h3>
                            <p>Campagnes de sensibilisation et accès aux soins de santé primaires dans les zones rurales.</p>
                            <div class="project-meta">
                                <span class="project-status">Terminé</span>
                                <span class="project-date">20/11/2022</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Pagination -->
        @if(isset($projects) && method_exists($projects, 'links'))
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="pagination-area">
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<!-- Project Area End -->

@endsection 