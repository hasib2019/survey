@extends('layouts.admin')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> সুবিধাবঞ্চিতের ধরণ অনুযায়ী তালিকা</h1>
      {{-- <p>Table to display analytical data effectively</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <!--<li class="breadcrumb-item">Tables</li>-->
      <li class="breadcrumb-item active"><a href="#">সুবিধাবঞ্চিতের ধরণ অনুযায়ী তালিকা</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
            {{-- search  --}}
            <form class="form-inline" action="@if (Auth::user()->is_admin==1){{route('admin.dis_list.serch')}} @elseif(Auth::user()->is_admin==2) {{route('dis_list.serch')}} @endif" method="get">
              @csrf
              <div class="form-group mb-2">
                <label for="staticEmail2" class="form-control-plaintext">সুবিধাবঞ্চিতের ধরণ অনুযায়ী তালিকা নির্বাচন করুন</label>
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <select name="disadvantages_types" id="" class="for form-control">
                  <option value="">-----সিলেক্ট করুন------</option>
                  <option value="বিধবা">বিধবা</option>
                  <option value="তালাকপ্রাপ্ত">তালাকপ্রাপ্ত</option>
                  <option value="স্বামী পরিত্যক্তা">স্বামী পরিত্যক্তা</option>
                  <option value="ক্ষুদ্র নৃ-গোষ্ঠী">ক্ষুদ্র নৃ-গোষ্ঠী</option>
                  <option value="বেকার">বেকার</option>
                  <option value="অসচ্ছল">অসচ্ছল</option>
                  <option value="অন্যের আয়ের উপর নির্ভরশীল">অন্যের আয়ের উপর নির্ভরশীল</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary mb-2">অনুসন্ধান করুন</button>
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
                  <th>সুবিধাবঞ্চিতের ধরণ</th>
                  <th>ছবি</th>
                  <th>অন্যান্য ছবি</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($all_ben as $item)
                <tr>
                  <td>{{$item->name}}</td>
                  <td>{{$item->mother_name}}</td>
                  <td>{{$item->father_name}}</td>
                  <td>{{$item->mobile}}</td>
                  <td>{{$item->nid}}</td>
                  <td>{{$item->disadvantages_types}}</td>
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
        $("#dis_search").addClass('active');
        $("#report").addClass('is-expanded');
    });
</script> 
@endsection