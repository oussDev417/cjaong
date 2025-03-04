@extends('frontend.layouts.master')

@section('title', isset($settings) ? $settings->site_name : 'ONG Carrefour Jeunesse Afrique')

@section('content')
<!-- Slider Section Start -->
<div class="slider">
    <div class="all-slide owl-item">
        @if(isset($sliders) && count($sliders) > 0)
            @foreach($sliders as $slider)
                <div class="single-slide" style="background-image:url({{ asset('storage/' . $slider->image) }});">
                    <div class="slider-overlay"></div>
                    <div class="slider-wraper">
                        <div class="slider-text">
                            <div class="slider-inner">
                                <h1>{{ $slider->title }}</h1>
                                @if($slider->description)
                                    <h2>{{ $slider->description }}</h2>
                                @endif
                            </div>
                            <ul>
                                @if($slider->button_text && $slider->button_link)
                                    <li><a href="{{ $slider->button_link }}">{{ $slider->button_text }}</a></li>
                                @endif
                                @if($slider->button_text_2 && $slider->button_link_2)
                                    <li><a href="{{ $slider->button_link_2 }}">{{ $slider->button_text_2 }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="single-slide" style="background-image:url({{ asset('assets/img/slider.jpg') }});">
                <div class="slider-overlay"></div>
                <div class="slider-wraper">
                    <div class="slider-text">
                        <div class="slider-inner">
                            <h1>Carrefour Jeunesse Afrique</h1>
                            <h2>CENTRE SOCIO - EDUCATIF D'AIDE A L'ENFANCE, L'ADOLESCENCE ET A LA JEUNESSE</h2>
                        </div>
                        <ul>
                            <li><a href="{{ route('donation') }}">Nous soutenir</a></li>
                            <li><a href="{{ route('contact') }}">Nous contacter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="single-slide" style="background-image:url({{ asset('assets/img/slider2.jpg') }});">
                <div class="slider-overlay"></div>
                <div class="slider-wraper">
                    <div class="slider-text">
                        <div class="slider-inner">
                            <h1>Formations professionnelles et orientations</h1>
                            <h2>Les formations professionnelles des jeunes vulnérables, ces derniers sont envoyés dans des ateliers en dehors du centre auprès des maitres artisans..</h2>
                        </div>
                        <ul>
                            <li><a href="{{ route('donation') }}">Nous soutenir</a></li>
                            <li><a href="{{ route('contact') }}">Nous contacter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="single-slide" style="background-image:url({{ asset('assets/img/slider3.jpg') }});">
                <div class="slider-overlay"></div>
                <div class="slider-wraper">
                    <div class="slider-text">
                        <div class="slider-inner">
                            <h1>Un engagement citoyen pour un avenir durable</h1>
                            <h2>Protéger l'environnement, promouvoir l'éducation et la justice sociale : chaque action compte pour bâtir une société équitable et responsable.</h2>
                        </div>
                        <ul>
                            <li><a href="{{ route('donation') }}">Nous soutenir</a></li>
                            <li><a href="{{ route('contact') }}">Nous contacter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<!-- Slider Section End -->
 <!-- How To Help Section Start -->	
 <div class="how-to-help-sec pt-100 pb-70">
		<div class="how-to-help-sec-overlay"></div>
		<div class="container">
			<div class="row">
				<!-- Boîte de don -->
				<div class="col-md-6">
					<div class="donate-box">
						<img src="img/p1.jpg" alt="Aide aux enfants sans abri" />
						<div class="donate-box-inner">
							<div class="donate-box-text">	
								<h2>Soutener une cause noble</h2>
							</div>			
							<div class="donate-box-button">
								<a href="donation.html">Nous soutenir</a>
							</div>
						</div>
					</div>
				</div>				
	
				<!-- Comment nous aider -->
				<div class="col-md-6">
					<div class="sec-title">
						<h1>Comment nous soutenir</h1>
						<div class="border-shape"></div>
					</div>										
	
					<div class="how-to-help-box">
						<!-- Envoyer un don -->
						<div class="help-box-item">
							<div class="help-box-icon">
								<img src="img/icon/h1.png" alt="Envoyer un don" />
							</div>
							<div class="help-box-text">
								<h2>Faire un don</h2>
								<p>Vos dons permettent d'offrir un avenir meilleur aux enfants en difficulté. Chaque contribution compte.</p>
							</div>
						</div>							
	
						<!-- Devenir bénévole -->
						<div class="help-box-item">
							<div class="help-box-icon">
								<img src="img/icon/h2.png" alt="Devenir bénévole" />
							</div>
							<div class="help-box-text">
								<h2>Devenir bénévole</h2>
								<p>Rejoignez notre équipe et participez activement à nos actions pour le bien-être des enfants.</p>
							</div>
						</div>						
	
						<!-- Partager sur les réseaux sociaux -->
						<div class="help-box-item">
							<div class="help-box-icon">
								<img src="img/icon/h3.png" alt="Partager sur les réseaux sociaux" />
							</div>
							<div class="help-box-text">
								<h2>Partager sur les réseaux sociaux</h2>
								<p>Diffusez notre mission en partageant nos actions et en sensibilisant votre entourage.</p>
							</div>
						</div>				
					</div>
				</div>
			</div>
		</div>
	</div>		
	<!-- How To Help Section End -->



<!-- Service Area Start -->
@if(isset($axes) && count($axes) > 0)
<div class="causes-area">
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
            @foreach($axes as $axe)
                <div class="col-lg-4 col-md-6">
                    <div class="causes-item">
                        <div class="causes-img">
                            <img src="{{ asset('assets/images/axes/default.jpg') }}" alt="{{ $axe->title }}">
                        </div>
                        <div class="causes-text">
                            <h3>{{ $axe->title }}</h3>
                            <p>{{ Str::limit(strip_tags($axe->description), 150) }}</p>
                            <div class="causes-rm">
                                <a href="{{ route('about') }}#axes">Lire la suite</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!-- Service Area End -->

<!-- Counter Area Start -->
@if(isset($funfacts) && count($funfacts) > 0)
<div class="counter-area">
    <div class="container">
        <div class="row">
            @foreach($funfacts as $fact)
                <div class="col-md-3 col-sm-6">
                    <div class="counter-item">
                        <div class="counter-icon">
                            <i class="{{ $fact->icon ?? 'fas fa-users' }}"></i>
                        </div>
                        <div class="counter-text">
                            <h2 class="counter">{{ $fact->count }}</h2>
                            <h4>{{ $fact->title }}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!-- Counter Area End -->

<!-- Project Area Start -->
@if(isset($projects) && count($projects) > 0)
<div class="projects-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="sec-title">
                        <h2>Nos projets récents</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($projects as $project)
                <div class="col-lg-4 col-md-6">
                    <div class="project-item">
                        <div class="project-img">
                            <img src="{{ asset('assets/images/projects/default.jpg') }}" alt="{{ $project->title }}">
                        </div>
                        <div class="project-overlay">
                            <div class="project-text">
                                <h3><a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a></h3>
                                <div class="button-rm">
                                    <a href="{{ route('projects.show', $project->slug) }}">Lire la suite</a>
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
<!-- Project Area End -->

<!-- Testimonial Area Start -->
@if(isset($testimonials) && count($testimonials) > 0)
<div class="testimonial-area">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="sec-title">
                        <h2>Témoignages</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-slider">
                    @foreach($testimonials as $testimonial)
                        <div class="testimonial-item">
                            <div class="testimonial-text">
                                <p>{{ $testimonial->content }}</p>
                            </div>
                            <div class="testimonial-meta">
                                @if($testimonial->image)
                                    <div class="t-photo">
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}">
                                    </div>
                                @endif
                                <div class="t-info">
                                    <h4>{{ $testimonial->name }}</h4>
                                    <span>{{ $testimonial->role }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- Testimonial Area End -->

<!-- Team Area Start -->
@if(isset($teamCategories) && isset($teamMembers) && count($teamMembers) > 0)
<div class="team-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="sec-title">
                        <h2>Notre équipe</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if(isset($team) && count($team) > 0)
                @foreach($team as $member)
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset('assets/images/team/default.jpg') }}" alt="{{ $member->name }}">
                            </div>
                            <div class="team-social">
                                <ul>
                                    @if($member->facebook)
                                        <li><a href="{{ $member->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                    @endif
                                    @if($member->twitter)
                                        <li><a href="{{ $member->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                    @endif
                                    @if($member->linkedin)
                                        <li><a href="{{ $member->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="team-text">
                                <h3>{{ $member->name }}</h3>
                                <p>{{ $member->role }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="team-btn">
                    <a href="{{ route('team') }}" class="btn1">Voir toute l'équipe</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- Team Area End -->

<!-- News Area Start -->
@if(isset($news) && count($news) > 0)
<div class="news-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="sec-title">
                        <h2>Actualités récentes</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if(isset($news) && count($news) > 0)
                @foreach($news as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="news-item">
                            <div class="news-img">
                                <img src="{{ asset('assets/images/news/default.jpg') }}" alt="{{ $post->title }}">
                            </div>
                            <div class="news-text">
                                <div class="news-date">
                                    <span>{{ $post->created_at->format('d') }}</span>
                                    <span>{{ $post->created_at->format('M') }}</span>
                                </div>
                                <h3><a href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a></h3>
                                <p>{{ Str::limit(strip_tags($post->content), 100) }}</p>
                                <div class="news-rm">
                                    <a href="{{ route('news.show', $post->slug) }}">Lire la suite</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="news-btn">
                    <a href="{{ route('news.index') }}" class="btn1">Voir toutes les actualités</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- News Area End -->

<!-- Gallery Area Start -->
@if(isset($gallery) && count($gallery) > 0)
<div class="gallery-area">
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