@extends('courses.foundations.layouts.card')

@section('card')
    <h5>Users: (index.blade.php)</h5>
    <hr />
        <table class="table table-hover">
            <thead>
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    {{-- <th scope="col">Handle</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        {{-- <th scope="row">1</th> --}}
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        {{-- <td><button class="btn btn-primary">View Profile</button></td> --}}
                        <td><a href="{{ route('profile', $user->id) }}" class="btn btn-primary btn-sm">View Profile</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    {{ $users->links() }}
@endsection

