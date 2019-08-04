<?php

namespace App\Http\Controllers;

use App\card;
use App\cardcategory;
use App\cardsubcategory;
use App\Deposit;
use App\Gateway;
use App\Transaction;
use App\User;
use App\userCard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    public function buycard()
    {
        $pt = "Buy Card";
        $category = cardcategory::whereStatus(1)->get();
        return view('user.card.buycard',compact('category', 'pt'));
    }

    public function selectcardbycategory($id)
    {
        $pt = "Select Card Package";
        $card = cardsubcategory::where('cat_id',$id)->where('status',1)->get();
        return view('user.card.selectcard',compact('card','pt'));
    }

    public function cardView(Request $request, $id)
    {
        $pt = "Review Your Purchase";
        $this->validate($request,[
           'qty' => 'required|int|min:1'
        ]);
        $sub = cardsubcategory::find($id);
        $card = card::where('sub_category_id', $id)->where('user_id',0);
        $qty = $request->qty;

        if ($card->count() >= $request->qty){
            return view('user.card.view_card', compact('card','sub','qty','pt'));
        }else{
            return back()->with('alert','Not Available Quantity');
        }

    }

    public function usercardstore(Request $request)
    {

        $sub = cardsubcategory::findOrfail($request->sub_cat);
        $price = $request->qty * $sub->price;
        $user = User::find(Auth::id());

        if (Auth::user()->balance >= $price){

            $p = card::where('sub_category_id', $sub->id)->where('user_id',0)->take($request->qty);

            if ($p->count() < $request->qty){
                return redirect('home/select-category')->with('alert', 'Not Available Quantity');
            }

            foreach ($p->get() as $data){
                $data->status = 1;
                $data->user_id = Auth::id();
                $data->save();
            }


            $new_balance =  $user['balance'] - $price;
            $user['balance'] = $new_balance;
            $user->save();

            $trns = new Transaction();
            $trns->user_id = $user->id;
            $trns->amount = $price;
            $trns->trxid = str_random(16);
            $trns->details = "Buy Card";
            $trns->type = 5;
            $trns->balance = $new_balance;
            $trns->save();

            return redirect('home/select-category')->with('msg', 'Successfully Buy Complete');
        }else{
            return redirect('home/select-category')->with('alert', 'Insufficient Balance');
        }


    }


    public function userdeposit()
    {
        $pt = "Deposit Now";
        $gateways = Gateway::where('status',1)->get();
        return view('user.deposit.deposit',compact('gateways', 'pt'));
    }

    public function userdepositdatainsert(Request $request)
    {

        //$this->validate($request,['amount' => 'required','gateway' => 'required']);
        if ($request->amount <= 0){
            return back()->with('alert', 'Invalid Amount');
        }else{
            $gate = Gateway::findOrFail($request->gateway);

            $charge = $gate->fixed_charge + ($request->amount*$gate->percent_charge/100);

            $usdamo = ($request->amount + $charge)/$gate->rate;

            $depo['user_id'] = Auth::id();
            $depo['gateway_id'] = $gate->id;
            $depo['amount'] = $request->amount;
            $depo['charge'] = $charge;
            $depo['usd_amo'] = round($usdamo,2);
            $depo['btc_amo'] = 0;
            $depo['btc_wallet'] = "";
            $depo['trx'] = str_random(16);
            $depo['try'] = 0;
            $depo['status'] = 0;
            Deposit::create($depo);

            Session::put('Track', $depo['trx']);

            return redirect()->route('deposit.preview');


        }
    }


    public function userdepositpreview()
    {

        $track = Session::get('Track');
        $pt = "Deposit Preview";
        $data = Deposit::where('status',0)->where('trx',$track)->first();
        return view('user.deposit.depositpreview',compact('data','pt'));
    }

    public function usertransaction()
    {
        $pt= "Transaction Log";
        $tran = Transaction::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        return view('user.deposit.transaction',compact('tran', 'pt'));
    }

    public function usermycard()
    {
        $pt = "My Card";
        $usercard = card::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->where('status',1)->paginate(10);
        return view('user.card.mycard',compact('usercard', 'pt'));
    }

    public function userUsedCard()
    {
        $pt = "My Used Card";
        $usercard = card::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->where('status',0)->paginate(10);
        return view('user.card.mycard',compact('usercard', 'pt'));
    }

    public function userpasschnage()
    {
        $pt = "Change Password";
        return view('user.pass', compact('pt'));
    }

    public function profileIndex()
    {
        $pt = "Update Profile";
        return view('user.profile', compact('pt'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
           'email' => 'required',
           'mobile' => 'required',
           'city' => 'required',
           'country' => 'required',
        ]);

        User::whereId(Auth::id())->update([
           'name' => $request->name,
           'email' => $request->email,
           'mobile' => $request->mobile,
           'city' => $request->city,
           'country' => $request->country,
        ]);

        return back()->with('msg', 'Profile Update Successfully');
    }

    public function userpasschnagesave(Request $request)
    {
        $admin = Auth::guard('web')->user();

        if(Hash::check($request->passwordold, $admin->password) && $request->password == $request->password_confirmation)
        {
            $admin['password'] =  Hash::make($request->password);
            $admin->save();
            return back()->with('msg', 'Password Changed');
        }
        else
        {
            return back()->with('alert', 'Password Not Changed');
        }
    }

    public function changeusershowshats(Request $request)
    {
        $id = $request->id;
        $data = card::find($id);
        $data->status = 0;
        $data->save();
        return response($data);
    }


}
