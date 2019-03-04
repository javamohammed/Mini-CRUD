<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Mail\NotificationCompany;

class CompanyController extends Controller
{
    public function __construct(){

    $this->middleware('auth'/*, ['except' => ['index','show', 'create', 'edit']]*/);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$companies = Company::paginate(10);
        $companies = \DB::table('companies')->orderBy('id', 'desc')->paginate(10);
        return view('company.index',['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'logo' => 'sometimes|image|dimensions:min_width=100,min_height=100',
            'email' => 'sometimes',
            'website' => 'sometimes',
        ]);

        if($request->hasFile('logo')){
          $data['logo'] = $request->file('logo')->store('public/companies');
          $data['logo'] = str_replace('public/','',$data['logo']);
        }
        Company::create($data);
        \Mail::to(\Auth::user()->email)->send(new NotificationCompany($data));
        flash('Company Add with successful !!')->success();
        return redirect()->route('company.index');
        //
      //echo   $request->file('logo')->store('companies');
        //    \Storage::delete('companies/RNDX61J3WATViK9Vd4jc6XmR1CM95ZIzNBtdBmE2.png');
        #dd($request->file('logo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::where('id',$id)->first();
        return view('company.show', ['company' => $company ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('id',$id)->first();
        return view('company.edit', ['company' => $company ]);
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
        $data = $request->validate([
            'name' => 'required',
            'logo' => 'sometimes|image|dimensions:min_width=100,min_height=100',
            'email' => 'sometimes',
            'website' => 'sometimes',
        ]);

        if($request->hasFile('logo')){
          $data['logo'] = $request->file('logo')->store('public/companies');
          $data['logo'] = str_replace('public/','',$data['logo']);
          \Storage::delete(Company::find($id)->logo);
        }
        Company::where('id', $id)->update($data);
        flash('Company updated with successful !!')->success();
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->employees()->delete();
        $company->delete();
       flash('Company deleted with successful !!')->success();
        return redirect()->route('company.index');
    }
}
