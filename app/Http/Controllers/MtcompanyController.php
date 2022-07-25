<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mtcompany;
use App\Http\Requests\StoreMtcompanyRequest;
use App\Models\Billing;
use App\Models\Incharge;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewCompanyCreated;

class MtcompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $this->search($request);

        return view('mtcompanies.index', compact('items'));
    }
    /**
     * search data from database
     */
    private function search(Request $request)
    {
        return Mtcompany::where(function ($q) use ($request) {
            if ($request->filled("id")) {
                $q->where('id', $request->get('id'));
            }
            if ($request->filled("company_name")) {
                $q->where('company_name', 'LIKE', "%{$request->get('company_name')}%");
            }
            if ($request->filled("zipcode")) {
                $q->where('zipcode', $request->get('zipcode'));
            }
            if ($request->filled("address1")) {
                $q->where('address1', 'LIKE', "%{$request->get('address1')}%");
            }
            if ($request->filled("tel")) {
                $q->where('tel', 'LIKE', "%{$request->get('tel')}%");
            }
        })->paginate(5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kessai = Billing::pluck('kessai', 'kessai_code');
        $selectedID = 2;
        $shimebi = Payment::all();
        $incharge = Incharge::all();
        return view("mtcompanies.create",compact('kessai','selectedID','shimebi','incharge'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMtcompanyRequest $request)
    {
        $mtcompany = Mtcompany::create($request->validated());     
        if($request->filled("noti")){
            Mail::to(env("MAIL_ADMIN_EMAIL"))->send(new NewCompanyCreated($mtcompany));
        }
        return redirect()->route("mtcompanies.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mtcompany $mtcompany)
    {
        $mtcompany->delete();
        return redirect()->route("mtcompanies.index");
    }

    public function canDelete(Mtcompany $mtcompany){
        if($mtcompany){
            return $mtcompany->mtemployees()->count() ? false : true;
        }
        return true;
    }

    public function export_company_CSV()
    {
        return response()->streamDownload(function () {
            $mtcompany = Mtcompany::all()->toArray();
            $head = [
                'id',
                'incharge_id',
                'name',
                'zipcode',
                'add1',
                'add2',
                'telephone',
                'dept1',
                'dept2',
                'kessai',
                'seikyu_shimebi',
                'kijitsu',
                'remark',
                'remark2',
                'remark3',
                'email_send',
                'syoteijikan',
                'kyukeijikan',
                'youbi',
                'keiyakukikan',
                'deleted_at',
                'employee_id',
                'created_at',
                'updated_at'
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
