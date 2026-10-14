<!DOCTYPE html>
<html lang="en">
@include('home.css')
<style>
  /* Make the review form clearly readable */
  .review-card { background: #ffffff; color: #212529; }
  .review-card h3, .review-card label { color: #212529; }
  .review-card .form-control {
    background-color: #ffffff;
    color: #212529;
    border: 1px solid #ced4da;
  }
  .review-card .form-control::placeholder { color: #6c757d; opacity: 1; }
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
@include('home.header')
    <!-- Page Heading -->
    <div class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
        <h2 class="section-title">Share Your Experience</h2>
        <p class="mb-0">We value your feedback about our shelter.</p>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card review-card shadow-sm border-0">
                    <div class="card-body">
                        <h3 class="mb-1">Leave a Review</h3>
                        <p class="text-muted mb-4">Your feedback helps us improve our shelter and services.</p>
                        <form action="{{ url('/submit_review') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required maxlength="100">
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Title/Role (optional)</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" maxlength="120">
                                @error('title')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="form-group">
                                <label for="body">Your Review</label>
                                <textarea id="body" name="body" class="form-control" rows="5" required maxlength="2000">{{ old('body') }}</textarea>
                                @error('body')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                            <a href="{{ url('/') }}" class="btn btn-link">Back to Home</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('home.footer')
</body>
</html>
