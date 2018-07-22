<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UrlController extends Controller
{

    public function processUrl(Request $request)
    {
        $request->validate([
            'link' => 'required|url',
        ]);
        $newLink = $request->link;
        $storedLink = Link::where('url', $newLink)->first();
        $user_id = Auth::id() ?: User::where('email', 'admin@example.com')->first()->id;

        if($storedLink) {
            return redirect('/')
                ->withInput()
                ->with('link', $storedLink->hashed_url);
        } else {
            do {
                $hashedValue = Str::random(6);
            } while(Link::where('hashed_url',$hashedValue)->count() > 0);
                Link::create(array('url' => $newLink, 'hashed_url' => $hashedValue, 'user_id' => $user_id));

            return redirect('/')
                ->withInput()
                ->with('link',$hashedValue);
        }
    }

    public function redirectHash(Request $request, $hash) {
        $url = Link::where('hashed_url','=',$hash)
            ->first();
        if($url) {
            return redirect($url->url);
        } else {
            return redirect('/')
                ->with('message','That link is invalid.');
        }
    }
}
