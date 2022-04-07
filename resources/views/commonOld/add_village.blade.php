@extends('layouts.admin')

@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i>গ্রাম যোগ করুন</h1>
        {{-- <p>Bootstrap default form components</p> --}}
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item"><a href="#">গ্রাম যোগ করুন</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <form action="@if (Auth::user()->is_admin==1){{ route('admin.village_add') }} @elseif(Auth::user()->is_admin==2) {{ route('village_add') }} @endif" method="post">
            @csrf
          <div class="row">
            <div class="col-lg-12" style="text-align: center">
              <h4>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</h4>
              <h5>প্রকল্প পরিচালক-এর কার্যালয়</h5>
              <p>“দুগ্ধ ও মাংস উৎপাদনের মাধ্যমে গ্রামীণ কর্মসংস্থান সৃষ্টির লক্ষ্যে যশোর ও মেহেরপুর জেলায় সমবায় কার্যক্রম বিস্তৃতকরণ” শীর্ষক প্রকল্প বিভাগীয় সমবায় কার্যালয়, খুলনা।</p>
              <hr>
            </div>
              {{-- district section --}}
              <div class="col-lg-12 border">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">জেলা:</label>
                    <select name="district_id" id="demoSelect" class="form-control common" required>
                      <option value="">-----সিলেক্ট করুন------</option>
                      @foreach ($district as $districts)
                      <option value="{{$districts->id}}">{{$districts->district_name_bangla}}</option>
                      @endforeach
                      
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>উপজেলা:</label>
                    <select name="upazilla_id" id="upazila" class="form-control" required>
                      <option value="">-----সিলেক্ট করুন------</option>
                    </select>
                  </div>
                  
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">ইউনিয়ন:</label>
                    <select name="union_id" id="union" class="form-control" required>
                      <option value="">-----সিলেক্ট করুন------</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>village</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="ইংরেজিতে লিখুন" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>গ্রাম</label>
                    <input type="text" name="bn_name" id="" class="form-control" placeholder="বাংলায় লিখুন" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>URL</label>
                    <input type="text" name="url" id="" class="form-control" placeholder="Type url if exit">
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
@endsection
@section('script')
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
    var ddlship=$("#union");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type:'POST',
      url: "{{url('/upazila-by-district')}}",
      data:{_token:$('input[name=_token]').val(),districts:$(this).val()},
      success:function(response){
          // var jsonData=JSON.parse(response);
          $('option', ddlthana).remove();
          // $('#upazila').append('<option value="">-----সিলেক্ট করুন------</option>');
         
          $.each(response, function(){
            this.upazilaId = this.id;
            console.log(this.upazilaId)
            $('<option/>', {
              'value': this.id,
              'text': this.upazila_name_bangla
            }).appendTo('#upazila');
            /////////////////////////////////////////////////////////////
            $.ajax({
              type:'POST',
              url: "{{url('/unions-by-upazila')}}",
              data:{_token:$('input[name=_token]').val(),upazilas: this.id},
              success:function(response){
                  $('option', ddlship).remove();
                  // $('#union').append('<option value="">-----সিলেক্ট করুন------</option>');
                  $.each(response, function(){
                    $('<option/>', {
                      'value': this.id,
                      'text': this.union_name_bangla
                    }).appendTo('#union');
                  });
                }
              });
          });
        }
      });
  });

  // $("#upazila").on('change',function(e){
  //   e.preventDefault();
  //   var ddlship=$("#union");
  //   $.ajaxSetup({
  //     headers: {
  //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //     }
  //   });
  //   $.ajax({
  //     type:'POST',
  //     url: "{{url('/unions-by-upazila')}}",
  //     data:{_token:$('input[name=_token]').val(),upazilas:$(this).val()},
  //     success:function(response){
  //         $('option', ddlship).remove();
  //         $('#union').append('<option value="">-----সিলেক্ট করুন------</option>');
  //         $.each(response, function(){
  //           $('<option/>', {
  //             'value': this.id,
  //             'text': this.union_name_bangla
  //           }).appendTo('#union');
  //         });
  //       }
  //     });
  // });

  // active class 
  $(document).ready(function() {
        $(".addvillage").addClass('active');
        $("#village").addClass('is-expanded');
    });
</script>
@endsection