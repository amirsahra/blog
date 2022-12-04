@extends('layouts.panel')

@section('title')
    {{__('values.users')}}
@endsection

@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
        </ol>
    </nav>

    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect
                                x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14"
                                                                               y2="12"></line></svg></span></span>Basic
                Tables
            </h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Bordered Table</h5>
                    <p class="mb-40">Add class <code>.table-bordered</code> in table tag for borders on all sides of the
                        table and cells.</p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-hover  mb-0">
                                        <thead>
                                        <tr>
                                            <th>{{__('values.full_name')}}</th>
                                            <th>{{__('values.email')}}</th>
                                            <th>{{__('values.created')}}</th>
                                            <th>{{__('values.actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->full_name}}</td>
                                                <td>{{ $user->email}}</td>
                                                <td>{{ $user->created_at}}</td>

                                                <td>
                                                    <a href="#" class="mr-25" data-toggle="tooltip"
                                                       data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                                                    <a href="#" data-toggle="tooltip" data-original-title="Close"> <i
                                                            class="icon-trash txt-danger"></i> </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /Row -->

    </div>
@endsection
