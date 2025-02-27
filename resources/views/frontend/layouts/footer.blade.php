<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget about-widget">
                        <div class="footer-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/logo-white.png') }}" alt="CJ AONG">
                            </a>
                        </div>
                        <div class="widget-content">
                            <p>CJ AONG est une organisation non gouvernementale dédiée à l'amélioration des conditions de vie des communautés vulnérables à travers des projets de développement durable.</p>
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
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget links-widget">
                        <h3 class="widget-title">Liens rapides</h3>
                        <div class="widget-content">
                            <ul class="links-list">
                                <li><a href="{{ route('home') }}">Accueil</a></li>
                                <li><a href="{{ route('about') }}">À propos</a></li>
                                <li><a href="{{ route('projects.index') }}">Projets</a></li>
                                <li><a href="{{ route('news.index') }}">Actualités</a></li>
                                <li><a href="{{ route('galerie.index') }}">Galerie</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                <li><a href="{{ route('benevole') }}">Devenir bénévole</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget contact-widget">
                        <h3 class="widget-title">Contactez-nous</h3>
                        <div class="widget-content">
                            <ul class="contact-info">
                                @if(isset($settings))
                                    @if($settings->adresse)
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>
                                            <p>{{ $settings->adresse }}</p>
                                        </li>
                                    @endif
                                    @if($settings->phone)
                                        <li>
                                            <i class="fas fa-phone-alt"></i>
                                            <p><a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a></p>
                                        </li>
                                    @endif
                                    @if($settings->email)
                                        <li>
                                            <i class="fas fa-envelope"></i>
                                            <p><a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></p>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                            @if(isset($settings) && $settings->horaire_admin)
                                <div class="horaires">
                                    <h4>Horaires d'ouverture</h4>
                                    <p>{!! nl2br(e($settings->horaire_admin)) !!}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright">
                        <p>&copy; {{ date('Y') }} <strong>CJ AONG</strong>. Tous droits réservés.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-nav">
                        <ul>
                            <li><a href="{{ route('home') }}">Accueil</a></li>
                            <li><a href="{{ route('about') }}">À propos</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> 