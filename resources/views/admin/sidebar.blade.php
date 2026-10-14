<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Maimuna</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{url('home')}}"> <i class="icon-home"></i>Home </a></li>
                
                <li><a href="{{url('requests')}}"> <i class="icon-padnote"></i>Cat-sitting Request </a></li>
                <li><a href="#exampledropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Manage Cat </a>
                  <ul id="exampledropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('add_cat')}}">Add Cat</a></li>
                    <li><a href="{{url('view_cat')}}">View Cat</a></li>
                    
                  </ul>
                </li>
                <li><a href="{{url('admin_gallery')}}"> <i class="icon-picture"></i>Gallery</a></li>
                <li><a href="{{url('orders')}}"> <i class="icon-logout"></i>Order</a></li>
        
      </nav>
      <!-- Sidebar Navigation end-->
