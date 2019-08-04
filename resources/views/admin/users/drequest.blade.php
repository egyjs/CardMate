@extends('layouts.admin')

@section('content')
<div class="tile">
        <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            Username 
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                            Gateway
                        </th>         	
                        <th>
                            Action
                        </th>
                  	 </tr>
                </thead>
                <tbody>
                        @foreach($deposits as $depo)
                        <tr>
                                <td>
                                        <a href="{{route('admin.user-single', $depo->user_id)}}">{{$depo->user->name}}</a>
                                    </td>
                           <td>
                               {{$depo->amount}} {{$gnl->cur}}      
                           </td> 
                           <td>
                               {{$depo->gateway->name}}      
                         
                           <td>
                           <button class="btn btn-sm btn-success  buttonView" data-proof="{{$depo->proof}}" data-route="{{route('admin.depo-approve',$depo->id)}}" data-toggle="modal" data-target="#viewModal">
                                <i class="fa fa-eye"></i> View 
                               </button>
                               <button class="btn btn-danger  btn-sm buttonCancel" data-proof="{{$depo->proof}}" data-route="{{route('admin.depo-cancel',$depo->id)}}" data-toggle="modal" data-target="#cancelModal">
                                   <i class="fa fa-times"></i> Cancel 
                               </button>
                           </td>
                        </tr>
                @endforeach 
                <tbody>
              </table>
               {{$deposits->links()}}
        </div>
			
<!--Approve Modal -->
<div id="viewModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Deposit Proof</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
             <form role="form" id="approveForm"  method="POST">
              @csrf
              @method('put')
                <p id="deproof">  </p>
                <div class="form-group">   
                    <button type="submit" class="btn btn-primary btn-block">
                        Approve
                    </button>
                </div>
            </form>
          </div>
      
        </div>
      
      </div>
      </div>

<!--Cancel Modal -->
<div id="cancelModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Deposit Proof</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
             <form role="form" id="cancelForm"  method="POST">
              @csrf
              @method('put')
                <p id="cdeproof">  </p>
                <div class="form-group">   
                    <button type="submit" class="btn btn-danger btn-block">
                        Cancel
                    </button>
                </div>
            </form>
          </div>
      
        </div>
      
      </div>
      </div>
@endsection

@section('page_scripts')
<script>
    $(document).ready(function(){
        
        $(document).on('click','.buttonView', function(){
            $('#deproof').text($(this).data('proof'));
            var rt =  $(this).data('route');
            $('#approveForm').attr('action', rt);
        });
        $(document).on('click','.buttonCancel', function(){
            $('#cdeproof').text($(this).data('proof'));
            var crt =  $(this).data('route');
            $('#cancelForm').attr('action', crt);
        });
    });
</script>

@endsection