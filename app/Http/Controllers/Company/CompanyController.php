<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return $this->success(($companies), __('Companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->all());
        $ext = $request->logo->extension();
        $filename = time() . '.' . $ext;
        $request->file('logo')->storeAs('uploads', $filename, 'public');
        return $this->success(new CompanyResource($company), __('model.created', ['model' => 'Company']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return $this->success(new CompanyResource($company));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        if ($company->update($request->validated())) 
        {
            return $this->success(new CompanyResource($company), __('model.updated', ['model' => 'Company']));
        }

        return $this->error(__('model.could_not_update', ['model' => 'Company']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if ($company->delete())
        {
            return $this->success(__('model.deleted', ['model' => 'Company']));
        }
        return $this->error(__('model.could_not_delete', ['model' => 'Company']));
    }
}
