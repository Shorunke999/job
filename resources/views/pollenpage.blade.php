<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }

    button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    .result-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .total-votes {
        margin-bottom: 10px;
    }

    .party-result {
        margin-top: 10px;
    }

    a {
        display: block;
        text-align: center;
        color: #3498db;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
<form action="{{route('pollenunitpage')}}" method="POST">
    @csrf
    <div>
        <label for="pollenUnitId">enter pollen unit id</label>
        <input type="text" placeholder="pollenId" name = 'pollenUnitId' required/>
        <button type='submit'> submit</button>
    </div>
</form>
@if(session('pollenUnitData') && session('sumOfPollenData'))
<div class="result-container">
    <div class="total-votes">
        The sum of the total votes in this pollen unit is {{ session('sumOfPollenData') }}
    </div>
    @foreach (session('pollenUnitData') as $data)
        <div class="party-result">
            The party is {{ $data->party_abbreviation }} and the number of votes is {{ $data->party_score }}
        </div>
    @endforeach
</div>
@endif

<a href="{{ route('localGovt') }}">Check total result in the local government</a>
