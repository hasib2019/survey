@extends('layouts.admin')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> মহিলা সুবিধাভোগী</h1>
      {{-- <p>Table to display analytical data effectively</p> --}}
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
                  <th>ছবি</th>
                  <th>অন্যান্য ছবি</th>
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
                  <td>@if($item->gender=='f') মহিলা @endif</td>
                  <td>{{$village}}, {{$unions}},{{$upazila}}, {{$district}}</td>
                  <td> <img src="{{asset('benImage/'.$item->ben_image)}}" height="50" width="50" alt=""></td>
                    <td><a href="" data-toggle="modal" data-target="#exampleModal{{$item->id}}"><span class="fa fa-eye"></a> </td>
                     <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">অন্যান্য ছবির বিবরণ</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          @foreach(json_decode(\App\Models\ImageDetail::select('dtl_image')->where('ben_id', $item->id)->get()) as $key => $benImage)
                          {{-- {{$benImage->dtl_image}}/ --}}
                          @if (!empty($benImage->dtl_image))
                          @foreach (json_decode($benImage->dtl_image) as $key => $photo)
                              {{-- <img class="img-thumbnail" width="150" src="{{ asset('benImage/'.$photo) }}"> --}}
                              <img src="{{url('benImage/', $photo)}}" width="150" alt="">
                          @endforeach
                          @endif
                          @endforeach
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">বন্ধ করুন</button>
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
    $('#unionsearch').select2();
    // active 
  $(document).ready(function() {
        $("#female_search").addClass('active');
        $("#report").addClass('is-expanded');
    });
</script> 
@endsection