<!DOCTYPE html>
<html lang="en">
@include('home.css')
<style>
    :root {
        --bg-dark: #0b1220;
        --row-dark: #0f172a;
        --row-alt: #111827;
        --header-dark: #1f2937;
        --text-light: #e5e7eb;
        --border-dark: #334155;
        --accent: #0d6efd; /* Bootstrap-ish primary */
    }
    table {
        width: 90%;
        border-collapse: collapse;
        margin: 50px auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: transparent;
        color: var(--text-light);
        border: 1px solid var(--border-dark);
        overflow: hidden;
        border-radius: 8px;
    }
    th, td {
        padding: 12px 15px;
        border: 1px solid var(--border-dark);
        text-align: center;
        vertical-align: middle;
    }
    th {
        background-color: var(--header-dark);
        color: var(--text-light);
        font-size: 1.05em;
        letter-spacing: .3px;
    }
    td { background-color: var(--row-dark); }
    tr:nth-child(even) td { background-color: var(--row-alt); }
    tr:hover td { background-color: var(--header-dark); }
    img { border-radius: 6px; }
    /* Optional accent line under header */
    thead tr { border-bottom: 2px solid var(--accent); }

    /* Order progress bar */
    .order-progress { max-width: 900px; margin: 30px auto 60px; color: var(--text-light); }
    .order-progress .steps { display: flex; align-items: center; justify-content: space-between; position: relative; }
    .order-progress .line { position: absolute; top: 50%; left: 10%; right: 10%; height: 4px; background: #374151; transform: translateY(-50%); }
    .order-progress .line .fill { height: 100%; background: #10b981; width: 0%; transition: width .4s ease; }
    .order-progress .step { position: relative; z-index: 1; text-align: center; flex: 1; }
    .order-progress .dot { width: 30px; height: 30px; border-radius: 50%; background: #374151; margin: 0 auto 8px; display: grid; place-items: center; color: #111; border: 2px solid #6b7280; }
    .order-progress .step.active .dot { background: #10b981; border-color: #34d399; color: #052e1d; }
    .order-progress .step.cancelled .dot { background: #ef4444; border-color: #f87171; color: #3b0d0d; }
    .order-progress .label { font-size: .9rem; opacity: .9; }
    .order-progress .muted { opacity: .45; }
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            
        </ul>
        <a class="navbar-brand m-auto" href="#">
            <img src="assets/imgs/logo.png" class="brand-img" alt="">
            <span class="brand-txt">Cat Tales</span>
        </a>
        <ul class="navbar-nav">
            @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('my_cart')}}">Cart</a>
                    </li>


                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input class="btn btn-primary ml-xl-4" type="submit" value="Logout">
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            @endif
            
            
        </ul>
    </div>
</nav>

</br></br></br></br>

<div id="gallery" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Sex</th>
            <th>Breed</th>
            <th>Description</th>
            <th>Image</th>
            <th>Vaccinated</th>
            <th>Availability</th>
            <th></th>
        </tr>
        @foreach($data as $cat)
        <tr>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->age }}</td>
                <td>{{ $cat->sex }}</td>
                <td>{{ $cat->breed }}</td>
                <td>{{ $cat->description }}</td>
                <td>
                    @if(!empty($cat->img))
                        <img width="150" src="{{ asset('cat_img/' . $cat->img) }}" alt="{{ $cat->name }}">
                        <div style="font-size:12px;color:#888;">{{ $cat->img }}</div>
                    @else
                        <span style="color:red;">No image</span>
                    @endif
                </td>
                <td>{{ $cat->vaccinated == 1 ? 'Yes' : 'No' }}</td>
                <td>{{ $cat->availability == 1 ? 'Yes' : 'No' }}</td>
                <td>
                    <a class="btn btn-danger" onclick="return confirm('Are you sure to remove this from cart?')" href="{{ url('remove_cart', $cat->id) }}">Remove</a>
                </td>
               
        </tr>
            @endforeach

    </table>
         


</div>

<div>
    <form action="{{ url('confirm_order') }}" method="POST">
        @csrf
        <div style="margin: auto; width: fit-content; padding: 10px;">
            <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Your Name" required style="margin:5px; padding:8px; border-radius:4px; border:1px solid #ccc;">
            <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="Your Email" required style="margin:5px; padding:8px; border-radius:4px; border:1px solid #ccc;">
            <input type="text" name="phone" value="{{ Auth::user()->phone }}" placeholder="Your Phone Number" required style="margin:5px; padding:8px; border-radius:4px; border:1px solid #ccc;">
            <input type="text" name="address" value="{{ Auth::user()->address }}" placeholder="Your Address" required style="margin:5px; padding:8px; border-radius:4px; border:1px solid #ccc;">
            <br>
            <input type="submit" value="Confirm Order" class="btn btn-primary" style="margin-top:10px; padding:10px 20px; border:none; border-radius:4px; background-color:#0d6efd; color:#fff; cursor:pointer;">
        </div>
    </form>

    @if(isset($orders) && $orders->count())
        @php
            $order = $orders->first();
            $status = strtolower($order->delivery_status ?? 'in progress');
            $isPending = in_array($status, ['in progress', 'pending']);
            $isOnTheWay = ($status === 'on the way');
            $isCancelled = ($status === 'cancelled');
            $isDelivered = ($status === 'delivered');
            $fill = 0;
            if ($isPending) { $fill = 15; }
            if ($isOnTheWay) { $fill = 55; }
            if ($isCancelled) { $fill = 55; }
            if ($isDelivered) { $fill = 100; }
        @endphp
        <div class="order-progress">
            <div class="text-center mb-2">
                <small class="text-muted">Latest order status for {{ $order->cat_name ?? 'your adoption' }}</small>
            </div>
            <div class="steps">
                <div class="line"><div class="fill" style="width: {{ $fill }}%"></div></div>
                <div class="step {{ ($isPending || $isOnTheWay || $isDelivered || $isCancelled) ? 'active' : '' }}">
                    <div class="dot">1</div>
                    <div class="label">Pending</div>
                </div>
                <div class="step {{ $isOnTheWay ? 'active' : '' }} {{ $isCancelled ? 'cancelled' : '' }}">
                    <div class="dot">2</div>
                    <div class="label">{{ $isCancelled ? 'Cancelled' : 'On the way' }}</div>
                </div>
                <div class="step {{ $isDelivered ? 'active' : '' }} {{ $isCancelled ? 'muted' : '' }}">
                    <div class="dot">3</div>
                    <div class="label">Delivered</div>
                </div>
            </div>
        </div>
    @endif

    <!-- JS scripts here or in a separate partial if needed -->
</body>
</html>
