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
use App\Models\PostalCode;

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
                $q->where('id', 'LIKE', "%{$request->get('search')}%")   
                  ->orWhere('name', 'LIKE', "%{$request->get('search')}%")
                  ->orWhere('telephone', 'LIKE', "%{$request->get('search')}%")
                  ->get();
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
        return view("employees.create",compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view("employees.edit",compact('employee'));
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
        /*$request->validate([
            'id' => 'required',
            'name' => 'required',
            'zip_code'=> 'required',
            'address1' => 'required',
            'address2' => 'required',
            'telephone' => 'required',
            'dept1' => 'required',
            'dept2' => 'required',
            'in_charge_id' => 'required',
            'payment_method' => 'required',
            'deadline1'=>'required',
            'deadline2'=>'required',
            'remark' => 'required',
            'noti' => 'required',
            'deleted_at'=>'required',
        ]);*/
    
        $employee->update($request->all());
    
        return redirect()->route('employees.index')
                        ->with('success','Employee updated successfully');
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

    //データ出力ボタンを押下時、下記の処理すする
    public function exportCSV()
    {
        return response()->streamDownload(function () {
        $employee = Employee::all()->toArray();
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
            foreach ($employee as $emp) {
                mb_convert_variables('SJIS', 'UTF-8', $emp);
                fputcsv($handle, $emp);
            }
            fclose($handle);
        }, 'sample.csv');
    }  

}
