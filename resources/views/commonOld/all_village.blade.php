@extends('layouts.admin')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> সমস্ত গ্রাম</h1>
      {{-- <p>Table to display analytical data effectively</p> --}}
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
          <a href="@if (Auth::user()->is_admin==1){{route('admin.add-village')}} @elseif(Auth::user()->is_admin==2) {{route('add-village')}} @endif" class="btn btn-sm btn-success mb-2 float-right">গ্রাম যোগ করুন</a>
          <div class="table-responsive">
            
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>জেলা</th>
                  <th>উপজেলা</th>
                  <th>ইউনিয়ন</th>
                  <th>গ্রামের নাম (ইংরেজি)</th>
                  <th>গ্রামের নাম (বাংলা)</th>
                  {{-- <th>ইউআরএল</th> --}}
                  <th>সম্পাদন</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($district as $item)
                @php
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
                @endphp
                <tr>
                  <td>{{$districts}}</td>
                  <td>{{$upazilas}}</td>
                  <td>{{$unions}}</td>
                  <td>{{$item->village_name}}</td>
                  <td>{{$item->village_name_bangla}}</td>
                  {{-- <td>{{$item->url}}</td> --}}
                  <td><a href="@if (Auth::user()->is_admin==1){{route('admin.edit-village', encrypt($item->id))}} @elseif(Auth::user()->is_admin==2) {{route('edit-village', encrypt($item->id))}} @endif">এডিট করুন</a></td>
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
  // active 
  $(document).ready(function() {
        $("#village").addClass('active');
        $("#village").addClass('is-expanded');
    });
</script>
    
@endsection