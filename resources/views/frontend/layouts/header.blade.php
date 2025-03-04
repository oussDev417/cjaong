<!-- Header Start -->
<header>
    <!-- Header Top Start -->
    <div class="hd-top-sec text-center">
        <div class="hd-top-sec-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img style="height:100px; width: 100px;" src="{{ asset('assets/images/logo.jpg') }}" alt="{{ $settings->site_name ?? 'CJA ONG' }}"/>
                        </a>
                    </div>
                </div>              
                <div class="col-md-2 col-sm-2">
                    <div class="contact-info">
                        <div class="info-box">
                            <span class="info-title">Téléphone</span>
                            <span>{{ $settings->phone ?? '+229 57-70-28-05' }}</span>
                        </div>              
                    </div>
                </div>                 
                <div class="col-md-4 col-sm-4">
                    <div class="contact-info">          
                        <div class="info-box">
                            <span class="info-title">email</span>
                            <span style="font-size: 14px;">{{ $settings->email ?? 'ongcarrefourjeunesseafrique@gmail.com' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="social-profile">
                        <ul>
                            @if($settings->facebook ?? true)
                                <li><a href="{{ $settings->facebook_url ?? 'https://web.facebook.com/Carrefour-Jeunesse-Afrique-100329659021639' }}"><i class="fab fa-facebook-f"></i></a></li>
                            @endif
                            @if($settings->instagram ?? true)
                                <li><a href="{{ $settings->instagram_url ?? 'https://www.instagram.com/carrefour_jeunesse_afrique/?hl=fr' }}"><i class="fab fa-instagram"></i></a></li>
                            @endif
                            @if($settings->linkedin ?? false)
                                <li><a href="{{ $settings->linkedin_url ?? '#' }}"><i class="fab fa-linkedin-in"></i></a></li>
                            @endif
                            @if($settings->tiktok ?? true)
                                <li><a href="{{ $settings->tiktok_url ?? 'https://www.tiktok.com/@carrefour_jeunesse_afrique' }}"><i class="fab fa-tiktok"></i></a></li>
                            @endif
                            @if($settings->twitter ?? true)
                                <li><a href="{{ $settings->twitter_url ?? 'https://twitter.com/CarrefourJaw' }}"><i class="fab fa-twitter"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hd-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="menu">
                        <nav id="main-menu" class="main-menu">
                            <ul>
                                <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Accueil</a></li>
                                <li><a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">A propos</a></li> 
                                <li><a class="{{ request()->routeIs('team') ? 'active' : '' }}" href="{{ route('team') }}">Notre équipe</a></li> 
                                <li><a class="{{ request()->routeIs('projects.*') ? 'active' : '' }}" href="{{ route('projects.index') }}">Nos projets</a></li>
                                <li><a class="{{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">Nos actualités</a></li>
                                <li><a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Nous contacter</a></li>
                                <li><a class="{{ request()->routeIs('donation') ? 'active' : '' }}" href="{{ route('donation') }}">Nous soutenir</a></li>
                            </ul>
                        </nav>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
    <!-- Header Top End -->
</header>
<!-- Header End --> 