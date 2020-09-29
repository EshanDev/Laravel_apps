@extends('layouts.auth')
@section('stylesheet')
    <link rel="stylesheet" href="{{mix('css/auth.css')}}">
@endsection
@section('main-app')
    <div class="contaienr">
        <div class="col-md-5 w-auto">
            <form action="{{ route('reg.code.create') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" id="lastname" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection
