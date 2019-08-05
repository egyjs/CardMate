<?php
use App\General;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!function_exists('is_rtl')) {

    function is_rtl() {
        $language=App::getLocale();
        if($language=="ar"){
            return true;
        }
        return false;

    }
}

if (!function_exists('rtlCss')) {

    function rtlCss($file= ''){
        if (is_rtl()) {
            $Ofile = ($file);
            $filename = pathinfo($Ofile);
            $fname = $filename['filename'];
            $fpath = $filename['dirname'];
            $fexe = $filename['extension'];


            if (!file_exists(__DIR__ . '../../../../..' . $fpath . '/' . $fname . '.rtl.' . $fexe)) {
                copy(__DIR__ . '../../../../..' . $Ofile, __DIR__ . '../../../../..' . $fpath . '/' . $fname . '.rtl.' . $fexe);
            }
            return $Ofile;
        }
    }
}



if (!function_exists('is_arabic')) {

    function is_arabic() {
        $language=App::getLocale();
        if($language == "ar"){
            return true;
        }

        return false;

    }
}
if (!function_exists('display')) {

    function display($text = null,$debug =false) {


        $locale=Session::get('locale');
        if(isset($locale))
        {
            App::setLocale($locale);
        }
        $language=App::getLocale();


        $text=trim($text);

        if (!empty($text)) {
            $row = DB::table('language')->where('phrase', '=', $text)->first();
            if ($row && $row->$language) {
                if(isset($_GET['displayDebug']) or $debug) return "{ {$row->en} }";
                return $row->$language;
            } else {

                if (!$row) {
                    // var_dump($row);
                    $text2 = $text; // by abdo entej
                    $text2 = str_replace('_', ' ', $text2);
                    $text2 = ucfirst($text2);
                    DB::insert('insert into language (phrase, en, ar) values (?, ?, ?)', [$text, $text2, $text2]);
                    // var_dump($phrase);
                    $row = DB::table('language')->where('phrase', '=', $text)->first();
                }


                    return $row->en;

                // /mo2_43
                //                            return false;
            }
        } else {
            return false;
        }
    }

}


//
if (! function_exists('send_email')) {
    
    function send_email( $to, $name, $subject, $message)
    {
        $gnl = General::first();

        $template = $gnl->template;
        $from = $gnl->email;
		if($gnl->emailnotf == 1)
		{

			$headers = "From: $gnl->title <$from> \r\n";
			$headers .= "Reply-To: $gnl->title <$from> \r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			$mm = str_replace("{{name}}",$name,$template);     
			$message = str_replace("{{message}}",$message,$mm); 

			if (mail($to, $subject, $message, $headers)) {
			  // echo 'Your message has been sent.';
			} else {
			 //echo 'There was a problem sending the email.';
			}

		}

    }
}

if (! function_exists('send_sms')) 
{
    
    function send_sms( $to, $message)
    {
        $gnl = General::first();
        
		if($gnl->smsnotf == 1)
		{
			$sendtext = urlencode("$message");
		    $appi = $gnl->smsapi;
			$appi = str_replace("{{number}}",$to,$appi);     
			$appi = str_replace("{{message}}",$sendtext,$appi); 
			$result = file_get_contents($appi);
		}

    }
}