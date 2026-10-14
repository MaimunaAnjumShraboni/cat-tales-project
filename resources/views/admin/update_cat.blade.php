<!DOCTYPE html>
<html>
<head>
<base href="/public">
  @include('admin.css')
  <style>
    label
    {
        display: inline-block;
        width: 200px;
        color:skyblue

    }
    .div_beg
    {
        padding:10px;
    }
   </style>

</head>
<body>
  @include('admin.header')
  @include('admin.sidebar')
  <div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
        <h1>Update Cat</h1>
        <form action="{{url('edit_cat', $cat->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="div_deg">
                <label for="">Cat Name</label>
                <input type="text" name="name" value="{{$cat->name}}">
            </div>

            <div class="div_deg">
                <label for="">Age</label>
                <input type="text" name="age" value="{{$cat->age}}">
            </div>

            <div class="div_deg">
                <label for="">Sex</label>
                <input type="text" name="sex" value="{{$cat->sex}}">
            </div>

            <div class="div_deg">
                <label for="">Breed</label>
                <input type="text" name="breed" value="{{$cat->breed}}">
            </div>

            <div class="div_deg">
                <label for="">Description</label>
<textarea name="description">{{$cat->description}}</textarea>
            </div>

            <div class="div_deg">
                <label for="">Current Image</label>
                <img width="150" src="{{ asset('cat_img/' . $cat->img) }}" alt="{{ $cat->name }}">
            </div>

            <div class="div_deg">
                <label for="">Vaccinated</label>
                <select name="vaccinated">
                    <option value="1" {{ $cat->vaccinated == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $cat->vaccinated == 0 ? 'selected' : '' }}>No</option>
                </select>
                
            </div>

            <div class="div_deg">
                <label for="">Availability</label>
                <input type="text" name="availability" value="{{$cat->availability}}">
            </div>

            <div class="div_deg">
                <label for="">Change Image</label>
                <input type="file" name="image">

            </div>

            <div class="div_deg">
                <input type="submit" class="btn btn-primary" value="Update Cat">

            
    
        </form>


  @include('admin.js')
</body>
</html>


    
