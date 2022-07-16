<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
       
        
        @if (Route::has('login'))
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
        </div>
      @endif

      <!-- Sidebar Menu -->
      <nav class="mt-2 ">
        <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open text-center">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-table"></i>
              <p class="mr-3 p-5">
                Cuisine
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('menu.index') }}" class= "user-panel nav-link">
                
                  <p>Menu</p>
 
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('menu.create') }}" class ="  nav-link ">
                
                  <p>Ajouter</p>
                </a>
              </li>
              
              <li class="nav-item ">
                <a href="{{ route('plat.index') }}" class =" user-panel nav-link ">
                
                  <p>Plats</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('plat.create') }}" class ="  nav-link ">
                
                  <p>Ajouter</p>
                </a>
              </li>

              <li class="nav-item user-panel ">
                <a href="{{ route('type.index') }}" class ="  nav-link ">
                
                  <p>Types</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('type.create') }}" class ="  nav-link ">
                
                  <p>Ajouter</p>
                </a>
              </li>
             
            </ul>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>