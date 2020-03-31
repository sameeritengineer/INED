<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lead;
use App\Subscriber;
use Response;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {	
      return view('admin.dashboard');
    }
    public function vdashboard()
    {	
      return "Vendor";
    }
    public function leads()
    {	
      $data = [];
      $data['leads'] = Lead::get();
      return view('admin.contact.index',$data);
    }
    public function subscribers()
    { 
      $data = [];
      $data['subscribers'] = Subscriber::get();
      return view('admin.contact.subscribers',$data);
    }
    public function downloadleads()
    {	

    	$headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=file.csv",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
       );

	    $reviews = Lead::get();
	    $columns = array('name', 'email', 'phone' , 'subject' ,'message');

	    $callback = function() use ($reviews, $columns)
	    {
	        $file = fopen('php://output', 'w');
	        fputcsv($file, $columns);

	        foreach($reviews as $review) {
	            fputcsv($file, array($review->name, $review->email, $review->phone, $review->subject, $review->message));
	        }
	        fclose($file);
	    };
	    return Response::stream($callback, 200, $headers);

    }		
}
