<!DOCTYPE html>
<html>
<head>
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
        <form action="{{url('upload_cat')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="div_deg">
            <label for="">Cat Name</label>
            <input type="text" name="name"> 


            </div>
            <div class="div_deg">
            <label for="">Age</label>
            <input type="text" name="age"> 

            

            <div class="div_deg">
            <label for="sex">Sex</label>
            <select name="sex" id="sex" class="form-select">
               <option value="">-- Select --</option>
               <option value="male">Male</option>
               <option value="female">Female</option>
            </select>
            </div>


            </div>
            <div class="div_deg">
            <label for="">Breed</label>
            <input type="text" name="breed"> 

            </div>
            <div class="div_deg">
            <label for="">Description</label>
            <textarea name="description" cols="20" rows="5"></textarea>

            </div>
            <div class="div_deg">
            <label for="">Image</label>
            <input type="file" name="img"> 

            
            <div class="div_deg">
            <label for="vaccinated">Vaccinated</label>
            <select name="vaccinated" id="vaccinated" class="form-select">
               <option value="1">Yes</option>
               <option value="0">No</option>
            </select>
            </div>


            

            <div class="div_deg">
            <label for="availability">Availability</label>
            <select name="availability" id="availability" class="form-select">
               <option value="1">Yes</option>
               <option value="0">No</option>
            </select>
            </div>

            </div>
            <div class="div_deg">

            <input type="submit" value="Add Cat" class="btn btn-warning"> 


        </form>

        </div>
    </div>

  
  @include('admin.js')
</body>
</html>


    
