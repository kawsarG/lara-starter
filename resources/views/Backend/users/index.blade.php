@extends('layouts.backend.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Users

            </div>
        </div>
        <div class="page-title-actions">
            @if( Auth::user()->hasPermission('app.users.create'))
            <a href="{{route('app.users.create')}}" title="Example Tooltip" data-placement="bottom"
                class="btn-shadow mr-3 btn btn-dark">
                <i class="fa fa-star"></i><span> Create User</span>
            </a>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">

            <div class="table-responsive">
                <table id="example" class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Eamil</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Avatar</th>
                            <th class="text-center">Joined_At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key=>$user)
                        <tr>
                            <td class="text-center text-muted">{{$key+1}}</td>
                            <td class="text-center">
                                {{$user->name}}
                            </td>
                            <td class="text-center">
                                {{$user->email}}
                            </td>
                            <td class="text-center">
                                @if($user->status==true)
                                <span class="badge badge-info">Active</span>
                                @else
                                <span class="badge badge-warning">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <img class="rounded-circle" width="48" src="{{config('app.placeholder').'160'}}"
                                    alt="avatar">
                            </td>
                            <td class="text-center">
                                {{$user->created_at}}
                            </td>
                            <td class="text-center">
                                @if(Auth::user()->hasPermission('app.users.edit'))
                                <a href="{{route('app.users.edit',$user->id)}}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                @endif

                                @if(Auth::user()->hasPermission('app.users.destroy'))

                                <form id='delete-form-{{$user->id}}' style="display: inline;"
                                    action="{{route('app.users.destroy',$user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"> </i> Delete
                                    </button>
                                </form>



                                @endif

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src=" https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
</script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js">
</script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
@endpush