<form action="{{route('localGovtPost')}}" method="POST">
    @csrf
    <div>
        <select name = 'lga_id'>
            @foreach($lga_datas as $lga_data)
            <option value="{{$lga_data->lga_id}}">
                {{$lga_data->lga_name}}
            </option>
            @endforeach
        </select>
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