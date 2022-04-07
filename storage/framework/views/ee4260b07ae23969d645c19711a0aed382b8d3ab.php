

<?php $__env->startSection('content'); ?>
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i>গ্রাম সম্পাদনা করুনন</h1>
        
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <!--<li class="breadcrumb-item">Forms</li>-->
        <li class="breadcrumb-item"><a href="#">গ্রাম সম্পাদনা করুন</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <form action="<?php if(Auth::user()->is_admin==1): ?><?php echo e(route('admin.village_update')); ?> <?php elseif(Auth::user()->is_admin==2): ?> <?php echo e(route('village_update')); ?> <?php endif; ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" id="" value="<?php echo e($village->id); ?>" readonly>
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
                    <label for="inputEmail4">জেলা:</label>
                    <select name="district_id" id="demoSelect" class="form-control common" required>
                      <option value="">-----সিলেক্ট করুন------</option>
                      <?php $__currentLoopData = $district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $districts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($districts->id); ?>" <?php if($districts->id==$village->district_id): ?> selected <?php endif; ?>><?php echo e($districts->district_name_bangla); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>উপজেলা:</label>
                    <select name="upazilla_id" id="upazila" class="form-control" required>
                      <option value="">-----সিলেক্ট করুন------</option>
                      <?php $__currentLoopData = $upazila; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upazilas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($upazilas->id); ?>" <?php if($upazilas->id==$village->upazila_id): ?> selected <?php endif; ?>><?php echo e($upazilas->upazila_name_bangla); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">ইউনিয়ন:</label>
                    <select name="union_id" id="union" class="form-control" required>
                      <option value="">-----সিলেক্ট করুন------</option>
                      <?php $__currentLoopData = $union; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($unions->id); ?>" <?php if($unions->id==$village->union_id): ?> selected <?php endif; ?>><?php echo e($unions->union_name_bangla); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>village</label>
                    <input type="text" name="name" id="" value="<?php echo e($village->village_name); ?>" class="form-control" placeholder="ইংরেজিতে লিখুন">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>গ্রাম</label>
                    <input type="text" name="bn_name" id="" value="<?php echo e($village->village_name_bangla); ?>" class="form-control" placeholder="বাংলায় লিখুন">
                  </div>
                  <div class="form-group col-md-6">
                    <label>URL</label>
                    <input type="text" name="url" id="" value="<?php echo e($village->url); ?>" class="form-control" placeholder="Type url if exit">
                  </div>
                </div>
              </div>   
          </div>
          <div class="tile-footer">
            <button class="btn btn-primary" type="submit">জমা দিন</button>
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
          $('#upazila').append('<option value="">-----সিলেক্ট করুন------</option>');
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
          $('#union').append('<option value="">-----সিলেক্ট করুন------</option>');
          $.each(response, function(){
            $('<option/>', {
              'value': this.id,
              'text': this.union_name_bangla
            }).appendTo('#union');
          });
        }
      });
  });

  // active class 
  $(document).ready(function() {
        $(".addvillage").addClass('active');
        $("#village").addClass('is-expanded');
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hasilcop/pgdit.hasibuzzaman.com/resources/views/common/edit_village_from.blade.php ENDPATH**/ ?>