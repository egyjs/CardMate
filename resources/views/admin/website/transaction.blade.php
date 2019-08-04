@extends('layouts.admin')

@section('content')
    <div class="tile">
        <div class="card">
            <div class="card-header bg-info">
                <div class="caption">
                    <h2 style="text-align: center; color: white">Transaction</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="table-scrollable">
                    <div class="row">
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Transaction Number
                                </th>
                                <th>
                                    User
                                </th>

                                <th>
                                    Details
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Balance
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tran as $tr)
                                <tr>
                                    <td>
                                        {{ date(' l jS F Y', strtotime($tr->created_at)) }}
                                    </td>
                                    <td>
                                        {{$tr->trxid}}
                                    </td>
                                    <td>
                                        <a href="{{url('admin/user/'.$tr->user_id)}}">{{$tr->user->name}}</a>
                                    </td>

                                    <td>
                                        {{$tr->details}}
                                    </td>
                                    <td>
                                        {{$tr->amount}} {{$gnl->cursym}}
                                    </td>
                                    <td>
                                        {{$tr->balance}} {{$gnl->cursym}}
                                    </td>


                                </tr>
                            @endforeach
                            <tbody>
                        </table>
                        {{$tran->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('page_scripts')

@endsection