

<?php $__env->startSection('content'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> সমস্ত গ্রাম</h1>
      
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <!--<li class="breadcrumb-item">Tables</li>-->
      <li class="breadcrumb-item active"><a href="#">সমস্ত গ্রাম</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <a href="<?php if(Auth::user()->is_admin==1): ?><?php echo e(route('admin.add-village')); ?> <?php elseif(Auth::user()->is_admin==2): ?> <?php echo e(route('add-village')); ?> <?php endif; ?>" class="btn btn-sm btn-success mb-2 float-right">গ্রাম যোগ করুন</a>
          <div class="table-responsive">
            
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>জেলা</th>
                  <th>উপজেলা</th>
                  <th>ইউনিয়ন</th>
                  <th>গ্রামের নাম (ইংরেজি)</th>
                  <th>গ্রামের নাম (বাংলা)</th>
                  
                  <th>সম্পাদন</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                if(!empty($item->district_id)){
                  $districts = App\Models\DistrictInfo::where('id', $item->district_id)->first()->district_name_bangla;
                }else{
                  $districts ='কোন তথ্য নেই';
                }
                if(!empty($item->upazila_id)){
                  $upazilas = App\Models\UpazilaInfo::where('id', $item->upazila_id)->first()->upazila_name_bangla;
                }else{
                  $upazilas ='কোন তথ্য নেই';
                }
                if(!empty($item->union_id)){
                  $unions = App\Models\UnionInfo::where('id', $item->union_id)->first()->union_name_bangla;
                }else{
                  $unions = 'কোন তথ্য নেই';
                }
                ?>
                <tr>
                  <td><?php echo e($districts); ?></td>
                  <td><?php echo e($upazilas); ?></td>
                  <td><?php echo e($unions); ?></td>
                  <td><?php echo e($item->village_name); ?></td>
                  <td><?php echo e($item->village_name_bangla); ?></td>
                  
                  <td><a href="<?php if(Auth::user()->is_admin==1): ?><?php echo e(route('admin.edit-village', encrypt($item->id))); ?> <?php elseif(Auth::user()->is_admin==2): ?> <?php echo e(route('edit-village', encrypt($item->id))); ?> <?php endif; ?>">এডিট করুন</a></td>
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
        $("#village").addClass('active');
        $("#village").addClass('is-expanded');
    });
</script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\XAMPP8.27\htdocs\laravel\survay\resources\views/common/all_village.blade.php ENDPATH**/ ?>