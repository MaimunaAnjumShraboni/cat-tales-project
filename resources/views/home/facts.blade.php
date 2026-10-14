<!DOCTYPE html>
<html lang="en">
@include('home.css')
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    @include('home.header')

    <section class="container py-5" style="color:#e5e7eb;">
        <div class="text-center mb-4">
            <h2 class="section-title">Learn Cat Breed Facts</h2>
            <p class="text-muted">Search a breed to see an image, info, and fun traits.</p>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-md-8">
                <form id="breedForm" class="form-inline d-flex gap-2" onsubmit="return false;">
                    <input id="breedInput" type="text" class="form-control mr-2" placeholder="Enter breed name, e.g., Bengal" style="flex:1 1 auto;">
                    <button id="searchBtn" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <div id="result" class="row justify-content-center" style="display:none;">
            <div class="col-12 col-md-10">
                <div class="card bg-dark border-light shadow">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img id="breedImage" src="" alt="Breed image" style="width:100%; height:100%; object-fit:cover; min-height: 280px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h3 class="card-title mb-1" id="breedName"></h3>
                                <p class="mb-2 text-muted" id="breedOrigin"></p>
                                <p class="mb-2" id="breedDesc"></p>
                                <p class="mb-1"><strong>Life span:</strong> <span id="breedLife"></span> years</p>
                                <div class="mt-3">
                                    <span class="badge badge-info mr-1" id="fact1" style="background:#0ea5e9;">Trait</span>
                                    <span class="badge badge-info" id="fact2" style="background:#22c55e;">Trait</span>
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-outline-light btn-sm" id="wikiLink" href="#" target="_blank" rel="noopener">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="emptyState" class="text-center text-muted" style="display:none;">
            No matching breed found. Try another name.
        </div>
    </section>

    @include('home.footer')

    <script>
    (function(){
        const API_KEY = "{{ env('CAT_API_KEY', 'live_khGj9sswOqYGIGvZd0pRNjWt4OVdc9Bkho3YQN1jcejLHSjhy6PxdtPOHKmHAwvz') }}";
        const form = document.getElementById('breedForm');
        const input = document.getElementById('breedInput');
        const result = document.getElementById('result');
        const empty = document.getElementById('emptyState');
        const img = document.getElementById('breedImage');
        const nameEl = document.getElementById('breedName');
        const originEl = document.getElementById('breedOrigin');
        const descEl = document.getElementById('breedDesc');
        const lifeEl = document.getElementById('breedLife');
        const fact1 = document.getElementById('fact1');
        const fact2 = document.getElementById('fact2');
        const wiki = document.getElementById('wikiLink');

        async function searchBreed(q) {
            if(!q) return;
            result.style.display = 'none';
            empty.style.display = 'none';
            try {
                const res = await fetch(`https://api.thecatapi.com/v1/breeds/search?q=${encodeURIComponent(q)}`, {
                    headers: { 'x-api-key': API_KEY }
                });
                const breeds = await res.json();
                if(!breeds || !breeds.length){
                    empty.style.display = 'block';
                    return;
                }
                const b = breeds[0];
                nameEl.textContent = b.name || '';
                originEl.textContent = (b.origin ? `Origin: ${b.origin}` : '');
                descEl.textContent = b.description || '';
                lifeEl.textContent = (b.life_span || '').replace(/\s*years?\s*/i,'');
                wiki.href = b.wikipedia_url || '#';

                const traits = (b.temperament || '').split(',').map(s=>s.trim()).filter(Boolean);
                fact1.textContent = traits[0] || 'Affectionate';
                fact2.textContent = traits[1] || 'Playful';

                // Try to load an image for this breed
                let imgUrl = '';
                if (b.reference_image_id) {
                    imgUrl = `https://cdn2.thecatapi.com/images/${b.reference_image_id}.jpg`;
                } else {
                    const imgRes = await fetch(`https://api.thecatapi.com/v1/images/search?breed_ids=${b.id}&limit=1`, {
                        headers: { 'x-api-key': API_KEY }
                    });
                    const imgs = await imgRes.json();
                    if (imgs && imgs[0] && imgs[0].url) imgUrl = imgs[0].url;
                }
                img.src = imgUrl || 'assets/imgs/gallary-4.jpg';

                result.style.display = 'block';
            } catch (e) {
                console.error(e);
                empty.style.display = 'block';
            }
        }

        document.getElementById('searchBtn').addEventListener('click', ()=> searchBreed(input.value));
        input.addEventListener('keydown', (e)=>{ if(e.key==='Enter'){ e.preventDefault(); searchBreed(input.value); } });

        // If query present in URL, search on load
        const params = new URLSearchParams(location.search);
        if (params.get('breed')) {
            input.value = params.get('breed');
            searchBreed(input.value);
        }
    })();
    </script>
</body>
</html>

