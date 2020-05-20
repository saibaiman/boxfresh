<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class IndexController extends Controller
{
    
    public function home($user) {
        $user = User::where('id', $user)->first();
	return view('top.home', compact('user'));
    }        

    public function showForm($user) {
        $user = User::where('id', $user)->first();
        return view('top.form', compact('user'));
    }        
   
    public function register(RegisterRequest $request) {
	$message = new Message;
	$message->user_id = $request->user_id;
	$message->message = $request->question;
	$message->save();
	return back()->with('flash_message', 'finish sending message');
    }

// code for already-read unread  
    public function preRead($message) {
        $question = Message::where('id', $message)->where('read', '0')->first();
        $user = Auth::user();
        if (!is_null($question)) {
	    $question->read = 1;
            $question->save();
        } else {
            return redirect()->route('top.index', ['user' => $user->id])->with('flash_message', 'cannot change read function, dont touch url');
        }	
        return redirect()->route('top.index', ['user' => $user->id]); 
    }        
    
    public function unread($message) {
        $question = Message::where('id', $message)->where('read', '1')->first();
        $user = Auth::user();
        if ($question) {
	    $question->read = 0;
            $question->save();
        } else {
            return redirect()->route('top.read')->with('flash_message', 'cannot change read function');
        }	
        return redirect()->route('top.read', ['user' => $user->id]); 
    }        
    
   // already-index unread-index 
    public function index($user) {
        $auth = Auth::user(); 
        if ($auth->id == $user) {
            $message = Message::where('user_id', $user)->where('read', '0')->orderBy('created_at', 'desc')->paginate(5);
            $userd = User::where('id', $auth->id)->first();
        } else {
            return redirect('home')->with('flash_message', 'cannot read this page, dont touch url');
        }
        return view('top.index', compact('userd', 'message'));
    }        
    
    public function read($user) {
        $auth = Auth::user(); 
        if ($auth->id == $user) {
            $message = Message::where('user_id', $user)->where('read', '1')->orderBy('created_at', 'desc')->paginate(5);
            $userd = User::where('id', $auth->id)->first();
        } else {
            return redirect('home')->with('flash_message', 'cannot read this page');
        }
        return view('top.read', compact('userd', 'message'));
    }        

}
