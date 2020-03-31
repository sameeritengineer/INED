<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\Lead;
use App\Subscriber;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class ContactController extends BaseController
{
    public function index()
    {   
        return view('web.contact.index');
    }
    public function store(Request $request)
    {   
    
      $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

       $success = true;
       $dbError = [];
       $params = $request->input();
       try {
 
              $lead = Lead::create([
                'name' => trim($params['name']),
                'email' => trim($params['email']),
                'phone' => trim($params['phone']),
                'subject' => trim($params['subject']),
                'message' => trim($params['message'])
            ]);

         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'There some error to contact with us.'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success','Thanks for contact with us');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        }    

    }
    public function subscribe(Request $request)
    { 
       $rules = array('email' => 'required|email|unique:subscribers');
       $validator = Validator::make($request->all(), $rules);
       // Validate the input and return correct response
        if ($validator->fails())
        {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            )); // 400 being the HTTP code for an invalid request.
        }

       $success = true;
       $dbError = [];
       $params = $request->input();
       try {
 
          $subscriber = Subscriber::create([
                'email' => trim($params['email']),
            ]);

         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'There some error to subscribe with us.'
                ];
            }

        return Response::json(array('success' => $success), 200);
      
    }
}
