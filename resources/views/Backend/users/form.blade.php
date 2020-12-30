@extends('layouts.backend.app')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
    integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
    crossorigin="anonymous" />

<style>
.dropify-wrapper .dropify-message p {
    font-size: initial;
}
</style>
@endpush
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit">
                </i>
            </div>

            {{isset($user)? 'Edit ':'Create ' }}User

        </div>
        <div class="page-title-actions">
            <a href="{{route('app.users.index')}}" title="Example Tooltip" data-placement="bottom"
                class="btn-shadow mr-3 btn btn-danger">
                <i class="fa fa-arrow-circle-left"></i><span>
                    Back to list
                </span>
            </a>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="{{isset($user)? route('app.users.update'):route('app.users.store')}}" method="POST">
            @csrf
            @isset($user)
            @method('PUT')
            @endisset
            <div class="row">
                <div class="col-md-8">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">User Info</h5>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{$user->name ?? old('name')}}" required autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{$user->email ?? old('email')}}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" id="confirm_password" name="password_confirmation"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Select User Role and Status</h5>
                            <div class="form-group">
                                <label for=" role">Select Role</label>
                                <select name="role" id="role" class="js-example-basic-single form-control @error('role')is-invalid
                                    @enderror " required>
                                    @foreach($roles as $key=>$role)
                                    <option value="{{$role->id}}">{{$role->name}}
                                    </option>
                                    @endforeach

                                    @error('role')
                                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for=" role">Select Role</label>
                                <select name="role" id="role" class="js-example-basic-single form-control @error('role')is-invalid
                                    @enderror " required>
                                    @foreach($roles as $key=>$role)
                                    <option value="{{$role->id}}">{{$role->name}}
                                    </option>
                                    @endforeach

                                    @error('role')
                                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" id="avatar" class="dropify form-control" name="avatar" required>
                                @error('avatar')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="status" name="status">
                                    <label class="custom-control-label" for="status">status</label>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">
                                @isset($user)
                                <i class="fas fa-plus-circle"> Update</i>
                                @else
                                <i class="fas fa-plus-circle"> Create</i>
                                @endisset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
    integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
    crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    $('.dropify').dropify();
    $('.js-example-basic-single').select2();
});
</script>
@endpush