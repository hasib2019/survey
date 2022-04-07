

<?php $__env->startSection('content'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> ব্যবহারকারীর তালিকা</h1>
      
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active"><a href="#"> ব্যবহারকারীর তালিকা</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <a href="<?php echo e(route('add.user')); ?>" class="btn btn-sm btn-success mb-2 float-right">নতুন ব্যবহারকারী যোগ করুন</a>
        <div class="tile-body">

          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable" style="font-size: 16">
              <thead>
                <tr>
                  <th>নাম</th>
                  <th>ই-মেইল</th>
                  <th>ব্যবহারকারীর নাম</th>
                  <th>রোল</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($item->name); ?></td>
                  <td><?php echo e($item->email); ?></td>
                  <td><?php echo e($item->user_name); ?></td>
                  <td><?php if($item->is_admin==1): ?> Super Admin <?php elseif($item->is_admin==2): ?> Admin <?php else: ?> User <?php endif; ?></td>
                 
                </tr> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
                
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

  <script>
    // active 
  $(document).ready(function() {
        $("#user").addClass('active');
    });
</script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hasilcop/pgdit.hasibuzzaman.com/resources/views/admin/user_view.blade.php ENDPATH**/ ?>