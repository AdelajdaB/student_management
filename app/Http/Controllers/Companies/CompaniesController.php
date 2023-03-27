<?php

namespace App\Http\Controllers\Companies;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Companies\StoreCompanyRequest;
use App\Http\Requests\Companies\UpdateCompanyRequest;
use App\Http\Requests\Companies\UpdateProfileLogoRequest;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Show created companies
        return view('companies.index', ['companies' => Company::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Create new company profile
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {

        $company = Company::create($request->only('name', 'email' , 'website'));

        if ($request->hasFile('logo')) {
            $path = $request->logo->store('public/images');
            $company->update(['logo' => $path]);
        }

        return redirect()->route('companies.dashboard')->with('success', 'Successfully created a New Company Profile');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //Edit Company Profile
        $empls = Employee::all();
        return view('companies.edit', compact('company'))->with('empls', $empls);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->validated());
        return back()->with('success', 'Successfully updated Company profile');
    }

    /**
     * Update Profile Logo
     */
    public function updateProfileLogo(UpdateProfileLogoRequest $request, Company $company)
    {
        if($company->logo) {
            Storage::delete($company->logo);
        }
        $path = $request->image->store('public/images');

        $company->update(['logo' => $path]);
        return back()->with('success', 'Successfully updated Company profile Logo');
    }


    public function destroyLogo(Company $company)
    {
        if ($company->logo) {
            Storage::delete($company->logo);

            $company->update(['logo' => null]);
        }

        return back()->with('success', 'Successfully deleted profile logo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        if ($company->logo) {
            Storage::delete($company->logo);
        }

        $company->delete();

        return redirect()->route('companies.dashboard')->with('success', 'Successfully deleted profile and all assets related to them.');
        
    }
}
