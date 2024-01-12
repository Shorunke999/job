<form action="{{route('newPollenUnitPost')}}" method="POST">
    @csrf
    <div>
        <label for="pollenUnitname">enter pollen unit name</label>
        <input type="text" placeholder="pollenUnitname" name = 'pollenUnitname' required/>
        <br/>
        <label for="pollenUnitid">enter pollen unit id</label>
        <input type="text" placeholder="pollenUnitid" name = 'pollenUnitid' required/>
    </div>
    <div>
        <input type="text" placeholder="ACN" name ='ACN' required/>
        <input type="text" placeholder="JP" name ='JP' required/>
        <input type="text" placeholder="CDC" name ='CDC' required/>
        <input type="text" placeholder="PPA" name ='PPA' required/>
        <input type="text" placeholder="DPP" name ='DPP' required/>
        <input type="text" placeholder="PDP" name = 'PDP' required/>
    </div>
</form>
@if(session('total_result_lga'))
    <div>
        the sum of the total vote in this logal government
            {{$total_result_lga}}
    </div>
@endif
<div>
    Add new  vote to pollen unit?
    <a href= '{{route('newPollenUnit')}}'>Add new vote</a>
</div>