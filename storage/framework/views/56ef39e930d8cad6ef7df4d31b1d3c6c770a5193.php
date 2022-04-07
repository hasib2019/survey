

<?php $__env->startSection('content'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> মহিলা সুবিধাভোগী</h1>
      
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <!--<li class="breadcrumb-item">Tables</li>-->
      <li class="breadcrumb-item active"><a href="#">মহিলা সুবিধাভোগী</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>নাম</th>
                  <th>মাতার নাম</th>
                  <th>পিতার/স্বামীর নাম</th>
                  <th>মুঠোফোন</th>
                  <th>এনআইডি</th>
                  <th>লিঙ্গ</th>
                  <th>ঠিকানা</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $all_ben; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                if(!empty($item->village)){
                  $village = App\Models\VillageInfo::where('id', $item->village)->first()->village_name_bangla;
                }else{
                  $village = 'Empty';
                }
                if(!empty($item->village)){
                  $unions = App\Models\UnionInfo::where('id', $item->unions)->first()->union_name_bangla;
                }else{
                  $unions = 'Empty';
                }
                if(!empty($item->village)){
                  $upazila = App\Models\UpazilaInfo::where('id', $item->upazilas)->first()->upazila_name_bangla;
                }else{
                  $upazila = 'Empty';
                }
                if(!empty($item->village)){
                  $district = App\Models\DistrictInfo::where('id', $item->district)->first()->district_name_bangla;
                }else{
                  $district = 'Empty';
                }
                ?>
                <tr>
                  <td><?php echo e($item->name); ?></td>
                  <td><?php echo e($item->mother_name); ?></td>
                  <td><?php echo e($item->father_name); ?></td>
                  <td><?php echo e($item->mobile); ?></td>
                  <td><?php echo e($item->nid); ?></td>
                  <td><?php if($item->gender=='f'): ?> মহিলা <?php endif; ?></td>
                  <td><?php echo e($village); ?>, <?php echo e($unions); ?>,<?php echo e($upazila); ?>, <?php echo e($district); ?></td>
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
    $('#unionsearch').select2();
    // active 
  $(document).ready(function() {
        $("#female_search").addClass('active');
        $("#report").addClass('is-expanded');
    });
</script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hasilcop/pgdit.hasibuzzaman.com/resources/views/common/female_serch.blade.php ENDPATH**/ ?>