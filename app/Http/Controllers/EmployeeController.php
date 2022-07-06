<?php

namespace App\Http\Controllers;

use App\Exports\EmployeesExport;
use App\Models\Employee;
use App\Models\Payment;
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
    public function index()
    {
       $items = Employee::paginate(8);
       return view('employees.index', compact('items'));
    }

    // 検索ボタンの処理
    public function search(){
        $search = $_GET['search'];
        $items = Employee::where('id','LIKE','%'.$search.'%')
                ->orwhere('name', 'like', '%'.$search.'%')
                ->orwhere('zip_code', 'like', '%'.$search.'%')
                ->orwhere('address1', 'like', '%'.$search.'%')
                ->orwhere('telephone', 'like', '%'.$search.'%')
                ->get();
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
    public function edit(Employee $employee,Payment $payment)
    {
        $payment = Payment::all();
        return view("employees.edit",compact('employee','payment'));
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
                'in_charge_id',
                'payment-method',
                'billingdate',
                'paymentdate',
                'remark',
                'remark2',
                'remark3',
                'noti',
                'deleted_at',
                'created_at',
                'updated_at',
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
