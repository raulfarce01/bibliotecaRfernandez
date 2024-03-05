<form action="{{ route('editBookPost', ["bookId" => $book->id]) }}" method="POST">
    @csrf
    <label for="title">Title: </label>
    <input type="text" name="title" id="title" placeholder="Put the title here..." value="{{ $book->title }}">
    <label for="release">Release: </label>
    <input type="date" name="release" id="release" value="{{ $book->release }}">
    <button type="submit">Edit Book</button>
</form>
