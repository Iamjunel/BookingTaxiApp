<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
    //
    public function login(){
        return view('admin.login');
    }
    public function index()
    {
        return view('admin.index');
    }
    public function companyRegister()
    {
        return view('admin.register');
    }
    public function getAllCompany(){
        $company = Company::orderBy('id')->get();
        
        return view('admin.company_list',compact('company'));
        /* return response()->json(array(
            'success' => true,
            'data'   => $company
        ));  */
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
        return redirect()->back()->with('message', '会社の削除完了しました。');
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
            return redirect()->back()->with('message', '既に登録済みです。');
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
        return redirect()->back()->with('message', '会社の登録完了しました。');
        /* return response()->json(array(
            'success' => true,
            'message' => 'Company added successfully.',
        )); */
    }
    public function update(Request $request, $id){
        var_dump($request);die;
    }
    

}
