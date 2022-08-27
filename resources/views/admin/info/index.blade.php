@extends('admin.layouts.index')

@section('title')
    index information
@endsection

@section('content')
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="btn btn-secondary" href="route('logout')"
                   onclick="event.preventDefault(); this.closest('form').submit();">
                    {{'Log Out'}}
                </a>
            </form>
        </div>
    </nav>

    <div class="container">
        <section>
            <h3 class="text-center mt-5">Information list</h3>
            @include('admin.layouts.partials.errors')
            <div class="row">
                <div class="col-8">
                    <a type="button" class="btn btn-primary"
                       href="{{route('admin.information.createPDF',$contacts->currentPage())}}">
                        <i class="fa fa-file-pdf fa-lg" aria-hidden="true"></i><span>  PDF</span>
                    </a>
                </div>
                <div class="col-4 d-grid gap-2 d-md-flex justify-content-md-end items-end">
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                            data-bs-target="#newContactModal">
                        New contact
                    </button>
                </div>
            </div>

            <table class="table table-striped mt-2 text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Firs Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $key => $contact)
                    <tr>
                        <th scope="row">{{ $contacts->firstItem() + $key }}</th>
                        <td>{{$contact->first_name}}</td>
                        <td>{{$contact->last_name}}</td>
                        <td>{{$contact->tel}}</td>
                        <td>
                            {{--                            <i class="fa fa-eye" aria-hidden="true"></i>--}}
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-sm btn-outline-primary mx-3" data-bs-toggle="modal"
                                        data-bs-target="#editContactModal-{{$contact->id}}">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </button>
                                <form action="{{{route('admin.information.destroy', $contact->id)}}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure...?');"
                                            class="btn btn-sm btn-outline-danger ">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$contacts->links()}}
        </section>
    </div>
    @include('admin.info.create_modal')
    @include('admin.info.edit_modal')
@endsection

