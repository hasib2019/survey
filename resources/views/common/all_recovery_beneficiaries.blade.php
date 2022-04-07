@extends('layouts.admin')

@section('content')
<main class="app-content">
  @if ($id==1)
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> 
       বাদ দেওয়া উপকারভোগীর তালিকা
      </h1>
      {{-- <p>Table to display analytical data effectively</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <!--<li class="breadcrumb-item">Tables</li>-->
      <li class="breadcrumb-item active"><a href="#">
        বাদ দেওয়া উপকারভোগীর তালিকা</a></li>
    </ul>
  </div>
  @endif
  @if ($id==2)
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> 
        সংরক্ষিত উপকারভোগীর তালিকা
      </h1>
      {{-- <p>Table to display analytical data effectively</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <!--<li class="breadcrumb-item">Tables</li>-->
      <li class="breadcrumb-item active"><a href="#">
      সংরক্ষিত উপকারভোগীর তালিকা</a></li>
    </ul>
  </div>
  @endif
 
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
                  <th>ঠিকানা</th>
                  <th>ঋণ গ্রহণ করেছেন কিনা?</th>
                  <th>ভাতা পান কিনা?</th>
                  <th>ঋণ গ্রহণে
                    আগ্রহী কিনা?</th>
                  @if (Auth::user()->is_admin==1) 
                  <th>সম্পাদন</th>
                  @endif
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
                  <td>@if($item->any_loan_source == 'y') হ্যাঁ @elseif($item->any_loan_source == 'n') না @endif</td>
                  <td>@if($item->allowance_source == 'y') হ্যাঁ @elseif($item->allowance_source == 'n') না @endif</td>
                  <td>@if($item->wish_project_loan == 'y') হ্যাঁ @elseif($item->wish_project_loan == 'n') না @endif</td>
                  @if (Auth::user()->is_admin==1) 
                  <td class="center">
                    @if ($id==1)
                    <a href="{{route('recoverDelete', $item->id)}}" onclick="return confirm('আপনি কি ডিলিট ডাটা রিকোভার করতে চান ?')"><span class="fa fa-trash"></span> রিকোভার</a>
                    @endif
                    @if ($id==2)
                    <a href="{{route('recoverArchive', $item->id)}}" onclick="return confirm('আপনি কি আর্কাইভ ডাটা রিকোভার করতে চান ?')"><span class="fa fa-archive"></span> রিকোভার</span></a>
                    @endif
                    
                  </td>
                  @endif
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

@if ($id==1)
  <script>
   $(document).ready(function() {
        $("#deletes").addClass('active');
        $("#recover").addClass('is-expanded');
    });   
  </script> 
@endif

@if ($id==2)
  <script>
  $(document).ready(function() {
       $("#archives").addClass('active');
       $("#recover").addClass('is-expanded');
   });
  </script>
@endif
@endsection