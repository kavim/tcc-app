<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Foundation\Application;
use Intervention\Image\ImageManagerStatic as Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $companies = Company::get();
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $social_networks = config('custom.social_networks');

        return view('admin.companies.create', compact('social_networks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'company_email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'company_name' => 'required|max:150',
            'bio' => 'required|max:9999',
            'resume' => 'required|max:9999',
            'phone' => 'required',
            'website' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $data['name'],
                'slug_name' => \Str::slug($data['name']),
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'user_type_id' => 3,
            ]);

            $company = Company::create([
                'user_id' => $user->id,
                'email' => $data['company_email'],
                'name' => $data['company_name'],
                'slug' => \Str::slug($data['company_name']),
                'bio' => $data['bio'],
                'phone' => $data['phone'],
                'social_networks' => $data['social_networks'],
                'website' => $data['website'],
                'resume' => $data['resume'],
            ]);

            if ($request->hasFile('image')) {
                $src = $request->file('image')->store("company/".$company->id, 'public');

                $img = $company->update(['avatar' => $src]);

                $image = Image::make(storage_path("app/public/" . $src))->fit(300, 300)->save();
                $image->save();
            }

            DB::commit();

            return redirect()->route('admin.companies.index')->with('success', 'Empresa cadastrada com sucesso');
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $social_networks = $company->social_networks;
        $social_networks = array_merge(config('custom.social_networks'), $social_networks ?? []);
        return view('admin.companies.edit', compact('company', 'social_networks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'company_email' => ['required', 'string', 'email', 'max:255'],
            'company_name' => 'required|max:150',
            'bio' => 'required|max:9999',
            'resume' => 'required|max:9999',
            'phone' => 'required',
            'website' => 'required',
        ]);

        $company = Company::findOrFail($id);

        $data = $request->all();

        $company = $company->update([
            'email' => $data['company_email'],
            'name' => $data['company_name'],
            'slug' => \Str::slug($data['company_name']),
            'bio' => $data['bio'],
            'phone' => $data['phone'],
            'social_networks' => $data['social_networks'],
            'website' => $data['website'],
            'resume' => $data['resume'],
        ]);

        if ($request->hasFile('image')) {
            $src = $request->file('image')->store("company/".$company->id, 'public');

            $img = $company->update(['avatar' => $src]);

            $image = Image::make(storage_path("app/public/" . $src))->fit(300, 300)->save();
            $image->save();
        }

        return redirect()->route('admin.companies.index')->with('success', 'Empresa atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function verifyCompany($id)
    {
        $company = Company::findOrFail($id);
        $company->update(['verified' => $company->verified ? false : true]);

        $message = $company->verified ? 'Company verified successfully' : 'Company unverified successfully';
        return redirect()->back()->with('success', $message);

    }
}
