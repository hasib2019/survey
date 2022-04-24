@extends('layouts.admin')

@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i>জরিপ ফর্ম</h1>
        {{-- <p>Bootstrap default form components</p> --}}
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">সুবিধাভোগী যোগ করুন</a></li>
      </ul>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <form action="@if (Auth::user()->is_admin==1){{ route('admin.survay.edit') }} @endif" method="post" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <img src="{{asset('images/govt1.png')}}" style="height: 79px; position: absolute; top: 5px; left: 7px;" alt="">
            <div class="col-lg-12" style="text-align: center">
              <h4>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</h4>
              <h5>প্রকল্প পরিচালক-এর কার্যালয়</h5>
              <p>“দুগ্ধ ও মাংস উৎপাদনের মাধ্যমে গ্রামীণ কর্মসংস্থান সৃষ্টির লক্ষ্যে যশোর ও মেহেরপুর জেলায় সমবায় কার্যক্রম বিস্তৃতকরণ” শীর্ষক প্রকল্প বিভাগীয় সমবায় কার্যালয়, খুলনা।</p>
              <hr>
            </div>
         {{-- district section --}}
        <div class="col-lg-12 border">
          <div class="form-row">
            <input type="hidden" readonly name="id" id="" value="{{$allSurveyData->id}}">
            <div class="form-group col-md-6">
              <label for="inputEmail4">জেলা:</label>
              <select name="district" id="demoSelect" class="form-control" required>
                <option value="">-----সিলেক্ট করুন------</option>
                @foreach ($district as $districts)
                <option value="{{$districts->id}}" @if($districts->id==$allSurveyData->district) selected @endif>{{$districts->district_name_bangla}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>উপজেলা:</label>
              
              <select name="upazilas" id="upazila" class="form-control" required>
                
                @php
                echo $upazilaAllData = App\Models\UpazilaInfo::where('district_id', $allSurveyData->district)->get();
                @endphp

                @foreach ($upazilaAllData as $disData)
                <option value="{{$disData->id}}" @if($disData->id==$allSurveyData->upazilas) selected @endif>{{$disData->upazila_name_bangla}}</option>
                @endforeach
              </select>
            </div>
           
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">ইউনিয়ন:</label>
              <select name="unions" id="union" class="form-control" required>
                <option value="">-----সিলেক্ট করুন------</option>
               @php
               echo $uionAllData = App\Models\UnionInfo::where('upazila_id', $allSurveyData->upazilas)->get();
               @endphp
               @foreach ($uionAllData as $uniData)
               <option value="{{$uniData->id}}" @if($uniData->id==$allSurveyData->unions) selected @endif>{{$uniData->union_name_bangla}}</option>
               @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>গ্রাম:</label>
              <select name="village" id="villageall" class="form-control">
                <option value="">-----সিলেক্ট করুন------</option>
                @php
               echo $villData = App\Models\VillageInfo::where('union_id', $allSurveyData->unions)->get();
               @endphp
               @foreach ($villData as $vilData)
               <option value="{{$vilData->id}}" @if($vilData->id==$allSurveyData->village) selected @endif>{{$vilData->village_name_bangla}}</option>
               @endforeach
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>তথ্য সংগ্রহকারীর নাম:</label>
              <input type="text" name="informer_name" id="" class="form-control" required placeholder="তথ্য সংগ্রহকারীর নাম" value="{{$allSurveyData->informer_name}}">
            </div>
            <div class="form-group col-md-6">
              <label>তথ্য সংগ্রহকারীর পদবি:</label>
              <input type="text" name="informer_designation" id="" class="form-control" required placeholder="তথ্য সংগ্রহকারীর পদবি" value="{{$allSurveyData->informer_designation}}">
            </div>
          </div>
        </div>
        {{-- district section --}}

        <div class="col-lg-12">
          <br>
          <h4 style="text-align: center">সুফলভোগী নির্বাচনের জরিপ প্রশ্নমালা</h4>
          <br>
          <h6>ব্যক্তিগত তথ্য</h6>
        </div>
        {{-- user info section --}}
        <div class="col-lg-12 border pt-1 pb-1">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">নাম:</label>
              <input type="text" name="name" id="" value="{{$allSurveyData->name}}" class="form-control" required placeholder="নাম">
            </div>
            <div class="form-group col-md-4">
              <label>পিতার/স্বামীর নাম:</label>
              <input type="text" name="father_name" id="" value="{{$allSurveyData->father_name}}" placeholder="পিতার/স্বামীর নাম" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">মাতার নাম:</label>
              <input type="text" name="mother_name" value="{{$allSurveyData->mother_name}}" class="form-control" required placeholder="মাতার নাম" id="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">মোবাইল নম্বর:</label>
              <input type="text" name="mobile" id="phone" value="{{$allSurveyData->mobile}}" class="form-control" required placeholder="মোবাইল নম্বর লিখুন">
              <span id="error_phone"></span>
            </div>
            <div class="form-group col-md-4">
              <label>জাতীয় পরিচয়পত্র নং:</label>
              <input type="text" name="nid" id="nid" value="{{$allSurveyData->nid}}" class="form-control" required placeholder="জাতীয় পরিচয়পত্র নং 123********">
              <span id="error_nid"></span>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">লিঙ্গ:</label>
              <select name="gender" id="" class="form-control" required>
                <option value="">-----সিলেক্ট করুন------</option>
                <option @if($allSurveyData->gender=='m') selected @endif value="m">পুরুষ</option>
                <option @if($allSurveyData->gender=='f') selected @endif value="f">মহিলা</option>
                <option @if($allSurveyData->gender=='o') selected @endif value="o">অন্যান্য</option>
              </select>
            </div>
          </div>
        </div>
        {{-- user info section --}}
        <div class="col-lg-12">
          <br>
          <h6>অন্যান্য তথ্য</h6>
        </div>
        {{-- other section --}}
        <div class="col-lg-12 border pt-1 pb-1">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputEmail4">হোল্ডিং নং:</label>
              <input type="text" name="holding" id="" value="{{$allSurveyData->holding}}" class="form-control" required placeholder="হোল্ডিং নং">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">জন্ম তারিখ:</label>
              <input type="text" name="dob" id="demoDate" value="{{$allSurveyData->dob}}" class="form-control" required placeholder="08/12/1991">
            </div>
            <div class="form-group col-md-4">
              <label>শিক্ষাগত যোগ্যতা:</label>
              <input type="text" name="edu_qualification" id="" placeholder="শিক্ষাগত যোগ্যতা" value="{{$allSurveyData->edu_qualification}}" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">পরিবারের সদস্য সংখ্যা:</label>
              <input type="text" name="family_member" value="{{$allSurveyData->family_member}}" id="family_member" class="form-control" required placeholder="পরিবারের সদস্য সংখ্যা" id="">
              <span id="error_family_member"></span>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">পরিবারের জমির পরিমাণ আবাদী(শতাংশ)?</label>
              <input type="text" name="land_percent_abadi" value="{{$allSurveyData->land_percent_abadi}}" id="land_percent_abadi" class="form-control" required placeholder="জমির পরিমাণ আবাদী(শতাংশ)?">
              <span id="error_land_percent_abadi"></span>
            </div>
            
            <div class="form-group col-md-4">
              <label for="inputEmail4">পরিবারের জমির পরিমাণ অনাবাদী(শতাংশ)?</label>
              <input type="text" name="land_percent_onabadi" value="{{$allSurveyData->land_percent_onabadi}}" id="land_percent_onabadi" class="form-control" required placeholder="জমির পরিমাণ অনাবাদী(শতাংশ)?">
              <span id="error_land_percent_onabadi"></span>
            </div>
            <div class="form-group col-md-4">
              <label>পরিবারে আয়ের উৎস:</label>
              <input type="text" name="family_income" id="" value="{{$allSurveyData->family_income}}" class="form-control" required placeholder="পরিবারে আয়ের উৎস">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>ব্যক্তিগত আয়ের উৎস:</label>
              <input type="text" name="personal_income" id="" class="form-control" required value="{{$allSurveyData->personal_income}}" placeholder="ব্যক্তিগত আয়ের উৎস">
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">বার্ষিক পারিবারিক আয়ের পরিমাণ</label>
              <input type="text" name="annual_income" value="{{$allSurveyData->annual_income}}" id="annual_income" class="form-control" required placeholder="বার্ষিক পারিবারিক আয়ের পরিমাণ">
              <span id="error_annual_income"></span>
            </div>
            <div class="form-group col-md-4">
              <label>ব্যক্তিগত আয়ের পরিমাণ:</label>
              <input type="text" name="amount_income" value="{{$allSurveyData->amount_income}}" id="amount_income" class="form-control" required placeholder="ব্যক্তিগত আয়ের পরিমাণ">
              <span id="error_amount_income"></span>
            </div>         
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">দেশী:</label>
              <input type="text" name="domestic_animal" value="{{$allSurveyData->domestic_animal}}" id="domestic_animal" class="form-control" required placeholder="দেশী গাভী/ষাঁড়ের সংখ্যা">
              <span id="error_domestic_animal"></span>
            </div>
            <div class="form-group col-md-4">
              <label>সংকর:</label>
              <input type="text" name="hybrid_animal" value="{{$allSurveyData->hybrid_animal}}" id="hybrid_animal" class="form-control" required placeholder="সংকর গাভী/ষাঁড়ের সংখ্যা">
              <span id="error_hybrid_animal"></span>
            </div>
            <div class="form-group col-md-4">
              <label>উন্নত জাত:</label>
              <input type="text" name="improved_varieties" value="{{$allSurveyData->improved_varieties}}" id="improved_varieties" class="form-control" required placeholder="উন্নত জাত গাভী/ষাঁড়ের সংখ্যা">
              <span id="error_improved_varieties"></span>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>আপনি গাভী/ষাঁড় পালন করেন কিনা?</label>
              <select name="animal_status" id="" class="for form-control">
                <option value="">-----সিলেক্ট করুন------</option>
                <option @if($allSurveyData->animal_status=='y') selected @endif value="y">হ্যাঁ</option>
                <option @if($allSurveyData->animal_status=='n') selected @endif value="n">না</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">আপনি গাভী/ষাঁড় পালনে আগ্রহী কিনা?</label>
              <select name="wish_animal" id="" class="for form-control">
                <option value="">-----সিলেক্ট করুন------</option>
                <option @if($allSurveyData->wish_animal=='y') selected @endif value="y">হ্যাঁ</option>
                <option @if($allSurveyData->wish_animal=='n') selected @endif value="n">না</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>সুবিধাবঞ্চিত হলে তার ধরণ</label>
              <select name="disadvantages_types" id="" value="{{$allSurveyData->disadvantages_types}}" class="for form-control">
                <option value="">-----সিলেক্ট করুন------</option>
                <option @if($allSurveyData->disadvantages_types=='বিধবা') selected @endif value="বিধবা">বিধবা</option>
                <option @if($allSurveyData->disadvantages_types=='তালাকপ্রাপ্ত') selected @endif value="তালাকপ্রাপ্ত">তালাকপ্রাপ্ত</option>
                <option @if($allSurveyData->disadvantages_types=='স্বামী পরিত্যক্তা') selected @endif value="স্বামী পরিত্যক্তা">স্বামী পরিত্যক্তা</option>
                <option @if($allSurveyData->disadvantages_types=='ক্ষুদ্র নৃ-গোষ্ঠী') selected @endif value="ক্ষুদ্র নৃ-গোষ্ঠী">ক্ষুদ্র নৃ-গোষ্ঠী</option>
                <option @if($allSurveyData->disadvantages_types=='বেকার') selected @endif value="বেকার">বেকার</option>
                <option @if($allSurveyData->disadvantages_types=='অসচ্ছল') selected @endif value="অসচ্ছল">অসচ্ছল</option>
                <option @if($allSurveyData->disadvantages_types=='অন্যের আয়ের উপর নির্ভরশীল') selected @endif value="অন্যের আয়ের উপর নির্ভরশীল">অন্যের আয়ের উপর নির্ভরশীল</option>
              </select>
            </div>
            
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>সরকারি কোন প্রকল্প থেকে ঋণ গ্রহণ করেছেন কিনা?</label>
              <select name="any_loan_source" id="" class="for form-control">
                <option value="">-----সিলেক্ট করুন------</option>
                <option @if($allSurveyData->any_loan_source=='y') selected @endif value="y">হ্যাঁ</option>
                <option @if($allSurveyData->any_loan_source=='n') selected @endif value="n">না</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">আপনি সরকারি অন্য কোন ভাতা পান কিনা?</label>
              <select name="allowance_source" id="" class="for form-control">
                <option value="">-----সিলেক্ট করুন------</option>
                <option @if($allSurveyData->allowance_source=='y') selected @endif value="y">হ্যাঁ</option>
                <option @if($allSurveyData->allowance_source=='n') selected @endif value="n">না</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>আপনি প্রকল্প ঋণ গ্রহণে আগ্রহী কিনা?</label>
              <select name="wish_project_loan" id="" class="for form-control">
                <option value="">-----সিলেক্ট করুন------</option>
                <option @if($allSurveyData->wish_project_loan=='y') selected @endif value="y">হ্যাঁ</option>
                <option @if($allSurveyData->wish_project_loan=='n') selected @endif value="n">না</option>
              </select>
            </div>
            {{-- image part  --}}
            <style>
              .imageOnload{
                height: 200px;
                width: 200px;
                display: block;
                margin: 0 auto;
                border: 1px dotted gray;
              }
            </style>
            <div class="form-group col-md-4 border">
              <h3>সুফলভোগী ছবি যোগ করুন</h3>
              {{-- <input type="file" name="ben_image" id="ben_image" class="form-control"> --}}
              <img id="blah" src="{{asset('benImage/profile.png')}}" alt="" class="imageOnload" />
              <input type='file' name="ben_image" class="form-control" onchange="readURL(this);" />
            </div>
            {{-- ////////////////////////////////////////////////////////////////////// --}}
            <div class="form-group col-md-8 border">
              <h3>সুফলভোগী অন্যান্য ছবি যোগ করুন</h3>
              <div class="input-group hdtuto control-group lst increment" >
                <input type="file" name="filenames[]" class="myfrm form-control">
                <div class="input-group-btn"> 
                  <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                </div>
              </div>
              <div class="clone hide">
                <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                  <input type="file" name="filenames[]" class="myfrm form-control">
                  <div class="input-group-btn"> 
                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                  </div>
                </div>
              </div>
            </div>
            {{-- ////////////////////////////////////////////////////////////////////// --}}
          </div>

        </div>
        {{-- other section --}}
          </div>
          <div class="tile-footer">
            {{-- <button class="btn btn-primary" type="submit" id="save">Submit</button> --}}
            <input type="submit" class="btn btn-primary" value="জমা দিন" id="save">
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

$('#demoSelect').select2();
$('#upazila').select2();
$('#union').select2();
function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#blah')
                  .attr('src', e.target.result)
          };

          reader.readAsDataURL(input.files[0]);
      }
  }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".btn-success").click(function(){ 
        var lsthmtl = $(".clone").html();
        $(".increment").after(lsthmtl);
    });
    $("body").on("click",".btn-danger",function(){ 
        $(this).parents(".hdtuto").remove();
    });
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
            // console.log(this.upazilaId)
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
  //         // $('#union').append('<option value="">-----সিলেক্ট করুন------</option>');
  //         $.each(response, function(){
  //           $('<option/>', {
  //             'value': this.id,
  //             'text': this.union_name_bangla
  //           }).appendTo('#union');
  //         });
  //       }
  //     });
  // });

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
      url: "{{url('/village-by-union')}}",
      data:{_token:$('input[name=_token]').val(),unions:$(this).val()},
      success:function(response){
          $('option', ddlvil).remove();
          $.each(response, function(){
            $('<option/>', {
              'value': this.id,
              'text': this.village_name_bangla
            }).appendTo('#villageall');
          });
        }
      });
  });
