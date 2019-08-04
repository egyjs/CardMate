@extends('layouts.admin')

@section('content')
    <div class="tile">
        <div class="card">
            <div class="card-header bg-info">
                <div class="caption">
                    <h2 style="text-align: center; color: white">{{ display('translation') }}</h2>
                </div>
            </div>
            <div class="card-body">


                <div class="table-scrollable">
                    <div class="row">
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    <form action="">
                                    {{ display('phrase')  }}
                                    <input type="search"
                                           PLACEHOLDER="{{ display('Search') }}"
                                           class="form-control form-inline" name="q" value="{{ $q ?? '' }}">
                                    </form>
                                </th>
                                <th >
                                    en

                                </th>

                                <th>
                                    ar
                                </th>
                                <th>
                                    {{display('Edit')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tran as $k=>$tr)
                                <tr>
                                    <form action="{{ route('admin.translation.update') }}" method="post">
                                        @csrf
                                        <input name="id" hidden type="hidden" value="{{$tr->id}}">
    {{--                                    <td>{{ $k+1 }}</td>--}}
                                        <td>{{ "*" }}</td>
                                        <td>{{ $tr->phrase }}</td>
                                        <td><textarea name="en" class="form-control" rows="1">{{ $tr->en }}</textarea></td>
                                        <td><textarea name="ar"class="form-control" rows="1">{{ $tr->ar }}</textarea></td>
                                        <td><button  class="btn btn-danger"><i class="fa fa-edit"></i></button> </td>
                                    </form>
                                </tr>
                            @endforeach
                            <tbody>
                        </table>
                        {{$tran->appends(request()->input())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('page_scripts')

@endsection