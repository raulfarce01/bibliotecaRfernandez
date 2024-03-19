@extends('baseTemplate')
@section('main')
@auth
<form action="{{ route('addLoan') }}" method="POST">
    @csrf
    <label for="book">Book: </label>
    <select name="book" id="book">
        @foreach ($books as $book)
            <option @if ( $book->available == 0 )
                disabled
            @endif value="{{ $book->id }}">{{ $book->id }} - {{ $book->title }}</option>
        @endforeach
    </select>
    <button type="submit">Add Loan</button>
</form>
@endsection
@endauth
@guest
    <script>
        window.location = "/login";
    </script>
@endguest
