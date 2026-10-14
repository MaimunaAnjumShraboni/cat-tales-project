<!-- book a table Section  -->
<div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
    <div class="">
        <h2 class="section-title mb-5">Request A Cat-Sitting</h2>
        <p style="font-size:1.35rem;">Away for a bit?</p>
        <p style="font-size:1.35rem;">Leave your cat, we'll care while you're away</p>
        
        <form action="{{url('book_cat')}}" method="POST">
        @csrf
        <div class="row mb-5">
            <div class="col-12 col-md-3 mb-3 d-flex flex-column align-items-start">
                <input type="email" id="booktable" name="email" class="form-control form-control-lg custom-form-control" placeholder="EMAIL" required>
            </div>
            <div class="col-12 col-md-3 mb-3 d-flex flex-column align-items-start">
                <input type="text" id="booktable" name="breed" class="form-control form-control-lg custom-form-control" placeholder="BREED" >
            </div>
            <div class="col-12 col-md-3 mb-3 d-flex flex-column align-items-start">
                <input type="date" id="start-date" name="start_date" class="form-control form-control-lg custom-form-control" placeholder="Start Date">
                <label for="start-date" style="font-size:1.1rem; margin-top:4px;">Start Date</label>
            </div>
            <div class="col-12 col-md-3 mb-3 d-flex flex-column align-items-start">
                <input type="date" id="end-date" name="end_date" class="form-control form-control-lg custom-form-control" placeholder="End Date">
                <label for="end-date" style="font-size:1.1rem; margin-top:4px;">End Date</label>
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-primary" id="rounded-btn">BOOK NOW</button>
        </form>
    
    </div>
</div>
