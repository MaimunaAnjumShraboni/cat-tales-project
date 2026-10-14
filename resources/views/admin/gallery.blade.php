<!DOCTYPE html>
<html lang="en">
@include('admin.css')
<body>
    @include('admin.header')
    <div class="container-fluid page-body-wrapper">
        @include('admin.sidebar')
        <div class="page-content">
           <div class="page-header">
               <div class="container-fluid">
                   <h4 class="page-title">Gallery</h4>
                   <ul class="breadcrumb">
                       <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboard</a></li>
                       <li class="breadcrumb-item active">Gallery</li>
                   </ul>
               </div>
           </div>
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Upload Gallery Image</h4>
                                <form action="{{ url('/upload_gallery_image') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control" required>
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Caption (optional)</label>
                                        <input type="text" name="caption" class="form-control" maxlength="255">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <h4>Gallery Images</h4>
                    </div>
                    @forelse($images as $img)
                        <div class="col-sm-6 col-md-3 mb-3">
                            <div class="card">
                                <img src="{{ asset('gallery_img/'.$img->img) }}" class="card-img-top" alt="{{ $img->caption ?? 'image' }}">
                                <div class="card-body p-2">
                                    <p class="card-text mb-2" style="font-size: 0.9rem;">{{ $img->caption }}</p>
                                    <a href="{{ url('/delete_gallery_image/'.$img->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Delete this image?')">Delete</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p>No images uploaded yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>
            @include('admin.js')
        </div>
    </div>
</body>
</html>

