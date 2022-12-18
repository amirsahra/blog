@extends('layouts.panel')

@section('title')
    region
@endsection

@section('content')
    @include('partials.panel.message')

    <div class="hk-pg-header">
        <div>
            <h2 class="hk-pg-title font-weight-600">City Management</h2>
        </div>
        <div class="d-flex mb-0 flex-wrap">
            <div class="btn-group btn-group-sm btn-group-rounded mb-15 mr-15" role="group">
                <a type="button" href="{{route('panel.region.city.create')}}" class="btn btn-outline-primary">Add City</a>
            </div>
        </div>
    </div>

    <!-- province list -->
    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">{{__('values.regions')}}</h5>
        <div class="row">
            <div class="col-sm">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>{{__('values.name')}}</th>
                                <th>{{__('values.province')}}</th>
                                <th>{{__('values.created')}}</th>
                                <th>{{__('values.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['cities'] as $city)
                                <tr>
                                    <td>{{$city->name}}</td>
                                    <td>{{$city->province->name}}</td>
                                    <td>{{$city->created_at}}</td>

                                    <td>
                                        <form action="{{ route('panel.region.city.destroy', $city->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" data-toggle="tooltip" data-original-title="Delete"> <i class="icon-trash txt-danger"></i> </button>
                                        </form>
                                        <a href="{{route('panel.region.city.edit',$city->id)}}" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                                    </td>
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
                {{ $data['cities']->links() }}
        </div>
    </section>
@endsection
