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
        /*  $company = Company::with('business_hours')->where('id',$id)->first();
        $company_images = CompanyImages::where('company_id',$id)->get();
        return view('user.company_detail',compact('company','company_images')); */
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
        $company_images = CompanyImages::where('company_id', $id)->get();
        return view('user.company_detail', compact('company', 'bh', 'company_images'));
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
                   
                    $current_time =  strtotime(date('Y-m-d h:i a', strtotime($curr_date . ' ' . $time[$count]["time"])));
                    $current_time_range =  strtotime(date('Y-m-d h:i a'));
                    /* var_dump(date('Y-m-d h:i a', strtotime($date . ' ' . $this_time)));
                    var_dump(date('Y-m-d h:i a', strtotime($date . ' ' . $on_time)));die; */
                   // $within_range = false;
                    $within_time_range = false;
                    /* if ($current_time >= $start && $current_time <= $end) {
                        $within_range = true;
                       
                    } */
                    if ($current_time >= $current_time_range) {
                        $within_time_range = true;
                    }
                    /* var_dump(date('Y-m-d h:i a', strtotime($date . ' ' . $time[$count]["time"])));
                    var_dump(date('Y-m-d h:i a'));die; */
                   // var_dump($current_time > $current_time_range);
                    if($curr_date  >= date('Y-m-d') && $within_time_range) {
                        if (isset($company_status->status)) {
                            $time[$count]["status_" . $curr_date] = $company_status->status;
                        } else {
                            $time[$count]["status_" . $curr_date] = 'circle';
                        }
                    }else{
                        $time[$count]["status_" . $curr_date] = 'times';
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
        //$date_jp = $date_jp. '~' . date('Y年m月d日', strtotime('+6days',strtotime($date)));
        $date_jp_w = date('Y年m月d日', strtotime('+6days', strtotime($date)));
       /*  return response()->json(array(
            'success' => true,
            'day'    => $time
        ));  */
        return view('user.company_slot_detail', compact('time', 'date','com', 'company', 'id', 'previous_date', 'next_date', 'not_current', 'date_jp','date_jp_w'));
    }
    public function availableSlotDetailDate($date)
    {
        
        $time = array();

        $time_start = null;
        $time_end = null;

        $company = Company::orderBy('id')->get();
       
        $time_start = "00:00";
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
                $this_time= $time[$count]["time"];
                $company_status = CompanyStatus::Where('company_id', $com->id)->where('date', $date)->where('time', $this_time)->first();
                $bus_hours = BusinessHours::where('company_id',$com->id)->first();
                if($bus_hours){
                   
                    if ($day == "Monday") {
                        $curr_start_time = $bus_hours->monday_start;
                        $curr_end_time = $bus_hours->monday_end;
                    } else if ($day == "Tuesday") {
                        $curr_start_time = $bus_hours->tuesday_start;
                        $curr_end_time = $bus_hours->tuesday_end;
                    } else if ($day == "Wednesday") {
                        $curr_start_time = $bus_hours->wednesday_start;
                        $curr_end_time = $bus_hours->wednesday_end;
                    } else if ($day == "Thursday") {
                        $curr_start_time = $bus_hours->thursday_start;
                        $curr_end_time = $bus_hours->thursday_end;
                    } else if ($day == "Friday") {
                        $curr_start_time = $bus_hours->friday_start;
                        $curr_end_time = $bus_hours->friday_end;
                    } else if ($day == "Saturday") {
                        $curr_start_time = $bus_hours->saturday_start;
                        $curr_end_time = $bus_hours->saturday_end;
                    } else if ($day == "Sunday") {
                        $curr_start_time = $bus_hours->sunday_start;
                        $curr_end_time = $bus_hours->sunday_end;
                    }
                    $on_time = date('h:i a');
                    $start = strtotime(date('Y-m-d h:i a',strtotime($date . ' ' . $curr_start_time)));
                    $end =  strtotime(date('Y-m-d h:i a',strtotime($date . ' ' . $curr_end_time)));
                    $current_time =  strtotime(date('Y-m-d h:i a', strtotime($date . ' '. $this_time)));
                    $current_time_range =  strtotime(date('Y-m-d h:i a'));
                    /* var_dump(date('Y-m-d h:i a', strtotime($date . ' ' . $this_time)));
                    var_dump(date('Y-m-d h:i a', strtotime($date . ' ' . $on_time)));die; */
                    $within_range = false;
                    $within_time_range =false;
                     if ($current_time >= $start && $current_time <= $end) {
                        $within_range = true;
                        if ($current_time >= $current_time_range) {
                            $within_time_range = true;
                        }
                    }
                    
                    /* if (isset($company_status->status) && $within_time_range) {
                        $com_list[] = $com;
                        $time[$count]["status_" . $com->id] = $company_status->status;
                    } else */ if (isset($company_status->status)) {
                        $com_list[] = $com;
                        $time[$count]["status_" . $com->id] = $company_status->status;
                    }else if ($within_range && $within_time_range) {
                        $com_list[] = $com;
                        $time[$count]["status_" . $com->id] = 'circle';
                    } else{
                        $com_list[] = $com;
                        $time[$count]["status_" . $com->id] = 'times';
                    }
                }else{
                    $time[$count]["status_" . $com->id] = null;
                }
                
            }  
        }
        $comp_list = array();
        foreach($company as $com_list){
            $name ='status_'.$com_list->id;
            foreach($time as $t){
                if(isset($t[$name]) && $t[$name] == 'circle'){
                    $comp_list[] = $com_list;
                    break;
                }
            }
        }
         /* return response()->json(array(
            'success' => true,
            'time' => $time,
            'companies'    => $comp_list
        ));  */

        return view('user.slot_detail_date', compact('time', 'date', 'company', 'previous_date', 'next_date', 'not_current', 'date_jp','comp_list'));
    }
    public function contactDetail($id,$date,$time,$status){
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
        $company_images = CompanyImages::where('company_id', $id)->get();
        $company_status = CompanyStatus::where('company_id',$id)->where('date',$date)->where('time',$time)->first();
        $date_jp = date('Y年m月d日', strtotime($date));
        return view('user.contact_detail', compact('company','company_status','date_jp','date','time','status','bh','company_images'));
    }
   
    

   


    public function pagenotfound()
    {
        return view('notfound');
    }
}
