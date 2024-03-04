<form action="{{ route('addBook') }}" method="POST">
    @csrf
    <label for="title">Title: </label>
    <input type="text" name="title" id="title" placeholder="Put the title here...">
    <label for="release">Release: </label>
    <input type="date" name="release" id="release">
    <button type="submit">Add Book</button>
</form>
