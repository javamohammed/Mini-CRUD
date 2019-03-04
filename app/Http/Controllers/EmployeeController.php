<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$employees = \DB::table('employees')->orderBy('id', 'desc')->paginate(10);
        $employees = Employee::with('Company')->get();

        //dd($employees->toArray());
        return view('employee.index',['employees'=>$employees->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies_ = $this->getCompanies();
         return view('employee.create',  ['companies' => $companies_]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'sometimes|email',
            'phone' => 'sometimes|numeric',
            'id_company' => 'required|exists:companies,id',
        ]);
        //dd($data);
        Employee::create($data);
        flash('Employee Add with successful !!')->success();
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $employee = Employee::find($id)->with('Company')->first();
        // dd($employee->toArray());
        return view('employee.show', ['employee' => $employee ]);
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
        $companies_ = $this->getCompanies();
        $employee = Employee::where('id',$id)->first();
        return view('employee.edit', ['employee' => $employee,'companies' => $companies_ ]);
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
             'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'sometimes|email',
            'phone' => 'sometimes|numeric',
            'id_company' => 'required|exists:companies,id',
        ]);
        Employee::where('id', $id)->update($data);
        flash('Employee updated with successful !!')->success();
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee = Employee::find($id);
        $employee->delete();
       flash('Employee deleted with successful !!')->success();
        return redirect()->route('employee.index');
    }

    public function getCompanies(){
         $companies = \DB::table('companies')
                    ->select(array('id', 'name'))
                    ->get();
        $companies_ = array();
        foreach ($companies as $key => $value) {
            $companies_[$value->id] = $value->name;
        }
        return $companies_;
    }
}
