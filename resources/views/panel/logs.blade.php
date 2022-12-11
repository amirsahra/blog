@extends('layouts.panel')

@section('title')
    {{__('messages.panel.post_page.title')}}
@endsection

@section('content')
    @include('partials.panel.message')

    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Logs Activity</h5>
        <div class="row">
            <div class="col-sm">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>Log name</th>
                                <th>Description</th>
                                <th>Subject Type</th>
                                <th>Event</th>
                                <th>Subject</th>
                                <th>Customer type</th>
                                <th>Causer</th>
                                <th>Properties</th>
                                <th>Batch uuid</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($logs as $log)
                                <tr>
                                    <td>{{$log->log_name}}</td>
                                    <td>{{$log->description}}</td>
                                    <td>{{$log->subject_type}}</td>
                                    <td>{{$log->event}}</td>
                                    <td>@if($log->description != 'deleted')
                                        {{\App\Models\User::find($log->subject_id)->full_name}}
                                        @else Deleted Subject
                                        @endif
                                    </td>
                                    <td>{{$log->customer_type}}</td>
                                    <td>{{\App\Models\User::find($log->causer_id)->full_name ?? 'deleted user'}}</td>
                                    <td>{{$log->properties}}</td>
                                    <td>{{$log->batch_uuid}}</td>
                                    <td>{{$log->created_at}}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm" style="margin-top: 25px">
                {{ $logs->links() }}
            </div>
            </div>
    </section>
@endsection
