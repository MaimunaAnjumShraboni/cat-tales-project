<!-- REVIEWS Section  -->
<div id="testmonial" class="container-fluid wow fadeIn bg-dark text-light has-height-lg middle-items">
    <h2 class="section-title my-4 text-center">REVIEWS</h2>
    <div class="text-center mb-3">
        <a href="{{ url('/reviews') }}" class="btn" style="background: transparent; border: 1px solid #fff; color: #fff;">Leave a Review</a>
    </div>
    <div class="row mt-3 mb-5">
        @if(isset($reviews) && $reviews->count())
            @foreach($reviews as $rev)
                <div class="col-md-4 my-3 my-md-0">
                    <div class="testmonial-card">
                        <h3 class="testmonial-title">{{ $rev->name }}</h3>
                        @if($rev->title)
                        <h6 class="testmonial-subtitle">{{ $rev->title }}</h6>
                        @endif
                        <div class="testmonial-body">
                            <p>{{ $rev->body }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12 text-center">
                <p class="text-muted">No reviews yet. Be the first to share your experience.</p>
            </div>
        @endif
    </div>
</div>

<!-- CONTACT Section  -->
<div id="contact" class="container-fluid bg-dark text-light border-top wow fadeIn">
    <div class="row">
        <div class="col-md-6 px-0">
            <iframe
                title="Shelter Location Map"
                width="100%"
                height="100%"
                style="border:0; min-height: 400px;"
                loading="lazy"
                allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps?q=64/A%20Siddeswari%20Road%2C%20Dhaka-1217&output=embed">
            </iframe>
        </div>
        <div class="col-md-6 px-5 has-height-lg middle-items">
            <h3>FIND US</h3>
            <p>Find us at our shelter location below and drop by anytime to meet our cats.</p>
            <div class="text-muted">
                <p><span class="ti-location-pin pr-3"></span> 64/A Siddeswari Road,Dhaka-1217</p>
                <p><span class="ti-support pr-3"></span> <a href="tel:+11234567890" class="text-light" style="text-decoration: none;">(123) 456-7890</a></p>
                <p><span class="ti-email pr-3"></span> <a href="mailto:info@website.com" class="text-light" style="text-decoration: none;">info@website.com</a></p>
            </div>
        </div>
    </div>
</div>

<!-- page footer  -->
<div class="container-fluid bg-dark text-light has-height-md middle-items border-top text-center wow fadeIn">
    <div class="row">
        <div class="col-sm-4">
            <h3>EMAIL US</h3>
            <p class="text-muted"><a href="mailto:info@website.com" class="text-muted" style="text-decoration: none;">info@website.com</a></p>
        </div>
        <div class="col-sm-4">
            <h3>CALL US</h3>
            <p class="text-muted"><a href="tel:+11234567890" class="text-muted" style="text-decoration: none;">(123) 456-7890</a></p>
        </div>
        <div class="col-sm-4">
            <h3>FIND US</h3>
            <P class="text-muted">64/A Siddeswari Road,Dhaka-1217</P>
        </div>
    </div>
</div>
<div class="bg-dark text-light text-center border-top wow fadeIn">
    <p class="mb-0 py-3 text-muted small">&copy; Copyright <script>document.write(new Date().getFullYear())</script> Made with <i class="ti-heart text-danger"></i> By <a href="http://devcrud.com">DevCRUD</a></p>
</div>
<!-- JS scripts -->
<!-- core  -->
<script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
<script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
<!-- bootstrap affix -->
<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>
<!-- wow.js -->
<script src="assets/vendors/wow/wow.js"></script>
<!-- Static map embed is used; no JS API required -->
<!-- FoodHut js -->
<script src="assets/js/foodhut.js"></script>
