<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreEmployeeRequest;
use App\Mail\NewEmployeeCreated;
use App\Models\Employee;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*
        $search = $request->input('search');
        $items = Employee::where(function($q) use($request){
            if($request->filled("search")){
                $q->where('mail_ID', 'LIKE', "%{$request->get('search')}%")   
                  ->orWhere('c_number', 'LIKE', "%{$request->get('search')}%")
                  ->orWhere('c_name', 'LIKE', "%{$request->get('search')}%")
                  ->orWhere('c_dept1', 'LIKE', "%{$request->get('search')}%")
                  ->orWhere('c_dept2', 'LIKE', "%{$request->get('search')}%")
                  ->get();
            }
        })->paginate(4);
        */
        $items = Employee::all();
        return view('employees.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request,Employee $employee)
    {
        $employee = Employee::create();        
        if($request->filled("noti")){
            Mail::to(env("MAIL_ADMIN_EMAIL"))->send(new NewEmployeeCreated($employee));
        }
        return redirect()->route("employees.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view("employees.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route("employees.index");
    }

    public function canDelete(Employee $employee){
        return true;
        return $employee->employee()->count() ? true : false;
    }

    public function exportCSV()
    {
        return response()->streamDownload(function () {
        $company = Employee::all()->toArray();
        $head = [
                'id',
                '従業員ID',
                '契約番号',
                '従業員氏名',
                '部署1',
                '部署2',
                'deleted_at',
                'created_at',
                'updated_at',
        ];
            $handle = fopen('php://output', 'w');
            mb_convert_variables('SJIS', 'UTF-8', $head);
            fputcsv($handle, $head);
            foreach ($company as $com) {
                mb_convert_variables('SJIS', 'UTF-8', $com);
                fputcsv($handle, $com);
            }
            fclose($handle);
        }, 'sample.csv');
    }  
}
