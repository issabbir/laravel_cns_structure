<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\StoreInterface;
use App\Contracts\CompanyInterface;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Session;
use Exception;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StoreInterface $store)
    {
        return view('admin.store.index',['data'=>$store->findAll()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null, StoreInterface $storeRepo, CompanyInterface $companyRepo, Store $storeEloquent)
    {
        if($id)
        {
            $title = "Edit Store";
            $store = $storeRepo->find($id);
        }else {
            $store = $storeEloquent;
            $title = "Add New Store";
        }
        $message = "";
        return view('admin.store.add-store', ['message' => $message, 'title' => $title, 'store'=>$store, 'companylist'=>$companyRepo->findAll()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id=null, StoreRequest $request, StoreInterface $storeRepo, CompanyInterface $companyRepo, Store $storeEloquent)
    {
        $message = "";
        try
        {
            if ($request->isMethod("POST")) {
                $requestExcept = $request->except(['save', '_token']);

                if ($id) {
                    $message = "Store Updated Successfully!";
                    $storeEloquent = $storeRepo->find($id);


                    if ($storeEloquent->id == $id)
                        $data = $storeEloquent->update($request->all());
                } else {
                    $storeEloquent->fill($request->all());
                    $data = $storeRepo->save($storeEloquent);
                    $message = "Store Added Successfully!";
                }
                if($data)
                {
                    Session::flash('m-class', 'alert-success');
                    Session::flash('message', $message);
                    return redirect()->route('store-list');
                }
            }
        }
        catch(\Exception $e)
        {
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
    public function destroy($id, StoreInterface $storeTable)
    {
        if($id){
             $storeTable->delete($id);
             $message = 'Deleted Successfully!';
             Session::flash('m-class', 'alert-success');
             Session::flash('message', $message);
             return redirect()->route('store-list');
        }

    }
}
