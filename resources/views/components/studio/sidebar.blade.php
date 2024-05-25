 <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: black">
     <!-- Brand Logo -->
     <a href="{{ url('/') }}" class="brand-link" style="background-color: black">
         <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
         <span class="brand-text font-weight-light font-weight-bold">Youtube</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 {{-- <li class="nav-item menu-open">
                     <a href="{{ url('/studio') }}" class="nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>

                 </li> --}}
                 <li class="nav-item">
                     <a href="{{ url('/konten') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Konten

                         </p>
                     </a>
                 </li>

                 <hr class="dropdown-divider  "style="margin-top: 50vh;">



                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-info"></i>
                         <p>Setelan</p>
                     </a>
                 </li>
                

                 <hr class="dropdown-divider">
                 <li class="nav-item">
                     <div class="nav-link">
                         <p style="font-size: 12px;">Tentang Pers Hak cipt aHubungi kami Kreator Beriklan Developer <br>
                             Persyaratan Privasi Kebijakan & Keamanan Cara kerja YouTube Uji fitur baru</p>
                     </div>
                 </li>


             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
