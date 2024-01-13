<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
    }

    select, button {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    select {
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    .result {
        margin-top: 20px;
        text-align: center;
        font-weight: bold;
    }

    .add-vote {
        margin-top: 20px;
        text-align: center;
    }

    .add-vote a {
        text-decoration: none;
        color: #007bff;
    }
</style>

<form action="{{ route('localGovtPost') }}" method="POST">
    @csrf
    <div>
        <select name='lga_id'>
            @foreach($lga_datas as $lga_data)
            <option value="{{ $lga_data->lga_id }}">
                {{ $lga_data->lga_name }}
            </option>
            @endforeach
        </select>
        <button type='submit'>Submit</button>
    </div>
</form>

@if(session('total_result_lga'))
    <div class="result">
        Total votes in this local government: {{ session('total_result_lga') }}
    </div>
@endif

<div class="add-vote">
    Add new vote to pollen unit?
    <a href='{{ route('newPollenUnit') }}'>Add new vote</a>
</div>