// phone validate 
$(document).ready(function() {
    $('#phone').keyup(function(){
      var error_phone = '';
      var phone = $('#phone').val();
      var _token = $('input[name="_token"]').val();
      var filter = /(^(01){1}[3456789]{1}(\d){8})$/;
  if(!filter.test(phone))
  {
    $('#error_phone').html('<label class="text-danger">ফোন নম্বর সঠিক নয়</label>');
    $('#phone').addClass('has-error');
    $('#save').attr('disabled', 'disabled');
  } else if (phone.length > 11){
    $('#error_phone').html('<label class="text-danger">ফোন নম্বর সঠিক নয়</label>');
    $('#phone').addClass('has-error');
    $('#save').attr('disabled', 'disabled');
  } else{
    $('#save').attr('disabled', false);
    $('#error_phone').html('<label style="color: green">ফোন নম্বর সঠিক</label>');
  }
    })
});
// nid cceck 
$(document).ready(function() {
    $('#nid').keyup(function(){
      var error_nid = '';
      var nid = $('#nid').val();
      var _token = $('input[name="_token"]').val();
      var filter =  /^([0-9]{10}|[0-9]{13}|[0-9]{17})$/;
  if(!filter.test(nid))
  {
    $('#error_nid').html('<label class="text-danger">অবৈধ এনআইডি</label>');
    $('#nid').addClass('has-error');
    $('#save').attr('disabled', 'disabled');
  } else{
    $('#save').attr('disabled', false);
    $('#error_nid').html('<label style="color: green">বৈধ এনআইডি</label>');
  }
    })
});

