@extends("home")

@section("info")
    @if (isset($msg)) 
        @if ($succ == 0) 
            <p style='color: red'>{{ $msg }}</p>
        @elseif ($succ == 1) 
            <p style='color: lightgreen'>{{ $msg }}</p>
        @endif
    @endif
@endsection