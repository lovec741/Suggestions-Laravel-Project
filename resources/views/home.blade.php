@extends("master")

@section("title", "Home")

@section("content")
    <p class="bold">Suggestions:</p> 
    @yield("info")
    @foreach ($suggestions as $sugg)
        <div class='sugg'>
            <p class='medium bold'>Suggestion:</p>
            <p class='medium'>{{ $sugg->content }}</p>
            <p class='small'>{{ $sugg->display_name }} - {{$sugg->created_at->diffForHumans()}}</p>
        </div>
    @endforeach
    <br>
    <br>
    <p class="bold">Suggest something:</p> 
    <div id="sugg_form_with_textarea">
        <textarea rows="4" cols="50" name="content" placeholder="Suggestion" form="sugg_form" minlength=10 maxlength=1000></textarea>
        <p class="margin_bottom">10-1000 characters.</p>
        <form action="/create" method="POST" id="sugg_form">
            @csrf
            <input type="text" name="display_name" placeholder="Name" minlength=3 maxlength=40>
            <p class="margin_bottom">Will be publicly displayed under your suggestion. (3-40 characters)</p>
            <input type="email" name="email" placeholder="Email" minlength=3 maxlength=80>
            <p class="margin_bottom">Won't be publicly displayed. (3-80 characters)</p>
            <button type="submit" name="submit">Suggest</button>
        </form>
    </div>
@endsection