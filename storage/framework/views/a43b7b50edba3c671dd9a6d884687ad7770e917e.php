

<?php $__env->startSection('content'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> গ্রাম ভিত্তিক সুবিধাভোগী</h1>
      
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <!--<li class="breadcrumb-item">Tables</li>-->
      <li class="breadcrumb-item active"><a href="#">গ্রাম ভিত্তিক সুবিধাভোগী</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <a href="<?php echo e(route('village-excel')); ?>" class="btn btn-dark mb-2 float-right">Download Excel</a>
        <div class="tile-body">
            
            <form class="form-inline" action="<?php if(Auth::user()->is_admin==1): ?><?php echo e(route('admin.village.serch')); ?> <?php elseif(Auth::user()->is_admin==2): ?> <?php echo e(route('village.serch')); ?> <?php endif; ?>" method="get">
              <?php echo csrf_field(); ?>
              
              <div class="form-group mx-sm-2 mb-2 col-2">
                <label for="inputEmail4">জেলা:</label>
                <select id="demoSelect" class="form-control">
                  <option value="">--সিলেক্ট করুন--</option>
                  <?php $__currentLoopData = $district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $districts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($districts->id); ?>"><?php echo e($districts->district_name_bangla); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="form-group mx-sm-2 mb-2 col-2">
                <label>উপজেলা:</label>
                <select id="upazila" class="form-control">
                  <option value="">--সিলেক্ট করুন--</option>
                </select>
              </div>
              <div class="form-group mx-sm-2 mb-2 col-2">
                <label for="inputEmail4">ইউনিয়ন:</label>
                <select id="union" class="form-control" required>
                  <option value="">--সিলেক্ট করুন--</option>
                </select>
              </div>
              <div class="form-group mx-sm-2 mb-2 col-2">
                <label>গ্রাম:</label>
                <select name="id" id="villageall" class="form-control">
                  <option value="">--সিলেক্ট করুন--</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary col-2 mb-2 mt-3 ml-2">অনুসন্ধান করুন</button>
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
    $("#demoSelect").on('change',function(e){
    e.preventDefault();
    var ddlthana=$("#upazila");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type:'POST',
      url: "<?php echo e(url('/upazila-by-district')); ?>",
      data:{_token:$('input[name=_token]').val(),districts:$(this).val()},
      success:function(response){
          // var jsonData=JSON.parse(response);
          $('option', ddlthana).remove();
          $('#upazila').append('<option value="">--সিলেক্ট করুন--</option>');
          $.each(response, function(){
            $('<option/>', {
              'value': this.id,
              'text': this.upazila_name_bangla
            }).appendTo('#upazila');
          });
        }
      });
  });

  $("#upazila").on('change',function(e){
    e.preventDefault();
    var ddlship=$("#union");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type:'POST',
      url: "<?php echo e(url('/unions-by-upazila')); ?>",
      data:{_token:$('input[name=_token]').val(),upazilas:$(this).val()},
      success:function(response){
          $('option', ddlship).remove();
          $('#union').append('<option value="">--সিলেক্ট করুন--</option>');
          $.each(response, function(){
            $('<option/>', {
              'value': this.id,
              'text': this.union_name_bangla
            }).appendTo('#union');
          });
        }
      });
  });

  $("#union").on('change',function(e){
    e.preventDefault();
    var ddlvil=$("#villageall");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type:'POST',
      url: "<?php echo e(url('/village-by-union')); ?>",
      data:{_token:$('input[name=_token]').val(),unions:$(this).val()},
      success:function(response){
          $('option', ddlvil).remove();
          $('#villageall').append('<option value="">--সিলেক্ট করুন--</option>');
          $.each(response, function(){
            $('<option/>', {
              'value': this.id,
              'text': this.village_name_bangla
            }).appendTo('#villageall');
          });
        }
      });
  });
    // active 
  $(document).ready(function() {
        $("#village_search").addClass('active');
        $("#report").addClass('is-expanded');
    });
</script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hasilcop/pgdit.hasibuzzaman.com/resources/views/common/village_serch.blade.php ENDPATH**/ ?>