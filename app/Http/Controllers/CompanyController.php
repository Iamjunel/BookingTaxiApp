<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
    //
    public function getAllCompany(){
        $company = Company::orderBy('id')->get();
        return response()->json(array(
            'success' => true,
            'data'   => $company
        )); 
    }
    public function getCompanyById($id)
    {
        $company = Company::where('id',$id)->first();
        return response()->json(array(
            'success' => true,
            'data'   => $company
        ));
    }
    public function deleteCompanyById($id)
    {
        $company = Company::find($id);
        $company->delete();
        $company = Company::orderBy('id')->get();
        return response()->json(array(
            'success' => true,
            'data'   => $company
        )); 
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $company = Company::where('cid', $data["cid"])->first();
        if ($company) {
            return response()->json(array(
                'success' => false,
                'message' => 'This company id is already added.',
                'data'   => [],
            ));
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

        return response()->json(array(
            'success' => true,
            'message' => 'Company added successfully.',
        ));
    }
}
