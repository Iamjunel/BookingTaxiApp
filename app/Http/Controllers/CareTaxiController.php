<?php

namespace App\Http\Controllers;

use App\Models\BusinessHours;
use Illuminate\Http\Request;
use App\Models\Company;
use stdClass;

class CareTaxiController extends Controller
{
    //
    public function login()
    {
        return view('care-taxi.login');
    }
    public function index()
    {
        return view('care-taxi.index');
    }
    public function availableSlot()
    {
        return view('care-taxi.booking');
    }

    public function slotDetailDate(){
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
        $bus_hours = BusinessHours::where('id', $data["id"])->first();
        if(!empty($bus_hours)){
            $bus_hours->monday_start = $data["mon_start"];
            $bus_hours->monday_end = $data["mon_end"];
            $bus_hours->tuesday_start = $data["tue_start"];
            $bus_hours->tuesday_start = $data["tue_end"];
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

    public function companyRegister()
    {
        return view('admin.register');
    }
    public function getAllCompany()
    {
        $company = Company::orderBy('id')->get();

        return view('admin.company_list', compact('company'));
        /* return response()->json(array(
            'success' => true,
            'data'   => $company
        ));  */
    }
    public function getCompanyById($id)
    {
        $company = Company::where('id', $id)->first();
        return response()->json(array(
            'success' => true,
            'data'   => $company
        ));
    }
    public function deleteCompanyById($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect()->back()->with('message', 'Company successfully removed.');
        /* return response()->json(array(
            'success' => true,
            'data'   => $company
        ));  */
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

            /* if ($request->loginId) {
                $checkuser = User::where('name', $request->groupCode)->first();
                if ($checkuser) {
                    $checkuser->delete();
                }
                $user = new User();
                $user->name = $request->loginId;
                $user->email = $request->loginId;
                $user->access_number = 1;
                $user->password = Hash::make($request->password);
                $user->save();
            } */
        }
        return redirect()->back()->with('message', 'Company successfully added.');
        /* return response()->json(array(
            'success' => true,
            'message' => 'Company added successfully.',
        )); */
    }
    
}
