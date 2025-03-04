@extends('frontend.layouts.master')

@section('title', 'Notre équipe')

@section('content')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-item">
                    <h2>Notre équipe</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li>Notre équipe</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Team Area Start -->
<div class="team-area pt-100 pb-70">
    <div class="container">
        @if(isset($teamCategories) && count($teamCategories) > 0)
            @foreach($teamCategories as $category)
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <div class="sec-title">
                                <h2>{{ $category->name }}</h2>
                            </div>
                            @if($category->description)
                                <p>{{ $category->description }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    @php
                        $categoryMembers = $teamMembers->where('category_id', $category->id);
                    @endphp
                    @if($categoryMembers->count() > 0)
                        @foreach($categoryMembers as $member)
                            <div class="col-md-3 col-sm-6">
                                <div class="team-item">
                                    <div class="team-photo">
                                        @if($member->image)
                                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                                        @else
                                            <img src="{{ asset('images/team/default.jpg') }}" alt="{{ $member->name }}">
                                        @endif
                                        <div class="team-social">
                                            <ul>
                                                @if($member->facebook)
                                                    <li><a href="{{ $member->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                @endif
                                                @if($member->twitter)
                                                    <li><a href="{{ $member->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                @endif
                                                @if($member->linkedin)
                                                    <li><a href="{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                                @endif
                                                @if($member->instagram)
                                                    <li><a href="{{ $member->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="team-text">
                                        <h3>{{ $member->name }}</h3>
                                        <p>{{ $member->role }}</p>
                                        @if($member->bio)
                                            <div class="team-rm">
                                                <a href="#" data-toggle="modal" data-target="#memberModal{{ $member->id }}">En savoir plus</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12">
                            <p class="text-center">Aucun membre trouvé dans cette catégorie.</p>
                        </div>
                    @endif
                </div>
            @endforeach
        @elseif(isset($teamMembers) && count($teamMembers) > 0)
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
                @foreach($teamMembers as $member)
                    <div class="col-md-3 col-sm-6">
                        <div class="team-item">
                            <div class="team-photo">
                                @if($member->image)
                                    <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                                @else
                                    <img src="{{ asset('images/team/default.jpg') }}" alt="{{ $member->name }}">
                                @endif
                                <div class="team-social">
                                    <ul>
                                        @if($member->facebook)
                                            <li><a href="{{ $member->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif
                                        @if($member->twitter)
                                            <li><a href="{{ $member->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        @endif
                                        @if($member->linkedin)
                                            <li><a href="{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        @endif
                                        @if($member->instagram)
                                            <li><a href="{{ $member->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="team-text">
                                <h3>{{ $member->name }}</h3>
                                <p>{{ $member->role }}</p>
                                @if($member->bio)
                                    <div class="team-rm">
                                        <a href="#" data-toggle="modal" data-target="#memberModal{{ $member->id }}">En savoir plus</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
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
                <div class="col-md-3 col-sm-6">
                    <div class="team-item">
                        <div class="team-photo">
                            <img src="{{ asset('images/team/default1.jpg') }}" alt="John Doe">
                            <div class="team-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-text">
                            <h3>John Doe</h3>
                            <p>Directeur Exécutif</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="team-item">
                        <div class="team-photo">
                            <img src="{{ asset('images/team/default2.jpg') }}" alt="Jane Smith">
                            <div class="team-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-text">
                            <h3>Jane Smith</h3>
                            <p>Responsable Financière</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="team-item">
                        <div class="team-photo">
                            <img src="{{ asset('images/team/default3.jpg') }}" alt="Mike Johnson">
                            <div class="team-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-text">
                            <h3>Mike Johnson</h3>
                            <p>Chargé de Projets</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="team-item">
                        <div class="team-photo">
                            <img src="{{ asset('images/team/default4.jpg') }}" alt="Sarah Brown">
                            <div class="team-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-text">
                            <h3>Sarah Brown</h3>
                            <p>Responsable Communication</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<!-- Team Area End -->

<!-- Modals for Team Members -->
@if(isset($teamMembers) && count($teamMembers) > 0)
    @foreach($teamMembers as $member)
        @if($member->bio)
            <div class="modal fade" id="memberModal{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel{{ $member->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="memberModalLabel{{ $member->id }}">{{ $member->name }} - {{ $member->role }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    @if($member->image)
                                        <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="img-fluid mb-3">
                                    @else
                                        <img src="{{ asset('images/team/default.jpg') }}" alt="{{ $member->name }}" class="img-fluid mb-3">
                                    @endif
                                    <div class="team-social">
                                        <ul class="list-inline">
                                            @if($member->facebook)
                                                <li class="list-inline-item"><a href="{{ $member->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            @endif
                                            @if($member->twitter)
                                                <li class="list-inline-item"><a href="{{ $member->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            @endif
                                            @if($member->linkedin)
                                                <li class="list-inline-item"><a href="{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                            @endif
                                            @if($member->instagram)
                                                <li class="list-inline-item"><a href="{{ $member->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    {!! $member->bio !!}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif

@endsection 