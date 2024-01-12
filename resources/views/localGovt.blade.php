<form action="{{route('localGovtPost')}}" method="POST">
    @csrf
    <div>
        <label for="lga_id">enter local government id</label>
        <input type="text" placeholder="lga_id" name = 'lga_id' required/>
        <button type='submit'> submit</button>
    </div>
</form>
@if(session('total_result_lga'))
    <div>
        the sum of the total vote in this logal government
            {{session('total_result_lga')}}
    </div>
@endif
<div>
    Add new  vote to pollen unit?
    <a href= '{{route('newPollenUnit')}}'>Add new vote</a>
</div>