@extends('frontend.layouts.master')

@section('title', 'À propos')

@section('content')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-item">
                    <h2>À propos de nous</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li>À propos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- About Area Start -->
<div class="about-area">
    <div class="container">
        <div class="row about-tb">
            <div class="col-md-6">
                <div class="about-img">
                    @if(isset($about) && $about->image)
                        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}">
                    @else
                        <img src="{{ asset('images/about.jpg') }}" alt="À propos">
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-text">
                    <div class="section-heading">
                        <div class="sec-title">
                            <h2>@if(isset($about) && $about->title){{ $about->title }}@else À propos de nous @endif</h2>
                        </div>
                    </div>
                    <div class="about-text-items">
                        @if(isset($about) && $about->content)
                            {!! $about->content !!}
                        @else
                            <p>ONG Carrefour Jeunesse Afrique (CJA) est une ONG laïque et apolitique à but non lucratif fondée en 2018 en République du Bénin.</p>
                            <p>Notre mission est de promouvoir et d'accompagner le développement durable en Afrique en général et au Bénin particulièrement à travers l'éducation, la formation, l'entrepreneuriat, l'autonomisation des femmes et la protection de l'environnement.</p>
                            <p>Notre vision est de contribuer à l'émergence d'une jeunesse africaine dynamique, épanouie et respectueuse de l'environnement.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Area End -->

<!-- Mission Vision Area Start -->
<div class="mission-vision-area" id="mission">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="mv-item">
                    <div class="mv-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <div class="mv-text">
                        <h3>Notre Mission</h3>
                        <p>{{ $settings->mission ?? 'Promouvoir et accompagner le développement durable en Afrique à travers l'éducation, la formation, l'entrepreneuriat, l'autonomisation des femmes et la protection de l'environnement.' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mv-item">
                    <div class="mv-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="mv-text">
                        <h3>Notre Vision</h3>
                        <p>{{ $settings->vision ?? 'Contribuer à l'émergence d'une jeunesse africaine dynamique, épanouie et respectueuse de l'environnement.' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mv-item">
                    <div class="mv-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="mv-text">
                        <h3>Nos Valeurs</h3>
                        <p>{{ $settings->values ?? 'Intégrité, Respect, Innovation, Solidarité, Excellence et Engagement.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mission Vision Area End -->

<!-- Axes Area Start -->
<div class="service-area" id="axes">
    <div class="service-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="sec-title">
                        <h2>Nos axes d'intervention</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if(isset($axes) && count($axes) > 0)
                @foreach($axes as $axe)
                    <div class="col-md-4">
                        <div class="service-item">
                            <div class="service-photo">
                                @if($axe->image)
                                    <img src="{{ asset('storage/' . $axe->image) }}" alt="{{ $axe->title }}">
                                @else
                                    <img src="{{ asset('images/axes/default.jpg') }}" alt="{{ $axe->title }}">
                                @endif
                            </div>
                            <div class="service-text">
                                <h3>{{ $axe->title }}</h3>
                                <p>{{ Str::limit(strip_tags($axe->description), 150) }}</p>
                                <div class="service-rm">
                                    <a href="#" data-toggle="modal" data-target="#axeModal{{ $axe->id }}">Lire la suite</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="service-photo">
                            <img src="{{ asset('images/axes/default1.jpg') }}" alt="Développement personnel">
                        </div>
                        <div class="service-text">
                            <h3>Développement personnel</h3>
                            <p>Formations, coaching et activités visant à renforcer les compétences personnelles et professionnelles des jeunes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="service-photo">
                            <img src="{{ asset('images/axes/default2.jpg') }}" alt="Culture & Art">
                        </div>
                        <div class="service-text">
                            <h3>Culture & Art</h3>
                            <p>Promotion de la culture et des arts comme outils d'expression, d'éducation et de sensibilisation.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="service-photo">
                            <img src="{{ asset('images/axes/default3.jpg') }}" alt="Entrepreneuriat">
                        </div>
                        <div class="service-text">
                            <h3>Entrepreneuriat</h3>
                            <p>Accompagnement à la création d'entreprises, formation et soutien aux jeunes entrepreneurs.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- Axes Area End -->

<!-- Modals for Axes -->
@if(isset($axes) && count($axes) > 0)
    @foreach($axes as $axe)
        <div class="modal fade" id="axeModal{{ $axe->id }}" tabindex="-1" role="dialog" aria-labelledby="axeModalLabel{{ $axe->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="axeModalLabel{{ $axe->id }}">{{ $axe->title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if($axe->image)
                            <img src="{{ asset('storage/' . $axe->image) }}" alt="{{ $axe->title }}" class="img-fluid mb-3">
                        @endif
                        {!! $axe->description !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif

@endsection 