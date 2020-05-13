<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class FourziMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        // Checking User-Agent
        // $UA = $request->header("User-Agent");
        // if (strpos($UA, "Android") !== false && strpos($UA, "Line") !== false) {
        //     return new Response(view("redirect", ["agent" => "Android LINE"]));
        // } else if (strpos($UA, "iPhone") !== false || strpos($UA, "iPad") !== false) {
        //     if (strpos($UA, "Line") !== false) {
        //         // $request->agent = "iOS LINE";
        //         return new Response(view("redirect", ["agent" => "iOS LINE"]));
        //     }
        //     $is_valid = False;
        //     foreach (array("Safari", "CriOS", "FxiOS", "OPiOS") as $key => $value) {
        //         if (strpos($UA, $value) !== false) {
        //             $is_valid = True;
        //         }
        //     }
        //     if (!$is_valid) {
        //         return new Response(view("redirect", ["agent" => "iOS WebView"]));
        //     }
        // }
        // return new Response(view("redirect", ["agent" => "iOS WebView"]));

        // Check Logined
        if (!$request->hasCookie('auth')) {
            return redirect('/login');
        }
        $user = User::where('password', '=', $request->cookie('auth'))->first();
        if ($user == null) {
            return redirect('/login');
        }
        $request->user = $user;

        return $next($request);
    }
}
