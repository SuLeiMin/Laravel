<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMtcompanyRequest;
use App\Http\Requests\UpdateMtcompanyRequest;
use App\Mail\NewCompanyCreated;
use App\Models\Dtseikyusime;
use App\Models\Mtcompany;
use App\Models\Mtkessai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MtcompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $items = Mtcompany::where(function($q) use($request){
            if($request->filled("search")){
                $q->where('id', 'LIKE', "%{$request->get('search')}%")   
                  ->orWhere('name', 'LIKE', "%{$request->get('search')}%")
                  ->orWhere('zip_code', 'LIKE', "%{$request->get('search')}%")
                  ->orWhere('address1', 'LIKE', "%{$request->get('search')}%")
                  ->orWhere('telephone', 'LIKE', "%{$request->get('search')}%")
                  ->get();
            }
        })->paginate(5);
        return view('mtcompany.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $kessai = Mtkessai::pluck('kessai', 'kessai_code');
        $selectedID = 2;

        $shimebi = Dtseikyusime::all();

        $torokubi = Mtcompany::all();

        return view("mtcompany.create")->with(compact('kessai','selectedID','shimebi','torokubi'));              
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMtcompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMtcompanyRequest $request)
    {  
        $mtcompany = Mtcompany::create($request->validated());        
        if($request->filled("noti")){
            Mail::to(env("MAIL_ADMIN_EMAIL"))->send(new NewCompanyCreated($mtcompany));
        }
        return redirect()->route("mtcompany.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view("mtcompany.create");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Mtcompany $mtcompany)
    {
        return view("mtcompany.edit",compact('mtcompany'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMtcompanyRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMtcompanyRequest $request,Mtcompany $mtcompany)
    {
        $mtcompany->update($request->all());
        return redirect()->route('mtcompany.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mtcompany $mtcompany)
    {
        
        $mtcompany->delete();
        return redirect()->route("mtcompany.index");
    }

    public function canDelete(Mtcompany $mtcompany){
        return true;
        return $mtcompany->mtcompany()->count() ? true : false;
    }

    public function export_company_CSV()
    {
        return response()->streamDownload(function () {
        $mtcompany = Mtcompany::all()->toArray();
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
            foreach ($mtcompany as $mtcom) {
                mb_convert_variables('SJIS', 'UTF-8', $mtcom);
                fputcsv($handle, $mtcom);
            }
            fclose($handle);
        }, 'sample.csv');
    }  

}
