<!DOCTYPE html>
<html>
<head>
  @include('admin.css')
  <style>
  .responsive-table-container {
    width: 100%;
    max-width: 1100px;
    overflow-x: auto;
    margin: 0 auto 32px auto;
    background: transparent;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    background: #22223b;
    color: #f2e9e4;
    font-family: 'Muli', Arial, sans-serif;
    box-shadow: 0 2px 8px rgba(34,34,59,0.15);
    margin: 0;
  }
  th, td {
    padding: 14px 10px;
    border-bottom: 1px solid #4a4e69;
    text-align: center;
    font-size: 15px;
    vertical-align: middle;
    color: #f2e9e4;
    word-break: break-word;
  }
  th {
    background: #4a4e69;
    color: #f2e9e4;
    font-weight: 700;
    letter-spacing: 0.5px;
    font-size: 16px;
    border-bottom: 2px solid #9a8c98;
  }
  tr:last-child td {
    border-bottom: none;
  }
  img.cat-img {
    border-radius: 8px;
    box-shadow: 0 1px 4px rgba(34,34,59,0.18);
    width: 70px;
    height: 70px;
    object-fit: cover;
    background: #22223b;
    border: 2px solid #9a8c98;
  }
  .page-header {
    margin-bottom: 0;
  }
  </style>
</head>
<body>
  @include('admin.header')
  @include('admin.sidebar')
  <div class="page-content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="responsive-table-container" style="width:100%;overflow-x:auto;margin:0 auto 32px auto;background:transparent;">
        <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Cat Name</th>
                    <th>Cat Age</th>
                    <th>CatSex</th>
                    <th>Breed</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>

                </tr>
                @foreach($data as $order )
                <tr>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->cat_name }}</td>
                    <td>{{ $order->cat_age }}</td>
                    <td>{{ $order->cat_sex }}</td>
                    <td>{{ $order->cat_breed }}</td>
                    <td>
                      @if(!empty($order->cat_image))
                        <img class="cat-img" src="{{ asset('cat_img/'.$order->cat_image) }}" alt="Cat Image">
                      @else
                        <span style="color:#e07a5f; font-size:14px;">No image</span>
                      @endif
                    </td>
                    <td>{{ $order->delivery_status }}</td>

                    <td>
                        <div style="display:flex; flex-wrap:wrap; gap:6px; justify-content:center;">
                          <a onclick="return confirm('Are you sure you want to change the status?')" class="btn btn-info btn-sm" href="{{url('on_the_way/'.$order->id)}}">On the way</a>
                          <a onclick="return confirm('Are you sure you want to change the status?')" class="btn btn-warning btn-sm" href="{{url('delivered/'.$order->id)}}">Delivered</a>
                          <a onclick="return confirm('Are you sure you want to change the status?')" class="btn btn-danger btn-sm" href="{{url('cancel/'.$order->id)}}">Cancel</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
  
  @include('admin.js')
</body>
</html>


    
