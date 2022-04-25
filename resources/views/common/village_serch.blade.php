@extends('layouts.admin')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> গ্রাম ভিত্তিক সুবিধাভোগী</h1>
      {{-- <p>Table to display analytical data effectively</p> --}}
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
        <a href="{{route('village-excel')}}" class="btn btn-dark mb-2 float-right">Download Excel</a>
        <div class="tile-body">
            {{-- search  --}}
            <form class="form-inline" action="@if (Auth::user()->is_admin==1){{route('admin.village.serch')}} @elseif(Auth::user()->is_admin==2) {{route('village.serch')}} @endif" method="get">
              @csrf
              {{-- <div class="form-group mb-2">
                <label for="staticEmail2" class="form-control-plaintext">আপনার গ্রাম নির্বাচন করুন</label>
              </div> --}}
              <div class="form-group mx-sm-2 mb-2 col-2">
                <label for="inputEmail4">জেলা:</label>
                <select id="demoSelect" class="form-control">
                  <option value="">--সিলেক্ট করুন--</option>
                  @foreach ($district as $districts)
                  <option value="{{$districts->id}}">{{$districts->district_name_bangla}}</option>
                  @endforeach
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
          {{-- search  --}}
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
    // active 
  $(document).ready(function() {
        $("#village_search").addClass('active');
        $("#report").addClass('is-expanded');
    });
</script> 
@endsection