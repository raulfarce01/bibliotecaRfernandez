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
    <label for="user">User: </label>
    <select name="user" id="user">
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->email }} - {{ $user->name }}</option>
        @endforeach
    </select>
    <button type="submit">Add Loan</button>
</form>
