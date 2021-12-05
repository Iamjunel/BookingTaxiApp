<?php

namespace App\Http\Controllers;

use App\Models\BusinessHours;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyImages;
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
        $company_images = CompanyImages::where('company_id',$id)->get();
        return view('user.company_detail',compact('company','company_images'));
    } 
    public function availableSlot()
    {
        return view('user.available_slot');
    }

    public function slotDetailDate($id,$date = null)
    {   
        if($date == null){
            $date = date('Y-m-d');
        }
        
        $company = Company::with('business_hours')->where('id', $id)->first();

        $previous_date =  date('Y-m-d', strtotime($date . ' -7 day'));
        $next_date = date('Y-m-d', strtotime($date . ' +7 day'));
        if ($company->business_hours) {
            $bus_hours = $company->business_hours;
            $day = date('l', strtotime($date));
            $time = array();
            $time_start = null;
            $time_end = null;
            //get the earliest time
            $time_start = $bus_hours->monday_start;
            $earliest_time =  strtotime($date . ' ' . $time_start);


            if($earliest_time > strtotime($date . ' ' . $bus_hours->tuesday_start)){
                $time_start = $bus_hours->tuesday_start;
                $earliest_time =  strtotime($date . ' ' . $time_start);
            }
            if ($earliest_time > strtotime($date . ' ' . $bus_hours->wednesday_start)) {
                $time_start = $bus_hours->wednesday_start;
                $earliest_time =  strtotime($date . ' ' . $time_start);
            }
            if ($earliest_time > strtotime($date . ' ' . $bus_hours->thursday_start)) {
                $time_start = $bus_hours->thursday_start;
                $earliest_time =  strtotime($date . ' ' . $time_start);
            }
            if ($earliest_time > strtotime($date . ' ' . $bus_hours->friday_start)) {
                $time_start = $bus_hours->friday_start;
                $earliest_time =  strtotime($date . ' ' . $time_start);
            }
            if ($earliest_time > strtotime($date . ' ' . $bus_hours->saturday_start)) {
                $time_start = $bus_hours->saturday_start;
                $earliest_time =  strtotime($date . ' ' . $time_start);
            }
            if ($earliest_time > strtotime($date . ' ' . $bus_hours->sunday_start)) {
                $time_start = $bus_hours->sunday_start;
                $earliest_time =  strtotime($date . ' ' . $time_start);
            }

            $time_end = $bus_hours->monday_end;
            $longest_time =  strtotime($date . ' ' . $time_end);


            if ($longest_time < strtotime($date . ' ' . $bus_hours->tuesday_end)) {
                $time_end = $bus_hours->tuesday_end;
                $longest_time =  strtotime($date . ' ' . $time_end);
            }
            if ($longest_time < strtotime($date . ' ' . $bus_hours->wednesday_end)) {
                $time_end = $bus_hours->wednesday_end;
                $longest_time =  strtotime($date . ' ' . $time_end);
            }
            if ($longest_time < strtotime($date . ' ' . $bus_hours->thursday_end)) {
                $time_end = $bus_hours->thursday_end;
                $longest_time =  strtotime($date . ' ' . $time_end);
            }
            if ($longest_time < strtotime($date . ' ' . $bus_hours->friday_end)) {
                $time_end = $bus_hours->friday_end;
                $longest_time =  strtotime($date . ' ' . $time_end);
            }
            if ($longest_time < strtotime($date . ' ' . $bus_hours->saturday_end)) {
                $time_end = $bus_hours->saturday_end;
                $longest_time =  strtotime($date . ' ' . $time_end);
            }
            if ($longest_time < strtotime($date . ' ' . $bus_hours->sunday_end)) {
                $time_end = $bus_hours->sunday_end;
                $longest_time =  strtotime($date . ' ' . $time_end);
            }

            $curr_time = $date . ' ' . $time_start;
            $company_status = CompanyStatus::Where('company_id', $id)->where('date', $date)->get();

            array_push($time, [
                'time' => date('h:ia', strtotime($curr_time))
            ]);
            $current = strtotime($curr_time);
            $start = strtotime($date . ' ' . $time_start);
            $end = strtotime($date . ' ' . $time_end);

            while ($current >= $start && $current < $end) {
                $added_time = strtotime("+30 minutes", $current);
                if ($added_time < $end) {

                    array_push($time, [
                        'time' => date('h:ia', $added_time),
                    ]);
                } else {
                    array_push($time, [
                        'time' => date('h:ia', $end),
                    ]);
                    break;
                }
                $current = $added_time;
            }


            for ($count = 0; $count < count($time); $count++) {
                for($day = 0; $day < 7;$day++){
                    if($day > 0){
                        $curr_date = date('Y-m-d',strtotime('+'.$day.'days',strtotime($date)));
                    }else{
                        $curr_date = $date;
                    }
                    $company_status = CompanyStatus::Where('company_id', $id)->where('date', $curr_date)->where('time', $time[$count])->first();
                    if (isset($company_status->status)) {
                        $time[$count]["status_" . $curr_date] = $company_status->status;
                    } else {
                        $time[$count]["status_" . $curr_date] = null;
                    }
                }
            }
            /* if (count($company_status) == 0) {
                $status = "times";
                $comment = "";
                $curr_time = $date . ' ' . $time_start;
                array_push($time, [
                    'time' => date('h:ia', strtotime($curr_time)),
                    'status' => $status,
                    'comment' => $comment,
                ]);
                $current = strtotime($curr_time);
                $start = strtotime($date . ' ' . $time_start);
                $end = strtotime($date . ' ' . $time_end);

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
                $start = strtotime($date . ' ' . $time_start);
                $end = strtotime($date . ' ' . $time_end);

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
            } */
        }
        $com=Company::where('id',$id)->first();
        $not_current = true;
        if ($date <= date('Y-m-d')
        ) {
            $not_current = false;
        }

        $date_jp = date('Y年m月d日', strtotime($date));
        $date_jp = $date_jp. '~' . date('Y年m月d日', strtotime('+7days',strtotime($date)));
       /*  return response()->json(array(
            'success' => true,
            'day'    => $time
        ));  */
        return view('user.company_slot_detail', compact('time', 'date','com', 'company', 'id', 'previous_date', 'next_date', 'not_current', 'date_jp'));
    }
    public function availableSlotDetailDate($date)
    {
        
        $time = array();

        $time_start = null;
        $time_end = null;

        $company = Company::orderBy('id')->get();
       
        $time_start = "01:00";
        $time_end = "23:59";
        $curr_time = $date . ' ' . $time_start;
        array_push($time, [
            'time' => date('h:ia', strtotime($curr_time))
        ]);
        $current = strtotime($curr_time);
        $start = strtotime($date . ' ' . $time_start);
        $end = strtotime($date . ' ' . $time_end);

        while ($current >= $start && $current < $end) {
            $added_time = strtotime("+30 minutes", $current);
            if ($added_time < $end) {

                array_push($time, [
                    'time' => date('h:ia', $added_time),
                ]);
            } else {
                array_push($time, [
                    'time' => date('h:ia', $end),
                ]);
                break;
            }
            $current = $added_time;
        }
       

        $previous_date =  date('Y-m-d', strtotime($date . ' -1 day'));
        $next_date = date('Y-m-d', strtotime($date . ' +1 day'));
        $not_current = true;

        if (
            $date <= date('Y-m-d')
        ) {
            $not_current = false;
        }

        $date_jp = date('Y年m月d日', strtotime($date));

        $day = date('l', strtotime($date));

        for($count = 0;$count<count($time);$count++){
            foreach($company as $com){
                $company_status = CompanyStatus::Where('company_id', $com->id)->where('date', $date)->where('time', $time[$count])->first();
                if(isset($company_status->status)){
                $time[$count]["status_".$com->name]= $company_status->status;
                }else{
                $time[$count]["status_" . $com->name] = null;
                }  
            }  
        }

        return view('user.slot_detail_date', compact('time', 'date', 'company', 'previous_date', 'next_date', 'not_current', 'date_jp'));
    }
    public function contactDetail($id,$date,$time,$status){
        $company = Company::with('business_hours')->where('id', $id)->first();
        $company_status = CompanyStatus::where('company_id',$id)->where('date',$date)->where('time',$time)->first();
        $date_jp = date('Y年m月d日', strtotime($date));
        return view('user.contact_detail', compact('company','company_status','date_jp','date','time','status'));
    }
   
    

   


    public function pagenotfound()
    {
        return view('notfound');
    }
}
