<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use App\Models\Feature;
use App\Models\Journalist;
use App\Models\Payment;
use App\Models\Research;
use App\Models\Slider;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest('id')->get();
        $sliderse = Slider::latest('id')->get();
        $teachers = Teacher::orderBy('created_at', 'desc')->take(3)->get();
        $events = Event::orderBy('created_at', 'desc')->take(3)->get();
        $features = Feature::latest('id')->get();
        $latestItems = Course::orderBy('created_at', 'desc')->take(6)->get();
        $journalists = Journalist::orderBy('created_at', 'desc')->take(3)->get();
        return view('site.index',compact('sliders','teachers','events','latestItems','journalists','features','sliderse'));
    }
    public function about()
    {
        $user =  User::count();
        $course =  Course::count();
        $teacher =  Teacher::count();
        $event =  Event::count();
        $teachers = Teacher::orderBy('created_at', 'desc')->take(3)->get();
        return view('site.about',compact('teachers','user','course','teacher','event'));
    }

    public function courses()
    {
        $courses = Course::latest('id')->get();
        return view('site.courses',compact('courses'));
    }

    public function events()
    {
        $events = Event::latest('id')->get();
        return view('site.events',compact('events'));
    }

    public function blog()
    {
        $journalists = Journalist::latest('id')->get();
        return view('site.blog',compact('journalists'));
    }

    public function contact()
    {
       return view('site.contact');
    }

    public function research()
    {
        $researchs = Research::latest('id')->get();
        return view('site.research',compact('researchs'));
    }


    public function teacher()
    {
        $teachers = Teacher::latest('id')->get();
        return view('site.teacher',compact('teachers'));
    }

    public function notice()
    {
       return view('site.notice');
    }

    public function scholarship()
    {
        return view('site.scholarship');
    }

    public function course_single($id)
    {
        $course = Course::findOrFail($id);
        $courses = Course::orderBy('created_at', 'ASC')->take(3)->get();
        return view('site.course-single',compact('course','courses'));
    }

     public function apply($id)
    {
        $course = Course::findOrFail($id);
        $price = $course->price;
        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                    "&amount=" . $price.
                    "&currency=USD" .
                    "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode( $responseData, true );

        $id = $responseData['id'];
        return view('site.apply',compact('course','id'));
    }
    public function payment(Request $request,$id )
    {
        $course = Course::findOrFail($id);
        $resourcePath = $request->resourcePath;
    $url = "https://eu-test.oppwa.com".$resourcePath;
	$url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	$responseData = json_decode($responseData, true);

        $transaction_id = $responseData['id'];
        $code = $responseData['result']['code'];
        if($code == "000.100.110") {

            Auth::user()->courses()->attach($id);

            Payment::create([
                'transaction_id' => $transaction_id,
                'amount' => $course->price,
                'user_id' => Auth::id(),
                'course_id' => $course->id
            ]);

            $type = 'success';
            $msg = 'Payment Done Successfully';

            return view('site.status', compact('type', 'msg'));

        }else {
            $type = 'danger';
            $msg = 'Payment Failed';

            return view('site.status', compact('type', 'msg'));;
        }
    }











}
