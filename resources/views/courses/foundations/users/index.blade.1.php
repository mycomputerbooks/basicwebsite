@extends('courses.foundations.layouts.card')

@section('card')
    <h5>Users: (index.blade.php)</h5>
    <hr />
    @foreach ($users as $user)
    <div class="card my-card-body card-body bg-light">
        <div class="row my-row">
            <div class="col-md-6 my-col">
                <h3>{{ $user->name }}</h3>


            </div>
            <div class="col-md-6 my-col">

                <div class="text-left">
                    {{-- <a href="{{ route('questions.show', $question->id) }}" class="btn btn-primary btn-sm">View/Submit Answers</a> --}}
                    <a href="*" class="btn btn-primary btn-sm">View Profile</a>
                </div>
            </div>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    {{-- <th scope="col">Handle</th> --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    {{-- <td>Otto</td> --}}
                    <td>@mdo</td>
                    <td><button class="btn btn-primary">View Profile</button></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    {{-- <td>Thornton</td> --}}
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Hooty the Hen</td>
                    {{-- <td colspan="2">Larry the Bird</td> --}}
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>


    </div>
    @endforeach
    {{ $users->links() }}
@endsection

