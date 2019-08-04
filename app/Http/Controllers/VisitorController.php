<?php

namespace App\Http\Controllers;



use App\blog;
use App\cardcategory;
use App\faqdetail;
use App\General;
use App\practisedetail;
use App\staticcontent;
use App\sucscribe;
use Auth;
use App\User;
use App\Social;
use App\Frontend;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VisitorController extends Controller
{
    public function index()
    {

        $practs = practisedetail::all();

        $statuc = staticcontent::all();
        $faq = faqdetail::all();
        $faqs = faqdetail::all();
        $category = cardcategory::inRandomOrder()->take(6)->get();
        $blog = blog::where('status',0)->inRandomOrder()->take(3)->get();
        return view('fontend.index',compact('practs',
            'statuc','faq','blog','category','faqs'));
    }


    public function verification()
    {
        if(Auth::user()->status == '1' && Auth::user()->emailv == 1 && Auth::user()->smsv == 1)
        {
            return redirect()->route('home');
        }
        else
        {
            return view('auth.verify');
        }
    }

    public function sendVcode(Request $request)
    {
        $user = User::find(Auth::id());
        $chktm = $user->vsent+1000;
        if ($chktm > time())
        {
            $delay = $chktm-time();
            return back()->with('alert', 'Please Try after '.$delay.' Seconds');
        }
        else
        {
            $email = $request->email;
            $mobile = $request->mobile;
            $code = rand(100000, 999999);
            $msg = 'Your Verification code is: '.$code;
            $user['vercode'] = $code ;
            $user['vsent'] = time();
            $user->update();

            if(isset($email))
            {
                send_email($user->email, $user->username, 'Verification Code', $msg);
                return back()->with('msg', 'Email verification code sent successfully');
            }
            elseif(isset($mobile))
            {
                send_sms($user->mobile, $msg);
                return back()->with('msg', 'SMS verification code sent successfully');
            }
            else
            {
                return back()->with('alert', 'Sending Failed');
            }
          
        }

    }

    public function emailVerify(Request $request)
    {
        $this->validate($request, [
            'code' => 'required'
        ]);
        $user = User::find(Auth::id());
        $code = $request->code;

        if ($user->vercode == $code)
        {
            $user['emailv'] = 1;
            $user['vercode'] = str_random(10);
            $user['vsent'] = 0;
            $user->save();

            return redirect()->route('home')->with('msg', 'Email Verified');
        }
        else
        {
            return back()->with('alert', 'Wrong Verification Code');
        }

    }

    public function smsVerify(Request $request)
    {
        $this->validate($request, [
            'code' => 'required'
        ]);
        $user = User::find(Auth::id());
        $code = $request->code;

        if ($user->vercode == $code)
        {
            $user['smsv'] = 1;
            $user['vercode'] = str_random(10);
            $user['vsent'] = 0;
            $user->save();

            return redirect()->route('home')->with('msg', 'Mobile Number Verified');
        }
        else
        {
            return back()->with('alert', 'Wrong Verification Code');
        }

    }


    public function aboutpage()
    {
        $gnl = General::first();
        $pt = $gnl->about_heading;
        return view('fontend.about',compact( 'pt'));
    }

    public function contact()
    {
        $pt = "Contact Us";
        return view('fontend.contact', compact('pt'));
    }


    public function sendmail(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
           'email' => 'required',
           'subject' => 'required',
           'message' => 'required',
        ]);


        $general = General::first();

        send_email($general->email,$request->name,$request->subject, $request->message);

         return redirect(route('contact'))->with('msg','Email Send Successfully');



    }


    public function subscribesave(Request $request)
    {
        $em = new sucscribe();
        $em->email = $request->email;
        $em->save();
        return back()->with('msg','Subscribe Successfully ');
    }

    public function blogdetails($id)
    {
        $blogdetails = blog::where('id',$id)->first();
        $pt = "Blog Detail";
        return view('fontend.blogdetails',compact('blogdetails', 'pt'));
    }

    public function blogde()
    {
        $blog = blog::where('status',0)->paginate(12);
        $pt = "Blog List";
        return view('fontend.blog',compact('blog','pt'));
    }
}
