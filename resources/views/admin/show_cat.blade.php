<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: auto;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #2c3e50;
        }
        th {
            background-color: #2c3e50;
            color: #fff;
            font-size: 1.1em;
            letter-spacing: 1px;
        }
        td {
            background-color: #f4f6fa;
            color: #222;
        }
        tr:nth-child(even) td {
            background-color: #e9eef5;
        }
        h1 {
            color: #2c3e50;
            text-shadow: 1px 1px 2px #e9eef5;
        }
    </style>
</head>
<body>
  @include('admin.header')
  @include('admin.sidebar')
  <div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
        <h1>All Cats</h1>
        <div>
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
                <th>Delete</th>
                <th>Update</th>
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
               
                <td><a class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')" href="{{ url('delete_cat', $cat->id) }}">Delete</a></td>
                <td><a class="btn btn-warning" href="{{ url('update_cat', $cat->id) }}">Update</a></td>
            </tr>
            @endforeach

        </table>
        </div>

        </div>
    </div>

  </div>
  @include('admin.js')
</body>
</html>


    
