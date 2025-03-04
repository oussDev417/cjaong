<!-- Partner Area Start -->
<div class="partner-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Nos <span>Partenaires</span></h2>
                    <p>Nous sommes fiers de collaborer avec ces organisations qui partagent notre vision.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="partner-slider owl-carousel">
                    @foreach($partners ?? [] as $partner)
                        <div class="single-partner">
                            <a href="{{ $partner->url ?? '#' }}" target="_blank">
                                <img src="{{ asset('storage/partners/' . $partner->image) }}" alt="{{ $partner->name }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partner Area End --> 