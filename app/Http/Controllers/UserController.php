<?php

namespace App\Http\Controllers;

use App\Models\BusinessHours;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyStatus;
use stdClass;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //

    public function index()
    {
        return view('user.index');
    }
    public function getAllCompany()
    {
        $day = strtolower(date('l'));
        $company = Company::with('business_hours')->orderBy('id')->get();
        return view('user.company_list', compact('company','day'));
    }
    public function getCompanyDetail($id){
        $company = Company::with('business_hours')->where('id',$id)->first();
        return view('user.company_detail',compact('company'));
    } 
    public function availableSlot()
    {
        return view('user.available_slot');
    }

    public function slotDetailDate($id)
    {
        $date=date('Y-m-d');
        $company = Company::with('business_hours')->where('id', $id)->first();
        $bus_hours = $company->business_hours;
        $day = date('l', strtotime($date));
        $time = array();
        $time_start = null;
        $time_end = null;
        /* if ($day == "Monday") {
            $time_start = $bus_hours->monday_start;
            $time_end = $bus_hours->monday_end;
        } else if ($day == "Tuesday") {
            $time_start = $bus_hours->tuesday_start;
            $time_end   = $bus_hours->tuesday_end;
        } else if ($day == "Wednesday") {
            $time_start = $bus_hours->wednesday_start;
            $time_end   = $bus_hours->wednesday_end;
        } else if ($day == "Thursday") {
            $time_start = $bus_hours->thursday_start;
            $time_end   = $bus_hours->thursday_end;
        } else if ($day == "Friday") {
            $time_start = $bus_hours->friday_start;
            $time_end   = $bus_hours->friday_end;
        } else if ($day == "Saturday") {
            $time_start = $bus_hours->saturday_start;
            $time_end   = $bus_hours->saturday_end;
        } else if ($day == "Sunday") {
            $time_start = $bus_hours->sunday_start;
            $time_end   = $bus_hours->sunday_end;
        } else { */
            $time_start = "01:00";
            $time_end = "23:59";
        //}
        $monday = date("Y-m-d", strtotime('monday this week'));
        $monday_status = CompanyStatus::Where('id',$id)->where('date',$monday)->where('time',$time_start)->first();
        $tuesday = date("Y-m-d", strtotime('tuesday this week'));
        $tuesday_status = CompanyStatus::Where('id', $id)->where('date', $tuesday)->where('time', $time_start)->first();
        $wednesday = date("Y-m-d", strtotime('wednesday this week'));
        $wednesday_status = CompanyStatus::Where('id', $id)->where('date', $wednesday)->where('time', $time_start)->first();
        $thursday = date("Y-m-d", strtotime('thursday this week'));
        $thursday_status = CompanyStatus::Where('id', $id)->where('date', $thursday)->where('time', $time_start)->first();
        $friday = date("Y-m-d", strtotime('friday this week'));
        $friday_status = CompanyStatus::Where('id', $id)->where('date', $friday)->where('time', $time_start)->first();
        $saturday = date("Y-m-d", strtotime('saturday this week'));
        $saturday_status = CompanyStatus::Where('id', $id)->where('date', $saturday)->where('time', $time_start)->first();
        $sunday = date("Y-m-d", strtotime('sunday this week'));
        $sunday_status = CompanyStatus::Where('id', $id)->where('date', $sunday)->where('time', $time_start)->first();
        $curr_time = $date . ' ' . $time_start;

        array_push($time, [
            'time' => date('h:i a', strtotime($curr_time)),
            'monday' => $monday_status,
            'tuesday' => $tuesday_status,
            'wednesday' => $wednesday_status,
            'thursday' => $thursday_status,
            'friday' => $friday_status,
            'saturday' => $saturday_status,
            'sunday' => $sunday_status,                
            ]);
        $current = strtotime($curr_time);
        $start = strtotime($time_start);
        $end = strtotime($time_end);

        while ($current >= $start && $current < $end) {
            $added_time = strtotime("+30 minutes", $current);
            
            if ($added_time < $end) {
                $monday_status = CompanyStatus::Where('id', $id)->where('date', $monday)->where('time', date('h:i a', $added_time))->first();
                $tuesday_status = CompanyStatus::Where('id', $id)->where('date', $tuesday)->where('time', date('h:i a', $added_time))->first();
                $wednesday_status = CompanyStatus::Where('id', $id)->where('date', $wednesday)->where('time', date('h:i a', $added_time))->first();
                $thursday_status = CompanyStatus::Where('id', $id)->where('date', $thursday)->where('time', date('h:i a', $added_time))->first();
                $friday_status = CompanyStatus::Where('id', $id)->where('date', $friday)->where('time', date('h:i a', $added_time))->first();
                $saturday_status = CompanyStatus::Where('id', $id)->where('date', $saturday)->where('time', date('h:i a', $added_time))->first();
                $sunday_status = CompanyStatus::Where('id', $id)->where('date', $sunday)->where('time', date('h:i a', $added_time))->first();
                array_push($time, [
                    'time' => date('h:i a', $added_time),
                    'monday' => $monday_status,
                    'tuesday' => $tuesday_status,
                    'wednesday' => $wednesday_status,
                    'thursday' => $thursday_status,
                    'friday' => $friday_status,
                    'saturday' => $saturday_status,
                    'sunday' => $sunday_status,
                ]);
            } else {
                $monday_status = CompanyStatus::Where('id', $id)->where('date', $monday)->where('time', date('h:i a', $end))->first();
                $tuesday_status = CompanyStatus::Where('id', $id)->where('date', $tuesday)->where('time', date('h:i a', $end))->first();
                $wednesday_status = CompanyStatus::Where('id', $id)->where('date', $wednesday)->where('time', date('h:i a', $end))->first();
                $thursday_status = CompanyStatus::Where('id', $id)->where('date', $thursday)->where('time', date('h:i a', $end))->first();
                $friday_status = CompanyStatus::Where('id', $id)->where('date', $friday)->where('time', date('h:i a', $end))->first();
                $saturday_status = CompanyStatus::Where('id', $id)->where('date', $saturday)->where('time', date('h:i a', $end))->first();
                $sunday_status = CompanyStatus::Where('id', $id)->where('date', $sunday)->where('time', date('h:i a', $end))->first();
                array_push($time, [
                    'time' => date('h:i a', $end),
                    'monday' => $monday_status,
                    'tuesday' => $tuesday_status,
                    'wednesday' => $wednesday_status,
                    'thursday' => $thursday_status,
                    'friday' => $friday_status,
                    'saturday' => $saturday_status,
                    'sunday' => $sunday_status,
                ]);
                break;
            }
            $current = $added_time;
        }

        /* return response()->json(array(
            'success' => true,
            'data'   => $company,
            'day'    => $time,
            'curr'   => date('h:i', strtotime($curr_time))
        ));  */
        return view('user.company_slot_detail', compact('time', 'date', 'company'));
    }
    public function availableSlotDetailDate($date)
    {
        
        $company = Company::orderBy('id')->get();
        $day = date('l', strtotime($date));
        $time = array();
        $time_start = null;
        $time_end = null;
        /* if ($day == "Monday") {
            $time_start = $bus_hours->monday_start;
            $time_end = $bus_hours->monday_end;
        } else if ($day == "Tuesday") {
            $time_start = $bus_hours->tuesday_start;
            $time_end   = $bus_hours->tuesday_end;
        } else if ($day == "Wednesday") {
            $time_start = $bus_hours->wednesday_start;
            $time_end   = $bus_hours->wednesday_end;
        } else if ($day == "Thursday") {
            $time_start = $bus_hours->thursday_start;
            $time_end   = $bus_hours->thursday_end;
        } else if ($day == "Friday") {
            $time_start = $bus_hours->friday_start;
            $time_end   = $bus_hours->friday_end;
        } else if ($day == "Saturday") {
            $time_start = $bus_hours->saturday_start;
            $time_end   = $bus_hours->saturday_end;
        } else if ($day == "Sunday") {
            $time_start = $bus_hours->sunday_start;
            $time_end   = $bus_hours->sunday_end;
        } else { */
        $time_start = "01:00";
        $time_end = "23:59";
        //}
        /* $monday = date("Y-m-d", strtotime('monday this week'));
        $monday_status = CompanyStatus::Where('id', $id)->where('date', $monday)->where('time', $time_start)->first();
        $tuesday = date("Y-m-d", strtotime('tuesday this week'));
        $tuesday_status = CompanyStatus::Where('id', $id)->where('date', $tuesday)->where('time', $time_start)->first();
        $wednesday = date("Y-m-d", strtotime('wednesday this week'));
        $wednesday_status = CompanyStatus::Where('id', $id)->where('date', $wednesday)->where('time', $time_start)->first();
        $thursday = date("Y-m-d", strtotime('thursday this week'));
        $thursday_status = CompanyStatus::Where('id', $id)->where('date', $thursday)->where('time', $time_start)->first();
        $friday = date("Y-m-d", strtotime('friday this week'));
        $friday_status = CompanyStatus::Where('id', $id)->where('date', $friday)->where('time', $time_start)->first();
        $saturday = date("Y-m-d", strtotime('saturday this week'));
        $saturday_status = CompanyStatus::Where('id', $id)->where('date', $saturday)->where('time', $time_start)->first();
        $sunday = date("Y-m-d", strtotime('sunday this week'));
        $sunday_status = CompanyStatus::Where('id', $id)->where('date', $sunday)->where('time', $time_start)->first(); */
        $curr_time = $date . ' ' . $time_start;

        array_push($time, [
            'time' => date('h:i a', strtotime($curr_time))
            /* 'monday' => $monday_status,
            'tuesday' => $tuesday_status,
            'wednesday' => $wednesday_status,
            'thursday' => $thursday_status,
            'friday' => $friday_status,
            'saturday' => $saturday_status,
            'sunday' => $sunday_status, */
        ]);
        $current = strtotime($curr_time);
        $start = strtotime($time_start);
        $end = strtotime($time_end);

        while ($current >= $start && $current < $end) {
            $added_time = strtotime("+30 minutes", $current);

            if ($added_time < $end) {
                /* $monday_status = CompanyStatus::Where('id', $id)->where('date', $monday)->where('time', date('h:i a', $added_time))->first();
                $tuesday_status = CompanyStatus::Where('id', $id)->where('date', $tuesday)->where('time', date('h:i a', $added_time))->first();
                $wednesday_status = CompanyStatus::Where('id', $id)->where('date', $wednesday)->where('time', date('h:i a', $added_time))->first();
                $thursday_status = CompanyStatus::Where('id', $id)->where('date', $thursday)->where('time', date('h:i a', $added_time))->first();
                $friday_status = CompanyStatus::Where('id', $id)->where('date', $friday)->where('time', date('h:i a', $added_time))->first();
                $saturday_status = CompanyStatus::Where('id', $id)->where('date', $saturday)->where('time', date('h:i a', $added_time))->first();
                $sunday_status = CompanyStatus::Where('id', $id)->where('date', $sunday)->where('time', date('h:i a', $added_time))->first(); */
                array_push($time, [
                    'time' => date('h:i a', $added_time)
                    /* 'monday' => $monday_status,
                    'tuesday' => $tuesday_status,
                    'wednesday' => $wednesday_status,
                    'thursday' => $thursday_status,
                    'friday' => $friday_status,
                    'saturday' => $saturday_status,
                    'sunday' => $sunday_status, */
                ]);
            } else {
               /*  $monday_status = CompanyStatus::Where('id', $id)->where('date', $monday)->where('time', date('h:i a', $end))->first();
                $tuesday_status = CompanyStatus::Where('id', $id)->where('date', $tuesday)->where('time', date('h:i a', $end))->first();
                $wednesday_status = CompanyStatus::Where('id', $id)->where('date', $wednesday)->where('time', date('h:i a', $end))->first();
                $thursday_status = CompanyStatus::Where('id', $id)->where('date', $thursday)->where('time', date('h:i a', $end))->first();
                $friday_status = CompanyStatus::Where('id', $id)->where('date', $friday)->where('time', date('h:i a', $end))->first();
                $saturday_status = CompanyStatus::Where('id', $id)->where('date', $saturday)->where('time', date('h:i a', $end))->first();
                $sunday_status = CompanyStatus::Where('id', $id)->where('date', $sunday)->where('time', date('h:i a', $end))->first(); */
                array_push($time, [
                    'time' => date('h:i a', $end)
                    /* 'monday' => $monday_status,
                    'tuesday' => $tuesday_status,
                    'wednesday' => $wednesday_status,
                    'thursday' => $thursday_status,
                    'friday' => $friday_status,
                    'saturday' => $saturday_status,
                    'sunday' => $sunday_status, */
                ]);
                break;
            }
            $current = $added_time;
        }

        /* return response()->json(array(
            'success' => true,
            'data'   => $company,
            'day'    => $time,
            'curr'   => date('h:i', strtotime($curr_time))
        ));  */
        return view('user.slot_detail_date', compact('time', 'date', 'company'));
    }
    public function editDetailDate($id, $date)
    {
        if (!session()->has('cid')) {
            return redirect('care-taxi/login');
        }
        $company = Company::with('business_hours')->where('id', $id)->first();
        $bus_hours = $company->business_hours;
        $day = date('l', strtotime($date));
        $time = array();
        $time_start = null;
        $time_end = null;
        if (
            $day == "Monday"
        ) {
            $time_start = $bus_hours->monday_start;
            $time_end = $bus_hours->monday_end;
        } else if ($day == "Tuesday") {
            $time_start = $bus_hours->tuesday_start;
            $time_end   = $bus_hours->tuesday_end;
        } else if ($day == "Wednesday") {
            $time_start = $bus_hours->wednesday_start;
            $time_end   = $bus_hours->wednesday_end;
        } else if ($day == "Thursday") {
            $time_start = $bus_hours->thursday_start;
            $time_end   = $bus_hours->thursday_end;
        } else if ($day == "Friday") {
            $time_start = $bus_hours->friday_start;
            $time_end   = $bus_hours->friday_end;
        } else if ($day == "Saturday") {
            $time_start = $bus_hours->saturday_start;
            $time_end   = $bus_hours->saturday_end;
        } else if ($day == "Sunday") {
            $time_start = $bus_hours->sunday_start;
            $time_end   = $bus_hours->sunday_end;
        } else {
            $time_start = "00:00";
            $time_end = "00:00";
        }
        $curr_time = $date . ' ' . $time_start;
        array_push($time, ['time' => date('h:ia', strtotime($curr_time))]);
        $current = strtotime($curr_time);
        $start = strtotime($time_start);
        $end = strtotime($time_end);

        while ($current >= $start && $current < $end) {
            $added_time = strtotime("+30 minutes", $current);
            if ($added_time < $end) {
                array_push($time, ['time' => date('h:ia', $added_time)]);
            } else {
                array_push($time, ['time' => date('h:ia', $end)]);
                break;
            }
            $current = $added_time;
        }

        /* return response()->json(array(
            'success' => true,
            'data'   => $company,
            'day'    => $time,
            'curr'   => date('h:i', strtotime($curr_time))
        ));  */
        return view('care-taxi.update_status', compact('time', 'date', 'company'));
    }
    public function edit($id)
    {
        $company = Company::with('business_hours')->where('id', $id)->first();
        if ($company->business_hours == null) {
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
        } else {
            $bh = $company->business_hours;
        }
        return view('care-taxi.company_info', compact('company', 'bh'));
    }
    public function update(Request $request)
    {
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
        if (!empty($bus_hours)) {
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
        } else {
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


    public function pagenotfound()
    {
        return view('notfound');
    }
}
