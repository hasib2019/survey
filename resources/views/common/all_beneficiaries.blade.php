@extends('layouts.admin')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> 
        উপকারভোগীর তালিকা</h1>
      {{-- <p>Table to display analytical data effectively</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <!--<li class="breadcrumb-item">Tables</li>-->
      <li class="breadcrumb-item active"><a href="#">
        উপকারভোগীর তালিকা</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        {{-- <a href="{{route('all-ben-pdf')}}" class="btn btn-dark mb-2 float-right">Download PDF</a> --}}
        <a href="{{route('all-ben-excel')}}" class="btn btn-dark mb-2 mr-2 float-right">Download Excel</a>
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable" style="font-size: 16px">
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
                  <th>ছবি</th>
                  {{-- @if (Auth::user()->is_admin==1)  --}}
                  <th>সম্পাদন</th>
                  {{-- @endif --}}
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
                  <td> <img src="{{asset('benImage/'.$item->ben_image)}}" height="50" width="50" alt=""></td>
                  <td>
                   <a href="" data-toggle="modal" data-target="#exampleModal"><span class="fa fa-eye"></a> 
                  @if (Auth::user()->is_admin==1) 
                    <a href="{{route('benEdit', $item->id)}}"><span class="fa fa-edit"></span></a> 
                    <a href="{{route('benDelete', $item->id)}}" onclick="return confirm('আপনি কি ডাটা ডিলিট করতে চান ?')"><span class="fa fa-trash"></span></a>
                    <a href="{{route('benArchive', $item->id)}}" onclick="return confirm('আপনি কি ডাটা আর্কাইভ করতে চান ?')"><span class="fa fa-archive"></span></a>
                  @endif
                  </td>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          @foreach(\App\Models\ImageDetail::where('ben_id', $item->id)->get() as $key => $benImage)
                          @foreach (json_decode($benImage->dtl_image) as $key => $photo)
                              <img class="xzoom-gallery" width="150" src="{{ asset('benImage/'.$photo) }}">
                          @endforeach
                          {{-- <img src="{{ asset('benImage/'.$benImage) }}" alt=""> --}}
                          @endforeach
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
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
        $("#reports").addClass('active');
        $("#report").addClass('is-expanded');
    });
</script> 
@endsection