<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>   
        @font-face {
        font-family: "Kalpurush", sans-serif;
        font-style: normal;
        font-weight: normal;
        src: url({{asset('fonts/NikoshBAN.ttf')}}) format('truetype');
        }
        * {
            font-family: "Kalpurush", sans-serif;
        }
        body {
            font-family: "Kalpurush", sans-serif;
        }
    </style>
        <title> দুগ্ধ ও মাংস উৎপাদনের মাধ্যমে গ্রামীণ কর্মসংস্থান সৃষ্টির লক্ষ্যে যশোর ও মেহেরপুর জেলায় সমবায়  কার্যক্রম বিস্তৃতকরণ </title>
        <!-- Main CSS-->
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}"> --}}

        <!-- Font-icon css-->
        {{-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      </head>
<body>
    <table class="table table-sm" style="width: 100%">
        <thead>
          <tr>
            <th style="15%">নাম</th>
            <th style="10%">মাতার নাম</th>
            <th style="10%">বাবা/স্বামীর নাম</th>
            <th style="10%">মুঠোফোন</th>
            <th style="10%">এনআইডি</th>
            <th style="15%">ঠিকানা</th>
            <th style="10%">ঋণ গ্রহণ করেছেন কিনা?</th>
            <th style="10%">ভাতা পান কিনা?</th>
            <th style="10%">ঋণ গ্রহণে আগ্রহী কিনা?</th>
          </tr>
        </thead>
        <tbody>
            @php
                $all_ben = App\Models\ElectionSurvey::all();
            @endphp
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
            <td style="15%">{{$item->name}}</td>
            <td style="10%">{{$item->mother_name}}</td>
            <td style="10%">{{$item->father_name}}</td>
            <td style="10%">{{$item->mobile}}</td>
            <td style="10%">{{$item->nid}}</td>
            <td style="15%">{{$village}}, {{$unions}},{{$upazila}}, {{$district}}</td>
            <td style="10%">@if($item->any_loan_source == 'y') হ্যাঁ @elseif($item->any_loan_source == 'n') না @endif</td>
            <td style="10%">@if($item->allowance_source == 'y') হ্যাঁ @elseif($item->allowance_source == 'n') না @endif</td>
            <td style="10%">@if($item->wish_project_loan == 'y') হ্যাঁ @elseif($item->wish_project_loan == 'n') না @endif</td>
          </tr> 
          @endforeach
          </tr>
        </tbody>
      </table>
</body>
</html>
