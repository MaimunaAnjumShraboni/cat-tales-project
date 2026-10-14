<!--  Gallery Section  -->
<div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
    <h2 class="section-title">Shelter Gallery</h2>
    
    </div>
<div class="gallary row">
    @if(isset($galleryImages) && $galleryImages->count())
        @foreach($galleryImages as $g)
            <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
                <img src="{{ asset('gallery_img/'.$g->img) }}" alt="{{ $g->caption ?? 'gallery image' }}" class="gallary-img">
                <a href="{{ asset('gallery_img/'.$g->img) }}" class="gallary-overlay" target="_blank" rel="noopener">
                    <i class="gallary-icon ti-plus"></i>
                </a>
            </div>
        @endforeach
    @else
        <div class="col-12 text-center py-4">
            <p>No gallery images yet.</p>
        </div>
    @endif
</div>