// number validation 
$(document).ready(function() {
    $('#family_member').keyup(function(){
      var error_family_member = '';
      var family_member = $('#family_member').val();
      var _token = $('input[name="_token"]').val();
      var filter = /^([1-9][0-9]*)$/;
  if(!filter.test(family_member))
  {
    $('#error_family_member').html('<label class="text-danger">নাম্বর সঠিক নয়</label>');
    $('#family_member').addClass('has-error');
    $('#save').attr('disabled', 'disabled');
  } else{
    $('#error_family_member').html('<label style="display:none"></label>');
    $('#family_member').removeClass('has-error');
    $('#save').attr('disabled', false);
  }
    })
});
////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#land_percent_abadi').keyup(function(){
      var error_land_percent_abadi = '';
      var land_percent_abadi = $('#land_percent_abadi').val();
      var _token = $('input[name="_token"]').val();
      var filter =  /^(\d*)([,.]\d{0,2})?$/;
  if(!filter.test(land_percent_abadi))
  {
    $('#error_land_percent_abadi').html('<label class="text-danger">নাম্বর সঠিক নয়</label>');
    $('#land_percent_abadi').addClass('has-error');
    $('#save').attr('disabled', 'disabled');
  } else{
    $('#error_land_percent_abadi').html('<label style="display:none"></label>');
    $('#land_percent_abadi').removeClass('has-error');
    $('#save').attr('disabled', false);
  }
    })
});
////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#land_percent_onabadi').keyup(function(){
      var error_land_percent_onabadi = '';
      var land_percent_onabadi = $('#land_percent_onabadi').val();
      var _token = $('input[name="_token"]').val();
      var filter =  /^(\d*)([,.]\d{0,2})?$/;
  if(!filter.test(land_percent_onabadi))
  {
    $('#error_land_percent_onabadi').html('<label class="text-danger">নাম্বর সঠিক নয়</label>');
    $('#land_percent_onabadi').addClass('has-error');
    $('#save').attr('disabled', 'disabled');
  } else{
    $('#error_land_percent_onabadi').html('<label style="display:none"></label>');
    $('#land_percent_onabadi').removeClass('has-error');
    $('#save').attr('disabled', false);
  }
    })
});
////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#annual_income').keyup(function(){
      var error_annual_income = '';
      var annual_income = $('#annual_income').val();
      var _token = $('input[name="_token"]').val();
      var filter =  /^(\d*)([,.]\d{0,2})?$/;
  if(!filter.test(annual_income))
  {
    $('#error_annual_income').html('<label class="text-danger">নাম্বর সঠিক নয়</label>');
    $('#annual_income').addClass('has-error');
    $('#save').attr('disabled', 'disabled');
  } else{
    $('#error_annual_income').html('<label style="display:none"></label>');
    $('#annual_income').removeClass('has-error');
    $('#save').attr('disabled', false);
  }
    })
});
////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#amount_income').keyup(function(){
      var error_amount_income = '';
      var amount_income = $('#amount_income').val();
      var _token = $('input[name="_token"]').val();
      var filter =  /^(\d*)([,.]\d{0,2})?$/;
  if(!filter.test(amount_income))
  {
    $('#error_amount_income').html('<label class="text-danger">নাম্বর সঠিক নয়</label>');
    $('#amount_income').addClass('has-error');
    $('#save').attr('disabled', 'disabled');
  } else{
    $('#error_amount_income').html('<label style="display:none"></label>');
    $('#amount_income').removeClass('has-error');
    $('#save').attr('disabled', false);
  }
    })
});
////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#domestic_animal').keyup(function(){
      var error_domestic_animal = '';
      var domestic_animal = $('#domestic_animal').val();
      var _token = $('input[name="_token"]').val();
      var filter = /^(\d*)(\d{0,2})?$/;
  if(!filter.test(domestic_animal))
  {
    $('#error_domestic_animal').html('<label class="text-danger">নাম্বর সঠিক নয়</label>');
    $('#domestic_animal').addClass('has-error');
    $('#save').attr('disabled', 'disabled');
  } else{
    $('#error_domestic_animal').html('<label style="display:none"></label>');
    $('#domestic_animal').removeClass('has-error');
    $('#save').attr('disabled', false);
  }
    })
});
////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#hybrid_animal').keyup(function(){
      var error_hybrid_animal = '';
      var hybrid_animal = $('#hybrid_animal').val();
      var _token = $('input[name="_token"]').val();
      var filter = /^(\d*)(\d{0,2})?$/;
  if(!filter.test(hybrid_animal))
  {
    $('#error_hybrid_animal').html('<label class="text-danger">নাম্বর সঠিক নয়</label>');
    $('#hybrid_animal').addClass('has-error');
    $('#save').attr('disabled', 'disabled');
  } else{
    $('#error_hybrid_animal').html('<label style="display:none"></label>');
    $('#hybrid_animal').removeClass('has-error');
    $('#save').attr('disabled', false);
  }
    })
});
////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#improved_varieties').keyup(function(){
      var error_improved_varieties = '';
      var improved_varieties = $('#improved_varieties').val();
      var _token = $('input[name="_token"]').val();
      var filter = /^(\d*)(\d{0,2})?$/;
  if(!filter.test(improved_varieties))
  {
    $('#error_improved_varieties').html('<label class="text-danger">নাম্বর সঠিক নয়</label>');
    $('#improved_varieties').addClass('has-error');
    $('#save').attr('disabled', 'disabled');
  } else{
    $('#error_improved_varieties').html('<label style="display:none"></label>');
    $('#improved_varieties').removeClass('has-error');
    $('#save').attr('disabled', false);
  }
    })
});
  // active 
  // $(document).ready(function() {
  //       $("#add_from").addClass('active');
  //       $("#add_from").addClass('active');
  //       $("#add_from").addClass('is-expanded');
  //   });
</script>
@endsection