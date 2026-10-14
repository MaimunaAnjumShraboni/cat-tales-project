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
    

  </style>
</head>
<body>
  @include('admin.header')
  @include('admin.sidebar')
  <div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
          <h2 class="font-weight-bold">Cat-sitting Requests</h2>
        </div>
    </div>
    <div class="page-body">
      <div class="container-fluid">
        <table class="table">
          <thead>
            <tr>
              
              <th>Email</th>
              <th>Breed</th>
              <th>Start_Date</th>
              <th>End_Date</th>
              <th>Action</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($book as $book)
              <tr>

                <td>{{ $book->email }}</td>
                <td>{{ $book->breed }}</td>
                <td>{{ $book->start_date }}</td>
                <td>{{ $book->end_date }}</td>
                <td>{{ $book->status }}</td>
        

                <td>
                        <div style="display:flex; flex-wrap:wrap; gap:6px; justify-content:center;">
                          <a onclick="return confirm('Are you sure you want to change the status?')" class="btn btn-info btn-sm" href="{{url('approve/'.$book->id)}}">Approve</a>

                          <a onclick="return confirm('Are you sure you want to change the status?')" class="btn btn-danger btn-sm" href="{{url('deny/'.$book->id)}}">Deny</a> 
                        </div>
                    </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @include('admin.js')
</body>
</html>







    
