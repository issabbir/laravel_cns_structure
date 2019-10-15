<?php

namespace App\Http\Controllers\Admin\Company;

use Session;
use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Contracts\CompanyInterface;
use App\Contracts\StoreInterface;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

class IndexController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CompanyInterface $company)
    {

        return view('admin.company.index',['data' => $company->findAll()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null, StoreInterface $store, CompanyInterface $companyRepo, Company $companyEloquent)
    {

        if ($id) {
            $title = "Edit Company";
            $company = $companyRepo->find($id);
        } else {
            $company = $companyEloquent;
            $title = "Add New Company";
        }

        $storedata = $store->findAll();
        $message = "";
        return view('admin.company.add-company', ['message' => $message, "company" => $company, 'storeList' => $storedata, 'title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id = null, CompanyRequest $request, CompanyInterface $company, Company $companyEloquent)
    {
        $message = "";

        try {
            if ($request->isMethod("POST")) {
                $requestExcept = $request->except(['save', '_token']);

                if ($id) {
                    $message = "Company Updated Successfully!";
                    $companyEloquent = $company->find($id);


                    if ($companyEloquent->id == $id)
                        $data = $companyEloquent->update($request->all());
                } else {
                    $companyEloquent->fill($request->all());

                    //print_r($companyEloquent);exit;
                    $data = $company->save($companyEloquent);
                    $message = "Company Added Successfully!";
                }
                if($data)
                {
                    Session::flash('m-class', 'alert-success');
                    Session::flash('message', $message);
                    return redirect()->route('company-list');
                }

            }
        } catch (\Exception $e) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                        'exception' => [$message]
            ]);
            throw $error;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, CompanyInterface $companyTable)
    {
        if($id){
             $companyTable->delete($id);
             $message = 'Deleted Successfully!';
             Session::flash('m-class', 'alert-success');
             Session::flash('message', $message);
             return redirect()->route('company-list');
        }

    }
}
