<?php

namespace App\Http\Controllers;

use App\userCard;
use Auth;
use App\User;
use App\Deposit;
use App\Gateway;
use App\Withdraw;
use Carbon\Carbon;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
       
    public function index()
    {
        $pt="Dashboard";
        return view('user.home',compact('pt'));

    }

    public function transactionLog()
    {
        $pt = 'Transaction Log';
        $logs = Transaction::where('user_id',Auth::id())->orderBy('id','DESC')->paginate(10);
        return view('user.tlog', compact('pt','logs'));
    }
    
    public function balance()
    {
        $pt = 'Manage Balance';
        $gates = Gateway::where('status',1)->get();
        return view('user.balance', compact('pt','gates'));
    }

    public function depositPost(Request $request)
    {
        $this->validate($request, [
        'amount' => 'required',
        'gateway' => 'required',
        'proof' => 'required'
        ]);

        $gate = Gateway::findOrFail($request->gateway);
        if(isset($gate))
        {
            $depo['user_id'] = Auth::id();
            $depo['gateway_id'] = $gate->id;
            $depo['amount'] = $request->amount;
            $depo['proof'] = $request->proof;
            $depo['status'] = 0;
            Deposit::create($depo);

            return back()->with('success', 'Deposit Request Sent Successfully!');
            
        }
        else
        {
            return back()->with('alert', 'Please Select Deposit gateway');
            
        }
         
    }
        
    public function withdrawPost(Request $request)
    {
        $this->validate($request,
        [
        'amount' => 'required',
        'account' => 'required'
        ]);

        $user = User::find(Auth::id());
        $user['balance'] = $user->balance - $request->amount;
        $user->update();
        
        $with['user_id'] = Auth::id();
        $with['amount'] = $request->amount;
        $with['account'] = $request->account;
        $with['status'] = 0;
        Withdraw::create($with);

        $tlog['user_id'] = $user->id;
        $tlog['amount'] = $request->amount;
        $tlog['balance'] = $user->balance;
        $tlog['type'] = 0;
        $tlog['details'] = 'Withdarw';
        $tlog['trxid'] = str_random(16);
        Transaction::create($tlog);

        return back()->with('success', 'Deposit Request Sent Successfully!');
        
    }

    public function changePasswordForm()
    {
        return view('auth.passwords.change');
    }
        
    public function changePassword(Request $request)
    {
        $this->validate($request,
        [
            'password' => 'required|string|min:6|confirmed'
        ]);
        $user = User::find(Auth::id());
        if($request->password == $request->password_confirmation)
        {
            $user['password'] = Hash::make($request->password);
            $user->update();

            return back()->with('success', 'Password Changed');
        }
        else 
        {
            return back()->with('alert', 'Password Not Matched');
        }
    }
     
}
    