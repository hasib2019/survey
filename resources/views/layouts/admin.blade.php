<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Era Enfotech') }}</title>-->
    <title>দুগ্ধ ও মাংস উৎপাদনের মাধ্যমে গ্রামীণ কর্মসংস্থান সৃষ্টির লক্ষ্যে
                  যশোর ও মেহেরপুর জেলায় সমবায় কার্যক্রম বিস্তৃতকরণ</title>
    <!-- Twitter meta-->
    <meta property="twitter:card" content="hasibuzzaman">
    <meta property="twitter:site" content="@hasibuzzaman">
    <meta property="twitter:creator" content="@hasibuzzaman">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://hasib.club">
    <meta property="og:image" content="http://hasib.club/hasib.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
    {{-- sweet alart  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  </head>
  <body class="app sidebar-mini">
    @include('sweet::alert')
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" style="font-size: 14px;" href="{{route('home')}}">
      <img src="{{asset('images/govt1.png')}}" style="height: 30px; margin-top: -9px;" alt="">
      পল্লী উন্নয়ন ও সমবায় বিভাগ</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        {{-- <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li> --}}
        <!--Notification Menu-->
        {{-- <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div></a></li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li> --}}
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            {{-- <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li> --}}
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i>{{ __('প্রস্থান') }}</a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
             </form>
            </li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset('images/user.jpg')}}" height="50px" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
          <p class="app-sidebar__user-designation">{{Auth::user()->email}}</p>
        </div>
      </div>
      <ul class="app-menu">
        @if (Auth::user()->is_admin==1)
        <li><a class="app-menu__item" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">ড্যাশবোর্ড</span></a></li>
        <li><a class="app-menu__item addvillage user" href="{{ route('view.user') }}" id="user"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">ব্যবহারকারী</span></a></li>
        <li><a class="app-menu__item addvillage" href="{{ route('admin.all-village') }}" id="village"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">গ্রাম যোগ করুন</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.survay.create') }}" id="add_from"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">সুবিধাভোগী যোগ করুন</span></a></li>
        
        <li class="treeview" id="report"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">রিপোর্ট</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('admin.all_beneficiaries')}}" id="reports"><i class="icon fa fa-users"></i> উপকারভোগীর তালিকা</a></li>
            <li><a class="treeview-item" href="{{route('admin.village_list')}}" rel="noopener" id="village_search"><i class="icon fa fa-user"></i> গ্রামওয়ারী তালিকা</a></li>
            <li><a class="treeview-item" href="{{route('admin.union_list')}}" id="union_search"><i class="icon fa fa-user"></i> ইউনিয়নওয়ারী তালিকা</a></li>
            <li><a class="treeview-item" href="{{route('admin.dis_list')}}" id="dis_search"><i class="icon fa fa-user"></i> সুবিধাবঞ্চিতের ধরণ অনুযায়ী তালিকা</a></li>
            <li><a class="treeview-item" href="{{route('admin.male_list')}}" id="male_search"><i class="icon fa fa-male"></i> পুরুষ ভিত্তিক তালিকা</a></li>
            <li><a class="treeview-item" href="{{route('admin.female_list')}}" id="female_search"><i class="icon fa fa-female"></i> মহিলা ভিত্তিক তালিকা</a></li>
          </ul>
        </li>
        {{-- archive data  --}}
        <li class="treeview" id="recover"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-recycle"></i><span class="app-menu__label">রিকোভারি</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('admin.delete.recovery', 1)}}" id="deletes"><i class="icon fa fa-trash"></i> ডিলিট ডাটা</a></li>
            <li><a class="treeview-item" href="{{route('admin.archive.recovery', 2)}}" rel="archives" id="archives"><i class="icon fa fa-archive"></i> আর্কাইভ ডাটা</a></li>
          </ul>
        </li>
            {{-- admin dashboard  --}}
            @elseif(Auth::user()->is_admin==2)
        <li><a class="app-menu__item" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">ড্যাশবোর্ড</span></a></li>
        <li><a class="app-menu__item addvillage" href="{{ route('all-village') }}" id="village"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">গ্রাম যোগ করুন</span></a></li>
        <li><a class="app-menu__item" href="{{ route('survay.create') }}" id="add_from"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">সুবিধাভোগী যোগ করুন</span></a></li>

        <li class="treeview" id="report"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">রিপোর্ট</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('all_beneficiaries')}}" id="reports"><i class="icon fa fa-users"></i>উপকারভোগীর তালিকা</a></li>
            <li><a class="treeview-item" href="{{route('village_list')}}" rel="noopener" id="village_search"><i class="icon fa fa-user"></i> গ্রামওয়ারী তালিকা</a></li>
            <li><a class="treeview-item" href="{{route('union_list')}}" id="union_search"><i class="icon fa fa-user"></i> ইউনিয়নওয়ারী তালিকা</a></li>
            <li><a class="treeview-item" href="{{route('dis_list')}}" id="dis_search"><i class="icon fa fa-user"></i> সুবিধাবঞ্চিতের ধরণ অনুযায়ী তালিকা</a></li>
            <li><a class="treeview-item" href="{{route('male_list')}}" id="male_search"><i class="icon fa fa-male"></i> পুরুষ ভিত্তিক তালিকা</a></li>
            <li><a class="treeview-item" href="{{route('female_list')}}" id="female_search"><i class="icon fa fa-female"></i> মহিলা ভিত্তিক তালিকা</a></li>
          </ul>
        </li>
            @elseif(Auth::user()->is_admin==0)
        <li><a class="app-menu__item" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">ড্যাশবোর্ড</span></a></li>
     
        <li class="treeview" id="report"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">রিপোর্ট</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('user.all_beneficiaries')}}" id="reports"><i class="icon fa fa-users"></i>উপকারভোগীর তালিকা</a></li>
            <li><a class="treeview-item" href="{{route('user.village_list')}}" rel="noopener" id="village_search"><i class="icon fa fa-user"></i> গ্রামওয়ারী তালিকা</a></li>
            <li><a class="treeview-item" href="{{route('user.union_list')}}" id="union_search"><i class="icon fa fa-user"></i> ইউনিয়নওয়ারী তালিকা</a></li>
            <li><a class="treeview-item" href="{{route('user.dis_list')}}" id="dis_search"><i class="icon fa fa-user"></i> সুবিধাবঞ্চিতের ধরণ অনুযায়ী তালিকা</a></li>
            <li><a class="treeview-item" href="{{route('user.male_list')}}" id="male_search"><i class="icon fa fa-male"></i> পুরুষ ভিত্তিক তালিকা</a></li>
            <li><a class="treeview-item" href="{{route('user.female_list')}}" id="female_search"><i class="icon fa fa-female"></i> মহিলা ভিত্তিক তালিকা</a></li>
          </ul>
        </li>
        @endif
          
          <li><a class="app-menu__item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">প্রস্থান</span></a>
          </li>
        
      </ul>
    </aside>
    @yield('content')
     <!-- Essential javascripts for application to work-->

     <script src="{{ asset('js/popper.min.js')}}"></script>
     <script src="{{ asset('js/bootstrap.min.js')}}"></script>
     <script src="{{ asset('js/main.js')}}"></script>
     <!-- The javascript plugin to display page loading on top-->
     <script src="{{ asset('js/plugins/pace.min.js')}}"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{ asset('js/plugins/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/dropzone.js')}}"></script>
     <!-- Page specific javascripts-->
     <script type="text/javascript" src="{{ asset('js/plugins/chart.js')}}"></script>
     <script type="text/javascript" src="{{ asset('js/plugins/bootstrap-notify.min.js')}}"></script>
     <script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js')}}"></script>
     <script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js')}}"></script>
     <script type="text/javascript">$('#sampleTable').DataTable();</script>


     @yield('script')
    </body>
    </html>
