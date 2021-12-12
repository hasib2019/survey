@extends('layouts.admin')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> ইউনিয়ন ভিত্তিক সুবিধাভোগী</h1>
      {{-- <p>Table to display analytical data effectively</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <!--<li class="breadcrumb-item">Tables</li>-->
      <li class="breadcrumb-item active"><a href="#">ইউনিয়ন ভিত্তিক সুবিধাভোগী</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
            {{-- search  --}}
            <form class="form-inline" action="@if (Auth::user()->is_admin==1){{route('admin.union.serch')}} @elseif(Auth::user()->is_admin==2) {{route('union.serch')}} @endif" method="get">
              @csrf
              {{-- <div class="form-group mb-2">
                <label for="staticEmail2" class="form-control-plaintext">আপনার ইউনিয়ন ভিত্তিক সুবিধাভোগী নির্বাচন করুন</label>
              </div> --}}
              <div class="form-group mx-sm-2 mb-2 col-2">
                <label for="inputEmail4">জেলা:</label>
                <select id="demoSelect" class="form-control">
                  <option value="">--জেলা বাছুন--</option>
                  @foreach ($district as $districts)
                  <option value="{{$districts->id}}">{{$districts->district_name_bangla}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group mx-sm-2 mb-2 col-2">
                <label>উপজেলা:</label>
                <select id="upazila" class="form-control">
                  <option value="">--উপজেলা বাছুন--</option>
                </select>
              </div>
              <div class="form-group mx-sm-2 mb-2 col-2">
                <label for="inputEmail4">ইউনিয়ন:</label>
                <select name="id" id="union" class="form-control" required>
                  <option value="">--ইউনিয়ন বাছুন--</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary col-2 mb-2 mt-3">অনুসন্ধান করুন</button>
            </form>
          {{-- search  --}}
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>নাম</th>
                  <th>মাতার নাম</th>
                  <th>বাবা/স্বামীর নাম</th>
                  <th>মুঠোফোন</th>
                  <th>এনআইডি</th>
                  <th>ঠিকানা</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($all_ben as $item)
                @php
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
                @endphp
                <tr>
                  <td>{{$item->name}}</td>
                  <td>{{$item->mother_name}}</td>
                  <td>{{$item->father_name}}</td>
                  <td>{{$item->mobile}}</td>
                  <td>{{$item->nid}}</td>
                  <td>{{$village}}, {{$unions}},{{$upazila}}, {{$district}}</td>
                </tr> 
                @endforeach
              
                
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

@section('script')

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
      url: "{{url('/upazila-by-district')}}",
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
      url: "{{url('/unions-by-upazila')}}",
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
      url: "{{url('/village-by-union')}}",
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
    $('#unionsearch').select2();
    // active 
  $(document).ready(function() {
        $("#union_search").addClass('active');
        $("#report").addClass('is-expanded');
    });
</script> 
@endsection