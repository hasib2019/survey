<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!--<title><?php echo e(config('app.name', 'Era Enfotech')); ?></title>-->
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
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  </head>
  <body class="app sidebar-mini">
    <?php echo $__env->make('sweet::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" style="font-size: 14px;" href="<?php echo e(route('home')); ?>">
      <img src="<?php echo e(asset('images/govt1.png')); ?>" style="height: 30px; margin-top: -9px;" alt="">
      পল্লী উন্নয়ন ও সমবায় বিভাগ</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        
        <!--Notification Menu-->
        
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            
            <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i><?php echo e(__('প্রস্থান')); ?></a>
             <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
             </form>
            </li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo e(asset('images/user.jpg')); ?>" height="50px" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo e(Auth::user()->name); ?></p>
          <p class="app-sidebar__user-designation"><?php echo e(Auth::user()->email); ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <?php if(Auth::user()->is_admin==1): ?>
        <li><a class="app-menu__item" href="<?php echo e(route('home')); ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">ড্যাশবোর্ড</span></a></li>
        <li><a class="app-menu__item addvillage user" href="<?php echo e(route('view.user')); ?>" id="user"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">ব্যবহারকারী</span></a></li>
        <li><a class="app-menu__item addvillage" href="<?php echo e(route('admin.all-village')); ?>" id="village"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">গ্রাম যোগ করুন</span></a></li>
        <li><a class="app-menu__item" href="<?php echo e(route('admin.survay.create')); ?>" id="add_from"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">সুবিধাভোগী যোগ করুন</span></a></li>
        
        <li class="treeview" id="report"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">রিপোর্ট</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo e(route('admin.all_beneficiaries')); ?>" id="reports"><i class="icon fa fa-users"></i> উপকারভোগীর তালিকা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('admin.village_list')); ?>" rel="noopener" id="village_search"><i class="icon fa fa-user"></i> গ্রামওয়ারী তালিকা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('admin.union_list')); ?>" id="union_search"><i class="icon fa fa-user"></i> ইউনিয়নওয়ারী তালিকা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('admin.dis_list')); ?>" id="dis_search"><i class="icon fa fa-user"></i> সুবিধাবঞ্চিতের ধরণ অনুযায়ী তালিকা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('admin.male_list')); ?>" id="male_search"><i class="icon fa fa-male"></i> পুরুষ ভিত্তিক তালিকা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('admin.female_list')); ?>" id="female_search"><i class="icon fa fa-female"></i> মহিলা ভিত্তিক তালিকা</a></li>
          </ul>
        </li>
        
        <li class="treeview" id="recover"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-recycle"></i><span class="app-menu__label">রিকোভারি</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo e(route('admin.delete.recovery', 1)); ?>" id="deletes"><i class="icon fa fa-trash"></i> ডিলিট ডাটা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('admin.archive.recovery', 2)); ?>" rel="archives" id="archives"><i class="icon fa fa-archive"></i> আর্কাইভ ডাটা</a></li>
          </ul>
        </li>
            
            <?php elseif(Auth::user()->is_admin==2): ?>
        <li><a class="app-menu__item" href="<?php echo e(route('home')); ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">ড্যাশবোর্ড</span></a></li>
        <li><a class="app-menu__item addvillage" href="<?php echo e(route('all-village')); ?>" id="village"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">গ্রাম যোগ করুন</span></a></li>
        <li><a class="app-menu__item" href="<?php echo e(route('survay.create')); ?>" id="add_from"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">সুবিধাভোগী যোগ করুন</span></a></li>

        <li class="treeview" id="report"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">রিপোর্ট</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo e(route('all_beneficiaries')); ?>" id="reports"><i class="icon fa fa-users"></i>উপকারভোগীর তালিকা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('village_list')); ?>" rel="noopener" id="village_search"><i class="icon fa fa-user"></i> গ্রামওয়ারী তালিকা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('union_list')); ?>" id="union_search"><i class="icon fa fa-user"></i> ইউনিয়নওয়ারী তালিকা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('dis_list')); ?>" id="dis_search"><i class="icon fa fa-user"></i> সুবিধাবঞ্চিতের ধরণ অনুযায়ী তালিকা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('male_list')); ?>" id="male_search"><i class="icon fa fa-male"></i> পুরুষ ভিত্তিক তালিকা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('female_list')); ?>" id="female_search"><i class="icon fa fa-female"></i> মহিলা ভিত্তিক তালিকা</a></li>
          </ul>
        </li>
            <?php elseif(Auth::user()->is_admin==0): ?>
        <li><a class="app-menu__item" href="<?php echo e(route('home')); ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">ড্যাশবোর্ড</span></a></li>
     
        <li class="treeview" id="report"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">রিপোর্ট</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo e(route('user.all_beneficiaries')); ?>" id="reports"><i class="icon fa fa-users"></i>উপকারভোগীর তালিকা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('user.village_list')); ?>" rel="noopener" id="village_search"><i class="icon fa fa-user"></i> গ্রামওয়ারী তালিকা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('user.union_list')); ?>" id="union_search"><i class="icon fa fa-user"></i> ইউনিয়নওয়ারী তালিকা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('user.dis_list')); ?>" id="dis_search"><i class="icon fa fa-user"></i> সুবিধাবঞ্চিতের ধরণ অনুযায়ী তালিকা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('user.male_list')); ?>" id="male_search"><i class="icon fa fa-male"></i> পুরুষ ভিত্তিক তালিকা</a></li>
            <li><a class="treeview-item" href="<?php echo e(route('user.female_list')); ?>" id="female_search"><i class="icon fa fa-female"></i> মহিলা ভিত্তিক তালিকা</a></li>
          </ul>
        </li>
        <?php endif; ?>
          
          <li><a class="app-menu__item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">প্রস্থান</span></a>
          </li>
        
      </ul>
    </aside>
    <?php echo $__env->yieldContent('content'); ?>
     <!-- Essential javascripts for application to work-->

     <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
     <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
     <script src="<?php echo e(asset('js/main.js')); ?>"></script>
     <!-- The javascript plugin to display page loading on top-->
     <script src="<?php echo e(asset('js/plugins/pace.min.js')); ?>"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="<?php echo e(asset('js/plugins/bootstrap-datepicker.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/plugins/select2.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/plugins/dropzone.js')); ?>"></script>
     <!-- Page specific javascripts-->
     <script type="text/javascript" src="<?php echo e(asset('js/plugins/chart.js')); ?>"></script>
     <script type="text/javascript" src="<?php echo e(asset('js/plugins/bootstrap-notify.min.js')); ?>"></script>
     <script type="text/javascript" src="<?php echo e(asset('js/plugins/jquery.dataTables.min.js')); ?>"></script>
     <script type="text/javascript" src="<?php echo e(asset('js/plugins/dataTables.bootstrap.min.js')); ?>"></script>
     <script type="text/javascript">$('#sampleTable').DataTable();</script>


     <?php echo $__env->yieldContent('script'); ?>
    </body>
    </html>
<?php /**PATH /home/hasilcop/pgdit.hasibuzzaman.com/resources/views/layouts/admin.blade.php ENDPATH**/ ?>