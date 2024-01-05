<div>
    <form action="{{route('form')}}" method="post">
        @csrf
        <input type="hidden" name="name" value="message">
        <button type="submit">submit</button>
    </form>
    @if(session('msg'))
        <div>
            {{session('msg')}}
        </div>
    @endif
</div>