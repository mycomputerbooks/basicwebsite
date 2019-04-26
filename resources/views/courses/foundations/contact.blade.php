@extends('courses.foundations.layouts.card')

@section('card')
    <h1>Contact Us</h1>

    <form action="{{ route('foundationsContact') }}" method="post">
    {{ csrf_field() }}

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter name"/>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email"/>
    </div>

    <div class="form-group">
        <label>Subject</label>
        <input type="text" name="subject" class="form-control" placeholder="Enter subject"/>
    </div>

    <div class="form-group">
        <label>Message</label>
        <textarea class="form-control" name="message" rows="5" placeholder="Enter message"></textarea>
    </div>

    <input type="submit" class="btn btn-primary" value="Send Email" />
    </form>
@endsection
