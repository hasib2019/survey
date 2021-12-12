<?php

namespace App\Http\Controllers;

use App\Models\ElectionSurvey;
use Illuminate\Http\Request;
use App\Models\DistrictInfo;
use App\Models\UpazilaInfo;
use App\Models\UnionInfo;
use App\Models\VillageInfo;
use DB;
use Response;
use Auth;

class ElectionSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $district = DB::table('district_infos')->get();
        $district = DB::table('district_infos')->where('id', 37)->orWhere('id',42)->get();
        
        // dd($district);
        return view('common.add_from', compact('district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $survay = new ElectionSurvey();
       $survay->district = $request->district;
       $survay->upazilas = $request->upazilas;
       $survay->unions = $request->unions;
       $survay->village = $request->village;
       $survay->informer_name = $request->informer_name;
       $survay->informer_designation = $request->informer_designation;
       $survay->name = $request->name;
       $survay->father_name = $request->father_name;
       $survay->mother_name = $request->mother_name;
       $survay->mobile = $request->mobile;
       $survay->nid = $request->nid;
       $survay->gender = $request->gender;
       $survay->holding = $request->holding;
       $survay->dob = $request->dob;
       $survay->edu_qualification = $request->edu_qualification;
       $survay->family_member = $request->family_member;
       $survay->land_percent_abadi = $request->land_percent_abadi;
       $survay->land_percent_onabadi = $request->land_percent_onabadi;
       $survay->family_income = $request->family_income;
       $survay->personal_income = $request->personal_income;
       $survay->annual_income = $request->annual_income;
       $survay->amount_income = $request->amount_income;
       $survay->domestic_animal = $request->domestic_animal;
       $survay->hybrid_animal = $request->hybrid_animal;
       $survay->improved_varieties = $request->improved_varieties;
       $survay->animal_status = $request->animal_status;
       $survay->wish_animal = $request->wish_animal;
       $survay->disadvantages_types = $request->disadvantages_types;
       $survay->any_loan_source = $request->any_loan_source;
       $survay->allowance_source = $request->allowance_source;
       $survay->wish_project_loan = $request->wish_project_loan;
        if($survay->save()){
            alert()->success('Survey Save Sucessfull!')->autoclose(2000);
            if (Auth::user()->is_admin==1){ 
                return redirect()->route('admin.survay.create');
            }elseif(Auth::user()->is_admin==2) { 
                return redirect()->route('survay.create');
            } 
        }else{
            alert()->error('Data Not Saved');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ElectionSurvey  $electionSurvey
     * @return \Illuminate\Http\Response
     */
     // auto select
    public function getDistrictsByDivision(Request $request){
        $data=$request->all();
        $districts=DB::table('district_infos')
        ->where('district_infos.division_id','=',$data['division'])
        ->select('id','name')
        ->get();
        return Response::json($districts);
    }
// upazila 
    public function getUpazilaByDistrict(Request $request){
        $data=$request->all();
        $thana=DB::table('upazila_infos')
        ->where('upazila_infos.district_id','=',$data['districts'])
        ->select('id','upazila_name_bangla')
        ->get();
        return Response::json($thana);
    }
// union 
    public function getUnionByUpazila(Request $request){
        $data=$request->all();
        $ship=DB::table('union_infos')
        ->where('union_infos.upazila_id','=',$data['upazilas'])
        ->select('id','union_name_bangla')
        ->get();
        return Response::json($ship);
    }
// village 
    public function getVillageByUnion(Request $request){
        $data=$request->all();
        $ship=DB::table('village_infos')
        ->where('village_infos.union_id','=',$data['unions'])
        ->select('id','village_name_bangla')
        ->get();
        return Response::json($ship);
    }

    // new shipping address add from checkout page
    public function show(ElectionSurvey $electionSurvey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ElectionSurvey  $electionSurvey
     * @return \Illuminate\Http\Response
     */
    public function edit(ElectionSurvey $electionSurvey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ElectionSurvey  $electionSurvey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ElectionSurvey $electionSurvey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ElectionSurvey  $electionSurvey
     * @return \Illuminate\Http\Response
     */
    public function destroy(ElectionSurvey $electionSurvey)
    {
        //
    }
    // village section 
    public function all_village()
    {
        $district = VillageInfo::all();
        // dd($district); exit();
        return view('common.all_village', compact('district'));
    }
    public function add_village()
    {
        $district = DistrictInfo::where('id', 37)->orWhere('id',42)->get();
        return view('common.add_village', compact('district'));
    }
    public function village_add(Request $request)
    {
        $village = new VillageInfo();
        $village->district_id =$request->district_id;
        $village->upazila_id =$request->upazilla_id;
        $village->union_id =$request->union_id;
        $village->village_name =$request->name;
        $village->village_name_bangla =$request->bn_name;
        $village->url =$request->url;
        if($village->save()){
            alert()->success('Village Save Sucessfull')->autoclose(1000);
            
            if (Auth::user()->is_admin==1){ 
                return redirect()->route('admin.all-village');
            }elseif(Auth::user()->is_admin==2) { 
                return redirect()->route('all-village');
            } 
        }else{
            alert()->error('Sweet Alert with error.');
            return back();
        }

    }
    public function edit_village($id)
    {
        $village = VillageInfo::where('id', decrypt($id))->first();
        // dd($village); exit();
        $district = DistrictInfo::where('id', 37)->orWhere('id',42)->get();
        // dd($district); exit();
        $upazila = UpazilaInfo::where('district_id', $village->district_id)->get();
        $union = UnionInfo::where('upazila_id', $village->upazila_id)->get();
        return view('common.edit_village_from', compact('village', 'district', 'upazila', 'union'));
    }

    public function village_update(Request $request)
    {
        $village = VillageInfo::find($request->id);
        $village->district_id =$request->district_id;
        $village->upazila_id =$request->upazilla_id;
        $village->union_id =$request->union_id;
        $village->village_name =$request->name;
        $village->village_name_bangla =$request->bn_name;
        $village->url =$request->url;
        // dd($request); exit();
        if($village->save()){
            alert()->success('Village Update Sucessfull!')->autoclose(3000);
            if (Auth::user()->is_admin==1){ 
                return redirect()->route('admin.all-village');
            }elseif(Auth::user()->is_admin==2) { 
                return redirect()->route('all-village');
            }
        }else{
            alert()->error('Data Not Saved');
            return back();
        }
    }

    // report 
    public function all_beneficiaries()
    {
        // alert()->success('Sweet Alert with success.','Welcome to Era Infotech')->autoclose(1000);
        // alert()->error('Sweet Alert with error.');
        $all_ben = ElectionSurvey::all();
        // dd($all_ben);
        return view('common.all_beneficiaries', compact('all_ben'));
    }

    public function village_beneficiaries()
    {
        $village = VillageInfo::all();
        $all_ben = ElectionSurvey::all();
        $district = DistrictInfo::where('id', 37)->orWhere('id',42)->get();
        return view('common.village_serch', compact('all_ben', 'village', 'district'));
    }

    public function village_beneficiaries_search(Request $request)
    {
        $village = VillageInfo::all();
        $all_ben = ElectionSurvey::where('village', $request->id)->get();
        $district = DistrictInfo::where('id', 37)->orWhere('id',42)->get();
        return view('common.village_serch', compact('all_ben', 'village', 'district'));
    }

    // union_beneficiaries
    public function union_beneficiaries()
    {
        $union = UnionInfo::all();
        $all_ben = ElectionSurvey::all();
        $district = DistrictInfo::where('id', 37)->orWhere('id',42)->get();
        return view('common.union_serch', compact('all_ben', 'union', 'district'));
    }
    public function union_beneficiaries_search(Request $request)
    {
        // dd($request->id);
        $union = UnionInfo::all();
        $all_ben = ElectionSurvey::where('unions', $request->id)->get();
        $district = DistrictInfo::where('id', 37)->orWhere('id',42)->get();
        $getId =$request->id;
        return view('common.union_serch', compact('all_ben', 'union', 'district', 'getId'));
    }
    // disadvantaged_beneficiaries
    public function disadvantaged_beneficiaries()
    {
        $all_ben = ElectionSurvey::all();
        return view('common.dis_serch', compact('all_ben'));
    }
    public function disadvantaged_beneficiaries_search(Request $request)
    {
        $all_ben = ElectionSurvey::where('disadvantages_types', $request->disadvantages_types)->get();
        return view('common.dis_serch', compact('all_ben'));
    }
    // male search 
    public function male_beneficiaries()
    {
        $all_ben = ElectionSurvey::where('gender', 'm')->get();
        return view('common.male_serch', compact('all_ben'));
    }
    public function female_beneficiaries()
    {
        $all_ben = ElectionSurvey::where('gender', 'f')->get();
        return view('common.female_serch', compact('all_ben'));
    }

}
