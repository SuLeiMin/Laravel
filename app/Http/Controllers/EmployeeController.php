<?php

namespace App\Http\Controllers;

use App\Exports\EmployeesExport;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Mail\NewEmployeeCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $items = Employee::where(function($q) use($request){
            if($request->filled("search")){
                $q->where('name', 'LIKE', "%{$request->get('search')}%");
            }
        })->paginate();
    
        return view('employees.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("employees.create");
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());

        if($request->filled("noti")){
            Mail::to(env("MAIL_ADMIN_EMAIL"))->send(new NewEmployeeCreated($employee));
        }

        return redirect()->route("employees.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view("employees.create");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route("employees.index");
    }

    public function canDelete(Employee $employee){
        return true;
        return $employee->employees()->count() ? true : false;
    }

    public function exportCSV()
  {
      return response()->streamDownload(function () {
      $users = Employee::all()->toArray();
      $head = [
            'id',
            'name',
            'zipcode',
            'add1',
            'add2',
            'telephone',
            'dept1',
            'dept2',
            '-',
            'payment-method',
            '-',
            '-',
            'remark',
            '-',
      ];
        $handle = fopen('php://output', 'w');
        mb_convert_variables('SJIS', 'UTF-8', $head);
        fputcsv($handle, $head);
        foreach ($users as $row) {
            mb_convert_variables('SJIS', 'UTF-8', $row);
            fputcsv($handle, $row);
        }
        fclose($handle);
    }, 'sample.csv');
  }
        
}
