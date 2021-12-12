@extends('layouts.admin')

@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> User List</h1>
      {{-- <p>Table to display analytical data effectively</p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active"><a href="#">User List</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <a href="{{route('add.user')}}" class="btn btn-sm btn-success mb-2 float-right">Add New User</a>
        <div class="tile-body">

          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>User Name</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user as $item)
                <tr>
                  <td>{{$item->name}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->user_name}}</td>
                  <td>@if ($item->is_admin==1) Super Admin @elseif ($item->is_admin==2) Admin @else User @endif</td>
                 
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
        $("#user").addClass('active');
    });
</script> 
@endsection