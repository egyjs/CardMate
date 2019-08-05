@extends('fontend.master')
@section('css')

@endsection
@section('content')
    <section class="about-page-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="about-page-content-inner table-responsive-md">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="text-align: center">{{display('Date')}}</th>
                                <th style="text-align: center">{{display('Transaction Number')}}</th>
                                <th style="text-align: center">{{display('Details')}}</th>
                                <th style="text-align: center">{{display('Amount')}}</th>
                                <th style="text-align: center">{{display('Balance')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($tran) > 0)
                            @foreach($tran as $tr)
                                <tr >
                                    <td style="text-align: center">{{ date(' l jS F Y', strtotime($tr->created_at)) }}</td>
                                    <td style="text-align: center">{{$tr->trxid}}</td>
                                    <td style="text-align: center">{{$tr->details}}</td>
                                    <td style="text-align: center">{{$tr->amount}} {{$gnl->cursym}}</td>
                                    <td style="text-align: center">{{$tr->balance}} {{$gnl->cursym}}</td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="4">
                                        <h3 style="text-align: center">
                                            {{display('Sorry ! Right now you don\'t have any Transaction.')}}
                                        </h3>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{$tran->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


