
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Projet</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effecet

  * sidebar-collapse
  * sidebar-mini
-->

      @php

        $userAlerts=\App\Models\Alert::where('user_id',Auth::user()->id)->orderBy('date','desc')->get();
        $userAlertsgroups=$userAlerts->groupBy('typealert');
        $NbreAlertsTotal=$userAlerts->count();
        $NbreAlertsNew=$userAlerts->where('etat','nonlu')->count();

      @endphp



<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}" class="nav-link">Dashboard</a>
      </li>
      
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
     <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          @if ($NbreAlertsTotal<>0)
            <span class="badge badge-warning navbar-badge">{{$NbreAlertsTotal}}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{$NbreAlertsTotal}} Alertes dont {{$NbreAlertsNew}} nouvelle(s)</span>
          
          @foreach ($userAlertsgroups as $group)
              <div class="dropdown-divider"></div>
              <a href="{{route('alerts',$group->first()->typealert)}}" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> {{$group->count()}} {{$group->first()->typealert}} 
                <span class="float-right text-muted text-sm">{{\Carbon\Carbon::parseFromLocale($group->first()->date)->diffForHumans()}}</span>
              </a>
          @endforeach
        
         
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Mon Profile</span>
          
             <div class="dropdown-divider"></div>

              <a href="{{route('profile')}}" class="dropdown-item">
                <i class="fas fa-info mr-2"></i>Mes informations  
              </a>

              <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;"> @csrf </form>
              <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
              </a>
         
         
        </div>
      </li>

      

      

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="{{route('dashboard')}}" class="brand-link text-center">
         <img src="{{asset('img/icone.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  
      <span class="brand-text font-weight-light">PROJET.TN</span>
    </a>

   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('img/employe.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('profile')}}" class="d-block">{{\Auth::user()->name}}</a>
        </div>
      </div>

      



      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          @if (Auth::user()->hasRole(['admin']))
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Administration
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                 

                 

                     <li class="nav-item">
                      <a href="{{route('adminShowSecurites')}}" class="nav-link">
                        <i class="fas fa-exclamation-triangle  nav-icon"></i>
                        <p>Sécurite</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{route('adminShowUsers')}}" class="nav-link">
                        <i class="fas fa-users-cog nav-icon"></i>
                        <p>Employés</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('adminShowRoles')}}" class="nav-link">
                        <i class="fas fa-user-tag nav-icon"></i>
                        <p>Rôles</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="{{route('adminShowNotes')}}" class="nav-link">
                        <i class="fas fa-info nav-icon"></i><p>Notes</p>
                      </a>
                    </li>

                     <li class="nav-item">
                      <a href="{{route('adminShowProduits')}}" class="nav-link">
                        <i class="fas fa-info nav-icon"></i><p>Produits</p>
                      </a>
                    </li>
                    
                   
               
              </ul>
            </li>

            
          @endif 


         

           
            

         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @include ('message')