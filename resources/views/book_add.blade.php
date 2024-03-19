@extends('baseTemplate')
@section('main')
@auth
<form action="{{ route('addBook') }}" method="POST">
    @csrf
    <div id="titleDiv">
    <label for="title">Title: </label>
    <input type="text" name="title" id="title" placeholder="Put the title here...">
    </div>
    <div id="releaseDiv">
    <label for="release">Release: </label>
    <input type="date" name="release" id="release">
    </div>
    <div id="authorsDiv">
        <label for="authors[]">Authors: </label>
        <input type="text" name="authors[]" id="author">
    </div>
    <a href='javascript:void(0)' onclick="moreAuthors()">New Author</a>

    <button type="submit">Add Book</button>
</form>
@endsection

    <script>

        var index = 2
        function moreAuthors(){
            let spanAuthor = document.createElement('span');
            let authorsdiv = document.getElementById("authorsDiv");
            let newInput = document.createElement("input");
            let br = document.createElement("br");
            newInput.type = "text";
            newInput.id = "author"+index;
            newInput.name = "authors[]";

            spanAuthor.innerHTML = "Author " + index + ":";
            console.log(spanAuthor)
            authorsdiv.append(br);
            authorsdiv.append(spanAuthor);
            authorsdiv.append(newInput);
            index++;
        }

    </script>
@endauth

@guest
    <script>
        window.location = "/login";
    </script>
@endguest
