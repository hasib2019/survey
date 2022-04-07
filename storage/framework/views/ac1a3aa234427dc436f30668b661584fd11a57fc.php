

<?php $__env->startSection('content'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> সুবিধাবঞ্চিতের ধরণ অনুযায়ী তালিকা</h1>
      
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <!--<li class="breadcrumb-item">Tables</li>-->
      <li class="breadcrumb-item active"><a href="#">সুবিধাবঞ্চিতের ধরণ অনুযায়ী তালিকা</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
            
            <form class="form-inline" action="<?php if(Auth::user()->is_admin==1): ?><?php echo e(route('admin.dis_list.serch')); ?> <?php elseif(Auth::user()->is_admin==2): ?> <?php echo e(route('dis_list.serch')); ?> <?php endif; ?>" method="get">
              <?php echo csrf_field(); ?>
              <div class="form-group mb-2">
                <label for="staticEmail2" class="form-control-plaintext">সুবিধাবঞ্চিতের ধরণ অনুযায়ী তালিকা নির্বাচন করুন</label>
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <select name="disadvantages_types" id="" class="for form-control">
                  <option value="">-----সিলেক্ট করুন------</option>
                  <option value="বিধবা">বিধবা</option>
                  <option value="তালাকপ্রাপ্ত">তালাকপ্রাপ্ত</option>
                  <option value="স্বামী পরিত্যক্তা">স্বামী পরিত্যক্তা</option>
                  <option value="ক্ষুদ্র নৃ-গোষ্ঠী">ক্ষুদ্র নৃ-গোষ্ঠী</option>
                  <option value="বেকার">বেকার</option>
                  <option value="অসচ্ছল">অসচ্ছল</option>
                  <option value="অন্যের আয়ের উপর নির্ভরশীল">অন্যের আয়ের উপর নির্ভরশীল</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary mb-2">অনুসন্ধান করুন</button>
            </form>
          
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>নাম</th>
                  <th>মাতার নাম</th>
                  <th>পিতার/স্বামীর নাম</th>
                  <th>মুঠোফোন</th>
                  <th>এনআইডি</th>
                  <th>সুবিধাবঞ্চিতের ধরণ</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $all_ben; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($item->name); ?></td>
                  <td><?php echo e($item->mother_name); ?></td>
                  <td><?php echo e($item->father_name); ?></td>
                  <td><?php echo e($item->mobile); ?></td>
                  <td><?php echo e($item->nid); ?></td>
                  <td><?php echo e($item->disadvantages_types); ?>

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
        $("#dis_search").addClass('active');
        $("#report").addClass('is-expanded');
    });
</script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hasilcop/pgdit.hasibuzzaman.com/resources/views/common/dis_serch.blade.php ENDPATH**/ ?>