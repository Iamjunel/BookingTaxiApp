<?php

namespace App\Http\Controllers;

use App\Models\BusinessHours;
use Illuminate\Http\Request;
use App\Models\Company;
use stdClass;
use Illuminate\Support\Facades\Session;
class CareTaxiController extends Controller
{
    //

    public function login()
    {
        return view('care-taxi.login');
    }
    public function index()
    {
        if(!session()->has('cid')){
             return redirect('care-taxi/login');
        }
        $id = session()->get('id');
        return view('care-taxi.index',compact('id'));
    }
    public function availableSlot()
    {
        if (!session()->has('cid')) {
            return redirect('care-taxi/login');
        }
        return view('care-taxi.booking');
    }

    public function slotDetailDate(){
        if (!session()->has('cid')) {
            return redirect('care-taxi/login');
        }
        return view('care-taxi.show_status');
    }
    public function edit($id){
        $company = Company::with('business_hours')->where('id',$id)->first();
        if($company->business_hours == null){
            $bh = new stdClass();
            $bh->monday_start = "";
            $bh->monday_end = "";
            $bh->tuesday_start = "";
            $bh->tuesday_end = "";
            $bh->wednesday_start = "";
            $bh->wednesday_end = "";
            $bh->thursday_start = "";
            $bh->thursday_end = "";
            $bh->friday_start = "";
            $bh->friday_end = "";
            $bh->saturday_start = "";
            $bh->saturday_end = "";
            $bh->sunday_start = "";
            $bh->sunday_end = "";
        }else{
            $bh = $company->business_hours;
        }
        return view('care-taxi.company_info',compact('company','bh'));
    }
    public function update(Request $request){
        $data = $request->all();
        $company = Company::where('id', $data["id"])->first();
        $company->name = $data["name"];
        $company->cid = $data["cid"];
        $company->cpass = $data["cpass"];
        $company->email = $data["email"];
        $company->phone = $data["phone"];
        $company->holidays = $data["holidays"];
        $company->hp = $data["hp"];
        $company->update();
        $bus_hours = BusinessHours::where('company_id', $data["id"])->first();
        if(!empty($bus_hours)){
            $bus_hours->monday_start = $data["mon_start"];
            $bus_hours->monday_end = $data["mon_end"];
            $bus_hours->tuesday_start = $data["tue_start"];
            $bus_hours->tuesday_end = $data["tue_end"];
            $bus_hours->wednesday_start = $data["wed_start"];
            $bus_hours->wednesday_end = $data["wed_end"];
            $bus_hours->thursday_start = $data["thu_start"];
            $bus_hours->thursday_end = $data["thu_end"];
            $bus_hours->friday_start = $data["fri_start"];
            $bus_hours->friday_end = $data["fri_end"];
            $bus_hours->saturday_start = $data["sat_start"];
            $bus_hours->saturday_end = $data["sat_end"];
            $bus_hours->sunday_start = $data["sun_start"];
            $bus_hours->sunday_end = $data["sun_end"];
            $bus_hours->update();            
        }else{
            $bus_hours = new BusinessHours();
            $bus_hours->monday_start = $data["mon_start"];
            $bus_hours->monday_end = $data["mon_end"];
            $bus_hours->tuesday_start = $data["tue_start"];
            $bus_hours->tuesday_end = $data["tue_end"];
            $bus_hours->wednesday_start = $data["wed_start"];
            $bus_hours->wednesday_end = $data["wed_end"];
            $bus_hours->thursday_start = $data["thu_start"];
            $bus_hours->thursday_end = $data["thu_end"];
            $bus_hours->friday_start = $data["fri_start"];
            $bus_hours->friday_end = $data["fri_end"];
            $bus_hours->saturday_start = $data["sat_start"];
            $bus_hours->saturday_end = $data["sat_end"];
            $bus_hours->sunday_start = $data["sun_start"];
            $bus_hours->sunday_end = $data["sun_end"];
            $bus_hours->company_id =  $data["id"];
            $bus_hours->save();   
        }
        return redirect()->back()->with('message', 'Company successfully updated.');
    }

    public function checkLogin(Request $request)
    {

        $request->validate([
            'cid' => ['required'],
            'cpass' => ['required']
        ]);

        $user = Company::where('cid', $request->cid)->where('cpass', $request->cpass)->first();
        if (!empty($user)) {
                $request->session()->put('cid', $user->cid);
                $request->session()->put('name', $user->name);
                $request->session()->put('id', $user->id);
                $request->session()->save();
                return redirect('/care-taxi');
        } else {
               return redirect('care-taxi/login')->with('message', 'Incorrect login credentials');
        }
        
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $company = Company::where('cid', $data["cid"])->first();
        if ($company) {
            return redirect()->back()->with('message', 'Company already exist.');
        } else {
            $company = new Company();
            $company->name = $data["name"];
            $company->cid = $data["cid"];
            $company->cpass = $data["password"];
            $company->save();
        }
        return redirect()->back()->with('message', 'Company successfully added.');
        /* return response()->json(array(
            'success' => true,
            'message' => 'Company added successfully.',
        )); */
    }

    public function logout()
    {
        Session::flush();
        return redirect('care-taxi/login');
    }
    
}
