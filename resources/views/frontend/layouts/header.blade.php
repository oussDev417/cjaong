<!-- Top Bar -->
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="top-bar-left">
                    <ul class="info-list">
                        @if(isset($settings))
                            @if($settings->phone)
                                <li>
                                    <i class="fas fa-phone-alt"></i>
                                    <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                                </li>
                            @endif
                            @if($settings->email)
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                                </li>
                            @endif
                            @if($settings->adresse)
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $settings->adresse }}</span>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="top-bar-right">
                    <ul class="social-links">
                        @if(isset($settings))
                            @if($settings->fb_link)
                                <li>
                                    <a href="{{ $settings->fb_link }}" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                            @endif
                            @if($settings->insta_link)
                                <li>
                                    <a href="{{ $settings->insta_link }}" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            @endif
                            @if($settings->linkedin_link)
                                <li>
                                    <a href="{{ $settings->linkedin_link }}" target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            @endif
                            @if($settings->youtube_link)
                                <li>
                                    <a href="{{ $settings->youtube_link }}" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header class="header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="CJ AONG">
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6">
                <div class="nav-outer">
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">Accueil</a>
                                </li>
                                <li class="{{ request()->routeIs('about') || request()->routeIs('team') || request()->routeIs('axes') || request()->routeIs('partners') ? 'active dropdown' : 'dropdown' }}">
                                    <a href="#">À propos</a>
                                    <ul>
                                        <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                            <a href="{{ route('about') }}">Qui sommes-nous</a>
                                        </li>
                                        <li class="{{ request()->routeIs('team') ? 'active' : '' }}">
                                            <a href="{{ route('team') }}">Notre équipe</a>
                                        </li>
                                        <li class="{{ request()->routeIs('axes') ? 'active' : '' }}">
                                            <a href="{{ route('axes') }}">Axes d'intervention</a>
                                        </li>
                                        <li class="{{ request()->routeIs('partners') ? 'active' : '' }}">
                                            <a href="{{ route('partners') }}">Partenaires</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="{{ request()->routeIs('projects.*') ? 'active' : '' }}">
                                    <a href="{{ route('projects.index') }}">Projets</a>
                                </li>
                                <li class="{{ request()->routeIs('news.*') ? 'active' : '' }}">
                                    <a href="{{ route('news.index') }}">Actualités</a>
                                </li>
                                <li class="{{ request()->routeIs('galerie.*') ? 'active' : '' }}">
                                    <a href="{{ route('galerie.index') }}">Galerie</a>
                                </li>
                                <li class="{{ request()->routeIs('contact') || request()->routeIs('benevole') ? 'active dropdown' : 'dropdown' }}">
                                    <a href="#">Contact</a>
                                    <ul>
                                        <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                            <a href="{{ route('contact') }}">Nous contacter</a>
                                        </li>
                                        <li class="{{ request()->routeIs('benevole') ? 'active' : '' }}">
                                            <a href="{{ route('benevole') }}">Devenir bénévole</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header> 