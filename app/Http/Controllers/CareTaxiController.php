<?php

namespace App\Http\Controllers;

use App\Models\BusinessHours;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyStatus;
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

    public function slotDetailDate($id,$date){
        if (!session()->has('cid')) {
            return redirect('care-taxi/login');
        }
        $company = Company::with('business_hours')->where('id', $id)->first();
        $bus_hours = $company->business_hours;
        $day = date('l', strtotime($date));
        $time = array();
        $time_start =null;
        $time_end =null;
        if($day == "Monday"){
            $time_start = $bus_hours->monday_start;
            $time_end = $bus_hours->monday_end;
        }else if($day == "Tuesday"){
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
        }else {
            $time_start = "00:00";
            $time_end = "00:00";
        }
        $company_status = CompanyStatus::Where('company_id', $id)->where('date', $date)->get();
        if (empty($company_status)) {
            $status = "times";
            $comment = "";
            $curr_time = $date . ' ' . $time_start;
            array_push($time, [
                'time' => date('h:ia', strtotime($curr_time)),
                'status' => $status,
                'comment' => $comment,
            ]);
            $current = strtotime($curr_time);
            $start = strtotime($time_start);
            $end = strtotime($time_end);


            while ($current >= $start && $current < $end) {
                $added_time = strtotime("+30 minutes", $current);
                if ($added_time < $end) {
                    array_push($time, [
                        'time' => date('h:ia', $added_time),
                        'status' => $status,
                        'comment' => $comment,
                    ]);
                } else {
                    array_push($time, [
                        'time' => date('h:ia', $end),
                        'status' => $status,
                        'comment' => $comment,
                    ]);
                    break;
                }
                $current = $added_time;
            }
        } else {
            $status = "times";
            $comment = "";
            $curr_time = $date . ' ' . $time_start;
            foreach ($company_status as $company) {

                if ($company->time == date('h:ia', strtotime($curr_time))) {
                    $status = $company->status;
                    $comment = $company->comment;
                    break;
                }
            }
            array_push($time, [
                'time' => date('h:ia', strtotime($curr_time)),
                'status' => $status,
                'comment' => $comment,
            ]);
            $current = strtotime($curr_time);
            $start = strtotime($time_start);
            $end = strtotime($time_end);

            while ($current >= $start && $current < $end) {
                $added_time = strtotime("+30 minutes", $current);
                if ($added_time < $end) {

                    foreach ($company_status as $company) {

                        if ($company->time == date('h:ia', $added_time)) {
                            $status = $company->status;
                            $comment = $company->comment;
                            break;
                        }
                    }
                    array_push(
                        $time,
                        [
                            'time' => date('h:ia', $added_time),
                            'status' => $status,
                            'comment' => $comment,

                        ]
                    );
                } else {
                    foreach ($company_status as $company) {
                        if ($company->time == date('h:ia', $added_time)) {
                            $status = $company->status;
                            $comment = $company->comment;
                            break;
                        }
                    }
                    array_push($time, [
                        'time' => date('h:ia', $end),
                        'status' => $status,
                        'comment' => $comment,
                    ]);
                    break;
                }
                $current = $added_time;
            }
        }
       

        /* return response()->json(array(
            'success' => true,
            'data'   => $company,
            'day'    => $time,
            'curr'   => date('h:i', strtotime($curr_time))
        ));  */
        return view('care-taxi.show_status', compact('time','date','company','id'));
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
        if ($day == "Monday"
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
        
        
        $company_status = CompanyStatus::Where('company_id',$id)->where('date',$date)->get();
        if(empty($company_status)){
            $status = "times";
            $comment = "";
            $curr_time = $date . ' ' . $time_start;
            array_push($time, [
                'time' => date('h:ia', strtotime($curr_time)),
                'status' => $status,
                'comment' => $comment,
            ]);
            $current = strtotime($curr_time);
            $start = strtotime($time_start);
            $end = strtotime($time_end);

           
            while ($current >= $start && $current < $end) {
                $added_time = strtotime("+30 minutes", $current);
                if ($added_time < $end) {
                    array_push($time, [
                        'time' => date('h:ia', $added_time),
                        'status' => $status,
                        'comment' => $comment,            
                    ]);
                } else {
                    array_push($time, [
                        'time' => date('h:ia', $end),
                        'status' => $status,
                        'comment' => $comment,
                        ]);
                    break;
                }
                $current = $added_time;
            }
        }else{
            $status = "times";
            $comment = "";
            $curr_time = $date . ' ' . $time_start;
            foreach ($company_status as $company) {

                if ($company->time == date('h:ia', strtotime($curr_time))) {
                    $status = $company->status;
                    $comment = $company->comment;
                    break;
                }
            }
            array_push($time, [
                'time' => date('h:ia', strtotime($curr_time)),
                'status' => $status,
                'comment' => $comment,
            ]);
            $current = strtotime($curr_time);
            $start = strtotime($time_start);
            $end = strtotime($time_end);
            
            while ($current >= $start && $current < $end) {
                $added_time = strtotime("+30 minutes", $current);
                if ($added_time < $end) {
                    
                    foreach($company_status as $company){
                        
                        if($company->time == date('h:ia', $added_time)){
                            $status = $company->status;
                            $comment = $company->comment;
                            break;
                        }
                    }
                    array_push(
                        $time, [
                            'time' => date('h:ia', $added_time),
                            'status' => $status,
                            'comment' => $comment,
                        
                ]);
                } else {
                    foreach ($company_status as $company) {
                        if ($company->time == date('h:ia', $added_time)) {
                            $status = $company->status;
                            $comment = $company->comment;
                            break;
                        }
                    }
                    array_push($time, [
                        'time' => date('h:ia', $end),
                        'status' => $status,
                        'comment' => $comment,
                        ]);
                    break;
                }
                $current = $added_time;
            }
        }
       
        
        /* return response()->json(array(
            'success' => true,
            'data'   => $company_status,
            'day'    => $time,
        ));  */
        return view('care-taxi.update_status', compact('time', 'date', 'company','id'));
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
    public function statusUpdate(Request $request)
    {
        $data=array();
        $current_date = $request->get('date');
        $company_id =  $request->get('id');

        foreach ($request->all() as $key => $value) {
            if($key !="_token" && $key != 'date' && $key != 'id'){
                $time = explode('-', $key);
              //
              if(count($time)>1){
                    $status = 'status-' . $time[1];
                    $comment = 'comment-' . $time[1];
                    if ($key == $status) {
                        $company_status = CompanyStatus::Where('company_id', $company_id)->where('date', $current_date)->where('time', $time[1])->first();
                        if (!empty($company_status->id)) {
                            $company_status->status = $request->get($status);
                            $company_status->comment = $request->get($comment);
                            $company_status->update();
                        } else {
                            $company_status = new CompanyStatus();
                            $company_status->time = $time[1];
                            $company_status->status = $request->get($status);
                            $company_status->comment = $request->get($comment);
                            $company_status->company_id = $company_id;
                            $company_status->date = $current_date;
                            $company_status->save();
                        }
                     }    
                }
             
            }
        }

       
        return redirect()->back()->with('message', 'Company status successfully updated.'); 
        return response()->json(array(
            'success' => true,
            'message' => $data,
        ));
    }

    public function logout()
    {
        Session::flush();
        return redirect('care-taxi/login');
    }
    
}
