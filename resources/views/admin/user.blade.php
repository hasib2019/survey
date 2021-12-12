@extends('layouts.admin')

@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i>Village Add Form</h1>
        {{-- <p>Bootstrap default form components</p> --}}
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item"><a href="#">Village Add Form</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <form action="{{route('add.user.create')}}" method="post">
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
                    <label for="inputEmail4">Name:</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Enter Your Name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" id="" required>
                  </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">User Name:</label>
                  <input type="text" name="user_name" id="" class="form-control" placeholder="Enter User Name" required>
                </div>
                
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Password:</label>
                  <input type="password" name="password" id="" class="form-control" placeholder="Enter password">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Role:</label>
                  <select name="role" class="form-control" id="role" required>
                    <option value="">---- select role------</option>
                    <option value="1">Super Admin</option>
                    <option value="2">Admin</option>
                    <option value="0">User</option>
                  </select>
                </div>
              </div>
              </div>   
          </div>
          <div class="tile-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
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

</script>
@endsection