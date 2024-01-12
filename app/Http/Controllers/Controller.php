<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    //NOTE ELOQUENT RELATION BETWEEN DB IS NOT USED..THE DATA ARE SEEDED AS GIVEN.
    public function pollenUnit(){
        return view('pollenpage');
    }
    public function pollenUnitPost(Request $request){
        $pollenUnitData = \App\Models\announced_pu_results::where('polling_unit_uniqueid',$request->pollenUnitId)->get();
        $sumOfPollenData = $pollenUnitData->pluck('party_score')->sum();
       return redirect()->back()
       ->with('pollenUnitData',$pollenUnitData)
       ->with('sumOfPollenData',$sumOfPollenData);
    }
    public function localGovt(){
        //gets all local govt in array
        $lga_datas = \App\Models\lga::all();
        //local govt data is passed into the view
        return view('localGovt',['lga_datas'=>$lga_datas]);
    }
    public function localGovtPost(Request $request){
        //with the selected local govt. we fetch their polling unit
        $aks = \App\Models\polling_unit::where('lga_id', $request->lga_id)->get();
        $total_result_lga = 0;
        //loop eack polling unit to add up each party score and sum all together
        foreach($aks as $ak){
            $polling_unit_uniqueid = $ak->uniqueid;
            $pollingData = \App\Models\announced_pu_results::where('polling_unit_uniqueid',$polling_unit_uniqueid)
            ->pluck('party_score')
            ->sum();
            $total_result_lga= $total_result_lga + $pollingData;
        }
        return redirect()
        ->back()
        ->with('total_result_lga',$total_result_lga);
    }
    public function newPollenUnitVote(){
        return view(' newPollenUnitPost');
    }
    public function newPollenUnitVotePOst(Request $request){
        //$validatedRequest = $request->validate([]);
        $validatedRequest = true;
        if ($validatedRequest){

        }
        return view(' newPollenUnitPost');
    }

}