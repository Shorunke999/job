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
        position: relative;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 10px;
        cursor: pointer;
        width: 100%;
        box-sizing: border-box;
    }

    button:hover {
        background-color: #45a049;
    }

    .result {
        margin-top: 20px;
        text-align: center;
        font-weight: bold;
    }

    #addPartyButton {
        position: absolute;
        top: 10px;
        right: 10px;
    }
</style>

<script>
    function addParty() {
        const one = document.getElementById('one');
        const newPartyDiv = document.createElement('div');
        newPartyDiv.innerHTML = `<input type="text" placeholder="party_abbreviation" name='party[][party_abbreviation]' required/>
            <input type="text" placeholder="party_scores" name='party[][party_scores]' required/>`;
        one.appendChild(newPartyDiv);
    }
</script>

<form action="{{ route('newPollenUnitPost') }}" method="POST">
    @csrf
    <button type="button" id="addPartyButton" onclick="addParty()">Add Party</button>
    <div>
        <label for="pollenUnitid">Enter pollen uniqueid</label>
        <input type="text" placeholder="pollenuniqueid" name='pollenUniqueid' required/>
    </div>
    <div id="one">
        <div>
            <input type="text" placeholder="party_abbreviation" name='party[][party_abbreviation]' required/>
            <input type="text" placeholder="party_scores" name='party[][party_scores]' required/>
        </div>
    </div>
    <button type="submit">Submit</button>
</form>

@if(session('successful'))
    <div class="result">
        {{session('successful')}}
    </div>
@endif
