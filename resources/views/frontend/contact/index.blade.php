@extends('frontend.layouts.master')

@section('title', 'Contactez-nous')

@section('content')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-item">
                    <h2>Contactez-nous</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Contact Page Start -->
<div class="contact-page pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="sec-title">
                        <h2>Nous contacter</h2>
                    </div>
                    <p>Vous souhaitez nous contacter ? Utilisez le formulaire ci-dessous ou nos coordonnées pour nous joindre.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="contact-info-item">
                    <div class="contact-info">
                        <div class="contact-info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-info-text">
                            <h4>Notre adresse</h4>
                            <p>{{ $settings->address ?? 'Cotonou, Aibatin, Immeuble Le Verseau' }}</p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-info-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-info-text">
                            <h4>Téléphone</h4>
                            <p>{{ $settings->phone ?? '+229 57-70-28-05' }}</p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-info-text">
                            <h4>Email</h4>
                            <p>{{ $settings->email ?? 'ongcarrefourjeunesseafrique@gmail.com' }}</p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-info-text">
                            <h4>Heures d'ouverture</h4>
                            <p>{{ $settings->opening_hours ?? 'Du lundi au vendredi: 8h00 - 17h00' }}</p>
                        </div>
                    </div>
                    <div class="contact-info-social">
                        <h4>Suivez-nous</h4>
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
            <div class="col-md-8">
                <div class="contact-form">
                    <form action="{{ route('contact.submit') }}" method="post">
                        @csrf
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Votre nom *" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Votre email *" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Votre téléphone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Sujet *" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Votre message *" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn1">Envoyer le message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Page End -->

<!-- Google Map Start -->
<div class="map-area">
    <div class="map-wrapper">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.0301277168713!2d2.3952456748671257!3d6.389565425341177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1024a981ebc72357%3A0x2592a2cb68ce8ab!2sCotonou%2C%20Benin!5e0!3m2!1sen!2s!4v1656662984400!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<!-- Google Map End -->

@endsection 