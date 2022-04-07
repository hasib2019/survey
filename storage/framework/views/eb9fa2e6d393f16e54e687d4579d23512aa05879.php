

<?php $__env->startSection('content'); ?>
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i>নতুন ব্যবহারকারী ফরম</h1>
        
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item"><a href="#">নতুন ব্যবহারকারী ফরম</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <form action="<?php echo e(route('add.user.create')); ?>" method="post">
            <?php echo csrf_field(); ?>
          <div class="row">
            <div class="col-lg-12" style="text-align: center">
              <h4>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</h4>
              <h5>প্রকল্প পরিচালক-এর কার্যালয়</h5>
              <p>“দুগ্ধ ও মাংস উৎপাদনের মাধ্যমে গ্রামীণ কর্মসংস্থান সৃষ্টির লক্ষ্যে যশোর ও মেহেরপুর জেলায় সমবায় কার্যক্রম বিস্তৃতকরণ” শীর্ষক প্রকল্প বিভাগীয় সমবায় কার্যালয়, খুলনা।</p>
              <hr>
            </div>
              
              <div class="col-lg-12 border">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">নাম</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="নাম প্রবেশ করুন" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>ই-মেইল</label>
                    <input type="email" name="email" class="form-control" placeholder="ই-মেইল প্রবেশ করুন" id="" required>
                  </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">ব্যবহারকারীর নাম</label>
                  <input type="text" name="user_name" id="" class="form-control" placeholder="ব্যবহারকারীর নাম প্রবেশ করুন" required>
                </div>
                
                <div class="form-group col-md-6">
                  <label for="inputEmail4">পাসওয়ার্ড</label>
                  <input type="password" name="password" id="" class="form-control" placeholder="পাসওয়ার্ড প্রবেশ করুন">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">রোল</label>
                  <select name="role" class="form-control" id="role" required>
                    <option value="">----রোল সিলেক্ট করুন------</option>
                    <option value="1">Super Admin</option>
                    <option value="2">Admin</option>
                    <option value="0">User</option>
                  </select>
                </div>
              </div>
              </div>   
          </div>
          <div class="tile-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
  $('#demoDate').datepicker({
  format: "dd/mm/yyyy",
  autoclose: true,
  todayHighlight: true
});

</script>
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hasilcop/pgdit.hasibuzzaman.com/resources/views/admin/user.blade.php ENDPATH**/ ?>