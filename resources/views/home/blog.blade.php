<!-- BLOG Section  -->
<div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
    <h2 class="section-title py-3">Find Your Cat Companion</h2>
    <div class="container">
        <form action="{{ url('/') }}" method="GET" class="row justify-content-center g-2" style="gap: 0.75rem;">
            <div class="col-12 col-md-4">
                <input type="text" name="breed" value="{{ request('breed') }}" class="form-control" placeholder="Search by breed">
            </div>
            <div class="col-12 col-md-3">
                <select name="sex" class="form-control">
                    <option value="">Any Sex</option>
                    <option value="Male" {{ request('sex')=='Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ request('sex')=='Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="col-12 col-md-2">
                <button type="submit" class="btn btn-primary btn-block w-100">Search</button>
            </div>
            @if(request('breed') || request('sex'))
            <div class="col-12 col-md-2">
                <a href="{{ url('/') }}" class="btn btn-outline-light btn-block w-100">Clear</a>
            </div>
            @endif
        </form>
    </div>
</div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">
            @forelse($data as $cat)
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card bg-dark border-light shadow mb-4 w-100" style="min-height: 500px; display: flex; flex-direction: column;">
                        <div style="width: 100%; aspect-ratio: 16/9; overflow: hidden;">
                            <img src="cat_img/{{ $cat->img }}" alt="{{ $cat->name }}" class="card-img-top rounded-0" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between" style="flex: 1 1 auto;">
                            <div class="text-center mb-3">
                                <span class="breed-badge">{{$cat->breed}}</span>
                            </div>
                            <div class="mb-2 text-left">
                                <h4 class="mb-1"><strong>Name:</strong> {{$cat->name}}</h4>
                                <h4 class="mb-1"><strong>Age:</strong> {{$cat->age}}</h4>
                                <h4 class="mb-1"><strong>Sex:</strong> {{$cat->sex}}</h4>
                                <h4 class="mb-1"><strong>Vaccinated:</strong> {{ $cat->vaccinated == 1 ? 'Yes' : 'No' }}</h4>
                                <h4 class="mb-1"><strong>Availability:</strong> {{ $cat->availability == 1 ? 'Yes' : 'No' }}</h4>
                            </div>
                            <p class="text-white mt-auto" style="word-break: break-word;"><strong>Description:</strong> {{$cat->description}}</p>
                        </div>
                        <div class="text-center mb-3">
                            <form action="{{url('adopt_cat', $cat->id)}}" method="POST">
                                @csrf
                                <input class="btn btn-light text-dark border" type="submit" value="Adopt Me">
                            </form>
                        </div>
                    </div>
                </div>
                
                
            
            @empty
                <div class="col-12 text-center text-muted py-4">No cats match your search.</div>
            @endforelse   
            </div>
        </div>
    </div>

