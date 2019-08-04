<?php

namespace App\Http\Controllers;

use App\aboutstatic;
use App\Allheader;
use App\attorney;
use App\faqdetail;
use App\General;
use App\practisedetail;
use App\Slider;
use App\Social;
use App\Frontend;
use App\staticcontent;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FrontendController extends Controller
{

  public function aboutSection()
  {

      $pt= "ABOUT SECTION";
      return view('admin.website.about', compact('pt'));
  }

  public function aboutUpdate(Request $request)
  {
      $front = General::first();

      $this->validate($request,[
          'about_heading' => 'required',
          'about_details' => 'required',
       ]);


      $front['about_heading'] = $request->about_heading;
      $front['about_details'] = $request->about_details;
      $front->update();

      return back()->with('success','About Section Updated Successfully.');
  }

  public function footerSection()
  {

      $pt= "FOOTER SECTION";

      return view('admin.website.footer', compact('pt'));
  }

  public function footerUpdate(Request $request)
  {
      $front = General::first();
      $this->validate($request,['footer' => 'required',]);
      $front['footer'] = $request->footer;
      $front->update();

      return back()->with('success','Fooetr Section Updated Successfully.');
  }


  public function socialSection()
  {
      $socials = Social::paginate(10);
      return view('admin.website.social', compact('socials'));
  }


  public function socialStore(Request $request)
  {
      $this->validate($request,
          [
              'icon' => 'required',
              'link' => 'required',
          ]);

      $social['icon'] = $request->icon;
      $social['link'] = $request->link;
      Social::create($social);

      return back()->with('success', 'New Social Icon Created Successfully!');
  }

 public function  socialUpdate(Request $request)
  {

      $social = Social::find($request->id);

          $social['icon'] = $request->icon;
          $social['link'] = $request->link;
        $social->update();

      return back()->with('success', 'Social Icon Updated Successfully!');
  }

  public function  socialDestroy(Request $request)
  {
      $social = Social::findOrFail($request->delcfrm);
     
      $social->delete();
      
      return back()->with('success', 'Social Icon Deleted Successfully!');
  }


  public function welcomedetails()
  {

      return view('admin.website.welcomedetails');
  }

  public function welcomedetailssubmit(Request $request)
  {
      $this->validate($request,[
              'welcome_details_title' => 'required',
              'welcome_details_des' => 'required',
              'welcome_details_youtube' => 'required',
          ]);

      if($request->hasFile('video_image')){
          $image = $request->file('video_image');
          $filename = 'video_bg.jpg';
          $location = 'assets/images/' . $filename;
          Image::make($image)->save($location);
      }

      $weldtup = General::first();
      $weldtup->welcome_details_title = $request->welcome_details_title;
      $weldtup->welcome_details_des = $request->welcome_details_des;
      $weldtup->welcome_details_youtube = $request->welcome_details_youtube;
      $weldtup->save();
      return back()->with('success', 'Welcome Deatils Saved Successfully!');


  }


  public function practiseheader()
  {
      $prach = Allheader::first();
      return view('admin.website.practiseheader',compact('prach'));
  }

  public function practiseheaderstore(Request $request)
  {
      $pracup = General::first();
      $pracup->practise_header_title = $request->practise_header_title;
      $pracup->practise_header_des = $request->practise_header_des;
      $pracup->save();
      return back()->with('success', 'Practise Header Saved Successfully!');
  }

  public function practisedetails()
  {

      $practs = practisedetail::paginate(10);
      return view('admin.website.practisedetails',compact('practs'));
  }


  public function practisedetailsstore(Request $request)
  {
      $this->validate($request,[
          'title' => 'required',
          'icon' => 'required',
          'des' => 'required',
      ]);
      $fe = new practisedetail();
      $fe->title = $request->title;
      $fe->icon = $request->icon;
      $fe->des = $request->des;
      $fe->save();
      return back()->with('success', 'Features Saved Successfully!');

  }

  public function practisedetailsupdate(Request $request)
  {


      $pracup = practisedetail::find($request->id);
      $pracup->title = $request->title;
      $pracup->des = $request->des;
      $pracup->icon = $request->icon;
      $pracup->save();
      return back()->with('success', 'Practise Details Saved Successfully!');
  }

  public function practisedetailsdelete(Request $request)
  {
       practisedetail::find($request->delcfrm)->delete();
      return back()->with('success', 'Features Deleted Successfully!');
  }

  public function attorneyheadersubmit(Request $request)
  {
      $this->validate($request,[
          'attorney_header_title' => 'required',
          'attorney_header_des' => 'required',
      ]);
      $athup = General::first();
      $athup->attorney_header_title = $request->attorney_header_title;
      $athup->attorney_header_des = $request->attorney_header_des;
      $athup->save();
      return back()->with('success', 'Attorney Header Saved Successfully!');
  }




  public function static()
  {
      $stt = staticcontent::all();
      return view('admin.website.static',compact('stt'));
  }


  public function staticupdate(Request $request, $id)
  {
      $sttup = staticcontent::find($id);
      $sttup->title = $request->title;
      $sttup->amount = $request->amount;
      $sttup->icon = $request->icon;
      $sttup->save();
      return back()->with('success', 'Static Content Saved Successfully!');

  }


  public function faqheadersave(Request $request)
  {
      $this->validate($request,[
          'faq_title' => 'required',
          'faq_des' => 'required',
      ]);

      $faqup = General::first();
      $faqup->faq_title = $request->faq_title;
      $faqup->faq_des = $request->faq_des;

      $faqup->save();
      return back()->with('success', 'Faq Content Saved Successfully!');

  }

  public function faqhdetails()
  {
        $faq = faqdetail::all();
      return view('admin.website.faqdetails',compact('faq'));
  }


  public function faqupdate(Request $request)
  {
      $this->validate($request,[
          'title' => 'required',
          'sortdes' => 'required',
      ]);

      $faqup = faqdetail::find($request->id);
      $faqup->title = $request->title;
      $faqup->sortdes = $request->sortdes;
      $faqup->save();
      return back()->with('success', 'Faq Deatils Saved Successfully!');

  }

  public function faqStore(Request $request)
  {
      $this->validate($request,[
          'title' => 'required',
          'sortdes' => 'required',
      ]);

      $faqup = new faqdetail();
      $faqup->title = $request->title;
      $faqup->sortdes = $request->sortdes;
      $faqup->save();
      return back()->with('success', 'Faq Deatils Saved Successfully!');

  }
public function faqDelete(Request $request)
{
     $faqup = faqdetail::find($request->delcfrm);
     $faqup->delete();
     return back()->with('success', 'Faq Delete Successfully!'); 
    }
     
     
  public function aboutstatic()
  {
        $ststc = aboutstatic::all();
    return view('admin.website.aboutstatic',compact('ststc'));
  }

  public function aboutstaticip(Request $request, $id)
  {
      $stcup = aboutstatic::find($id);
      if($request->hasFile('image')){
          @unlink($stcup->faq_s_image);
          $image = $request->file('image');
          $imageName = time().'.'.$image->getClientOriginalName('image');
          $directory = 'assets/images/allimage/';
          $imgUrl  = $directory.$imageName;
          Image::make($image)->save($imgUrl);
          $stcup->image = $imgUrl;
      }

      $stcup->title = $request->title;
      $stcup->des = $request->des;
      $stcup->icon = $request->icon;
      $stcup->save();
      return back()->with('success', 'About Static Saved Successfully!');
  }

}
