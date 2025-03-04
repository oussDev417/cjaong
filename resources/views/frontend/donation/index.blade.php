@extends('frontend.layouts.master')

@section('title', 'Nous soutenir')

@section('content')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-item">
                    <h2>Nous soutenir</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li>Nous soutenir</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Donation Page Start -->
<div class="donation-page pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="sec-title">
                        <h2>Faire un don</h2>
                    </div>
                    <p>Votre soutien est essentiel pour poursuivre notre mission et aider les communautés que nous servons.</p>
                </div>
            </div>
        </div>
        
        <!-- Why Support Us Section -->
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="donation-image">
                    <img src="{{ asset('images/donation/donation.jpg') }}" alt="Faire un don">
                </div>
            </div>
            <div class="col-md-6">
                <div class="donation-content">
                    <h3>Pourquoi nous soutenir ?</h3>
                    <p>ONG Carrefour Jeunesse Afrique (CJA) travaille chaque jour pour améliorer les conditions de vie des communautés vulnérables au Bénin à travers des projets d'éducation, de santé, d'entrepreneuriat et de protection de l'environnement.</p>
                    <p>Votre don, qu'il soit ponctuel ou régulier, permet de :</p>
                    <ul>
                        <li><i class="fas fa-check"></i> Soutenir des projets éducatifs pour les enfants défavorisés</li>
                        <li><i class="fas fa-check"></i> Financer des formations professionnelles pour les jeunes</li>
                        <li><i class="fas fa-check"></i> Accompagner des entrepreneurs locaux</li>
                        <li><i class="fas fa-check"></i> Mener des campagnes de sensibilisation environnementale</li>
                        <li><i class="fas fa-check"></i> Organiser des événements culturels et artistiques</li>
                    </ul>
                    <p>Chaque contribution, quelle que soit sa taille, fait une différence réelle dans la vie des personnes que nous aidons.</p>
                </div>
            </div>
        </div>
        
        <!-- Donation Options -->
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="sec-title">
                        <h2>Comment nous soutenir</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mb-5">
            <!-- Option 1: One-time Donation -->
            <div class="col-md-4">
                <div class="donation-option">
                    <div class="donation-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <div class="donation-text">
                        <h4>Don ponctuel</h4>
                        <p>Faites un don unique pour soutenir notre mission et nos projets en cours.</p>
                        <div class="donation-amount">
                            <ul>
                                <li>10 000 FCFA</li>
                                <li>25 000 FCFA</li>
                                <li>50 000 FCFA</li>
                                <li>Autre montant</li>
                            </ul>
                        </div>
                        <div class="donation-button">
                            <a href="#donation-form" class="btn1">Faire un don</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Option 2: Monthly Donation -->
            <div class="col-md-4">
                <div class="donation-option">
                    <div class="donation-icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <div class="donation-text">
                        <h4>Don mensuel</h4>
                        <p>Soutenez notre action sur le long terme avec un don régulier mensuel.</p>
                        <div class="donation-amount">
                            <ul>
                                <li>5 000 FCFA / mois</li>
                                <li>10 000 FCFA / mois</li>
                                <li>20 000 FCFA / mois</li>
                                <li>Autre montant</li>
                            </ul>
                        </div>
                        <div class="donation-button">
                            <a href="#donation-form" class="btn1">Devenir donateur régulier</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Option 3: Other Ways to Support -->
            <div class="col-md-4">
                <div class="donation-option">
                    <div class="donation-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="donation-text">
                        <h4>Autres façons de nous soutenir</h4>
                        <p>Vous pouvez également nous aider en donnant de votre temps ou vos compétences.</p>
                        <ul class="donation-other">
                            <li><i class="fas fa-check"></i> Devenir bénévole</li>
                            <li><i class="fas fa-check"></i> Participer à nos événements</li>
                            <li><i class="fas fa-check"></i> Partager nos actions sur les réseaux sociaux</li>
                            <li><i class="fas fa-check"></i> Collecter des fonds parmi vos proches</li>
                        </ul>
                        <div class="donation-button">
                            <a href="{{ route('contact') }}" class="btn1">Nous contacter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Donation Form Section -->
        <div id="donation-form" class="row mb-5">
            <div class="col-md-12">
                <div class="donation-form">
                    <div class="section-heading">
                        <div class="sec-title">
                            <h2>Formulaire de don</h2>
                        </div>
                    </div>
                    <form action="{{ route('donation.process') }}" method="post">
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
                                    <label>Type de don</label>
                                    <select name="donation_type" class="form-control" required>
                                        <option value="once">Don ponctuel</option>
                                        <option value="monthly">Don mensuel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Montant (FCFA)</label>
                                    <input type="number" name="amount" class="form-control" placeholder="Montant de votre don" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom complet</label>
                                    <input type="text" name="name" class="form-control" placeholder="Votre nom complet" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Votre adresse email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Votre numéro de téléphone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pays</label>
                                    <input type="text" name="country" class="form-control" placeholder="Votre pays" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message (optionnel)</label>
                                    <textarea name="message" class="form-control" placeholder="Votre message ou commentaire" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="anonymous" name="anonymous">
                                    <label class="form-check-label" for="anonymous">Je souhaite faire un don anonyme</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="donation-button">
                                    <button type="submit" class="btn2">Procéder au paiement</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Payment Methods and Security -->
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="donation-security">
                    <h3>Méthodes de paiement et sécurité</h3>
                    <p>Nous acceptons plusieurs méthodes de paiement pour faciliter votre don :</p>
                    <div class="payment-methods">
                        <ul>
                            <li><i class="fab fa-cc-visa"></i> Carte bancaire (Visa, Mastercard)</li>
                            <li><i class="fas fa-mobile-alt"></i> Mobile Money (MTN, Moov)</li>
                            <li><i class="fas fa-money-bill-wave"></i> Virement bancaire</li>
                        </ul>
                    </div>
                    <p>Toutes vos transactions sont sécurisées. Nous ne stockons pas vos informations de paiement.</p>
                </div>
            </div>
        </div>
        
        <!-- Testimonials from Donors -->
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="sec-title">
                        <h2>Témoignages de donateurs</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-item">
                    <div class="testimonial-text">
                        <p>"Faire un don à CJA a été une expérience enrichissante. J'apprécie la transparence de l'organisation et les mises à jour régulières sur l'impact de ma contribution."</p>
                    </div>
                    <div class="testimonial-meta">
                        <div class="t-info">
                            <h4>Marc Dubois</h4>
                            <span>Donateur depuis 2021</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-item">
                    <div class="testimonial-text">
                        <p>"J'ai choisi de faire un don mensuel pour soutenir les projets éducatifs de CJA. Voir l'impact positif sur les enfants est la meilleure récompense."</p>
                    </div>
                    <div class="testimonial-meta">
                        <div class="t-info">
                            <h4>Sophie Martin</h4>
                            <span>Donatrice régulière</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-item">
                    <div class="testimonial-text">
                        <p>"En tant qu'entreprise locale, nous sommes fiers de soutenir CJA. Leur engagement envers le développement durable correspond parfaitement à nos valeurs."</p>
                    </div>
                    <div class="testimonial-meta">
                        <div class="t-info">
                            <h4>Entreprise ABC</h4>
                            <span>Partenaire corporatif</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- FAQ Section -->
        <div class="row">
            <div class="col-md-12">
                <div class="donation-faq">
                    <div class="section-heading">
                        <div class="sec-title">
                            <h2>Questions fréquentes</h2>
                        </div>
                    </div>
                    <div class="faq-wrapper">
                        <div class="faq-item">
                            <div class="faq-title">
                                <h4>Comment mon don sera-t-il utilisé ?</h4>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="faq-content">
                                <p>Votre don sera alloué aux différents projets et programmes de CJA selon les besoins prioritaires, notamment l'éducation, la formation professionnelle, l'entrepreneuriat et la protection de l'environnement. Nous publions régulièrement des rapports d'activités détaillant l'utilisation des fonds.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <h4>Puis-je choisir à quel projet affecter mon don ?</h4>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="faq-content">
                                <p>Oui, vous pouvez indiquer dans le champ message du formulaire de don le projet spécifique que vous souhaitez soutenir. Nous ferons notre possible pour respecter votre souhait.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <h4>Mon don est-il déductible des impôts ?</h4>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="faq-content">
                                <p>Selon la législation en vigueur dans votre pays de résidence, votre don peut être déductible des impôts. Nous fournissons un reçu fiscal pour tous les dons effectués. Nous vous recommandons de consulter votre conseiller fiscal pour plus d'informations.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <h4>Comment puis-je annuler mon don mensuel ?</h4>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="faq-content">
                                <p>Vous pouvez annuler votre don mensuel à tout moment en nous contactant par email à {{ $settings->email ?? 'ongcarrefourjeunesseafrique@gmail.com' }} ou par téléphone au {{ $settings->phone ?? '+229 57-70-28-05' }}. Nous traiterons votre demande dans les plus brefs délais.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <h4>Comment puis-je savoir que mon don a bien été reçu ?</h4>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="faq-content">
                                <p>Vous recevrez un email de confirmation immédiatement après avoir effectué votre don en ligne. Un reçu officiel vous sera également envoyé par email dans les jours suivant votre don.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Donation Page End -->

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Toggle FAQ items
        $('.faq-title').click(function() {
            $(this).next('.faq-content').slideToggle();
            $(this).find('i').toggleClass('fa-plus fa-minus');
        });
        
        // Smooth scroll to donation form
        $('a[href="#donation-form"]').click(function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top - 100
            }, 500);
        });
    });
</script>
@endsection 