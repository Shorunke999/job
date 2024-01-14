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
    //THIS MAY AFFECTS THE PERFORMANCE OF WEB APP
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
        return view('newPollenUnitVote');
    }
    public function newPollenUnitVotePOst(Request $request){
        $request->validate([
            'pollenUniqueid' => 'required|string|max:255',
            'party' => 'required|array',
            'party.*.party_abbreviation' => 'required|string|max:255',
            'party.*.party_scores' => 'required|integer',
        ]);
        $pollenUnit = new \App\Models\announced_pu_results();

        // Save party data
        foreach ($request->input('party') as $partyData) {
            $pollenUnit->create([
                'polling_unit_uniqueid'=> $request->input('pollenUniqueid'),
                'party_abbreviation' => $partyData['party_abbreviation'],
                'party_scores' => $partyData['party_scores'],
            ]);
        }

        return redirect()
        ->back()
        ->with('successful','data has been stored succesfully');
    }
    public function test()
    {
        $data =  \App\Models\states::make([
            'state_id' => 39,
            'state_name'=> 'we ghost'
        ]);
        return json_encode(['data'=>$data]);
    }
}
