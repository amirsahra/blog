@extends('layouts.panel')

@section('title')
    {{__('messages.panel.post_page.title')}}
@endsection

@section('content')
    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Filters</h5>
        <form method="get" action="{{route('panel.users.report.index')}}">
            <livewire:city-dropdown/>
            <div class="row">
                <div class="col-sm">
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-control custom-select  mt-15" name="gender">
                                <option selected="" value="">Gender</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="col-sm">
                <div class="row">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Find</button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Export Table</h5>
        <p class="mb-40">Use buttons: <code>['copy', 'csv', 'excel', 'pdf', 'print']</code> to add export table options.
        </p>
        <div class="row">
            <div class="col-sm">
                <div class="table-wrap">
                    <div id="datable_3_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                        <table id="datable_3" class="table table-hover w-100 display dataTable no-footer dtr-inline"
                               role="grid" >
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datable_3" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">
                                    Full Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datable_3" rowspan="1" colspan="1"
                                    aria-label="Position: activate to sort column ascending">
                                    Username
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datable_3" rowspan="1" colspan="1"
                                   aria-label="Office: activate to sort column ascending">
                                    Nationality Code
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datable_3" rowspan="1" colspan="1"
                                    aria-label="Age: activate to sort column ascending">
                                    Phone
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datable_3" rowspan="1" colspan="1"
                                    aria-label="Start date: activate to sort column ascending">
                                     Birthday
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="datable_3" rowspan="1" colspan="1"
                                     aria-label="Salary: activate to sort column ascending">
                                    Gender
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr role="row">
                                <td tabindex="0" class="sorting_1">{{$user->full_name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->nationality_code}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->birthday}}</td>
                                <td>{{$user->gender}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <!-- Data Table JavaScript -->
    <script src="{{asset('panel/vendors/datatables.net/js/jquery.dataTables.min.js/')}}"></script>
    <script src="{{asset('panel/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('panel/vendors/  datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{asset('panel/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('panel/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('panel/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('panel/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('panel/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('panel/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('panel/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('panel/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('panel/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('panel/dist/js/dataTables-data.js')}}"></script>
@endsection
