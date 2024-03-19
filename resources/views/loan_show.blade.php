@extends('baseTemplate')
@section('main')
@auth
<a href="{{ route('showAddLoan') }}">Add Loan</a>
<table>

    <tr>
        <th>ID</th>
        <th>Book</th>
        <th>User</th>
        <th>Return Date</th>
        <th></th>
    </tr>

@foreach ($loans as $loan)

    <tr>
        <td>{{ $loan->id }}</td>
        <td>{{ $loan->book->title }}</td>
        <td>{{ $loan->user->name }}</td>
        <td>{{ $loan->return_date }}</td>
        <td>
            @if ($loan->returned == 0)
            <a href="{{ route('returnLoan', ["loanId" => $loan->id]) }}">Return Loan</a>
            @else
            <p>Devuelto</p>
            @endif
        </td>
    </tr>

@endforeach
</table>
@endsection
@endauth

@guest
    <script>
        window.location = "/login";
    </script>
@endguest
