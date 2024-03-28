<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionModel;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function showSubscribeForm()
    {
        return view('subscribe');
    }

    public function subscribe(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:tbl_notification,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        $subscription = SubscriptionModel::create([
            'email' => $request->email,
            'verified' => false, 
        ]);

        return redirect()->back()->with('success', 'Subscription successful. Please check your email for confirmation.');
    }

    public function unsubscribe(Request $request)
{
    // Validate email
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:tbl_notification,email',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $subscription = SubscriptionModel::where('email', $request->email)->first();

    
    $subscription->delete();

    
    return response()->json(['message' => 'Unsubscription successful.'], 200);
}
}
