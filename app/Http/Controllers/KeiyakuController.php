<?php

namespace App\Http\Controllers;

use App\Models\Keiyakukigyou;
use Illuminate\Http\Request;
use App\Http\Controllers\Post;
//use App\Http\Controllers\DB;
use DB;

class KeiyakuController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $search = $request->input('search');
        $items = Keiyakukigyou::where(function($q) use($request){
            if($request->filled("search")){
                $q->where('name', 'LIKE', "%{$request->get('search')}%");
            }
        })->paginate();
    
        return view('keiyakuichiran', compact('items'));
    }

    public function canDelete(Keiyakukigyou $keiyaku){
        return true;
        return $keiyaku->employees()->count() ? true : false;
    }

    public function destroy(Keiyakukigyou $keiyaku) 
    {
        return $keiyaku->delete();
    }

    public function company()
    {
        return view('keiyakutoroku');
    }

}
