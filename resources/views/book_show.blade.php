<a href="{{ route('showAddBook') }}">Add Book</a>
<table>

    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Release</th>
        <th></th>
        <th></th>
    </tr>

@foreach ($books as $book)

    <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->release }}</td>
        <td><a href="{{ route('editBook', ["bookId" => $book->id]) }}">Edit</a></td>
        <td><a href="{{ route('deleteBook', ["bookId" => $book->id]) }}">Delete</a></td>
    </tr>

@endforeach
</table>
