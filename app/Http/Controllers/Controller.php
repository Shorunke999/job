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
        return view('localGovt');
    }
    public function localGovtPost(Request $request){
        $aks = \App\Models\polling_unit::where('lga_id', $request->lga_id)->get();
        $total_result_lga = 0;
        foreach ($ak as $aks){
            $pollen_unit_unique_id = $aks->pollen_unit_id;
            $pollenData = \App\Models\announced_pu_results::where('pollen_unit_unique_id',$pollen_unit_unique_id)
            ->pluck('party_score')
            ->sum();
            $total_result_lga= $total_result_lga + $pollenData;
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