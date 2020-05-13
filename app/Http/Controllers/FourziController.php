<?php

namespace App\Http\Controllers;

use App\Log;
use App\Qr;
use App\Team;
use App\User;
use Cookie;
use Illuminate\Http\Request;
use QrCode;

class FourziController extends Controller {
    public function login(Request $request) {
        $password = $request->password;
        $auth = $request->cookie("auth");
        $user = null;

        // Already Logined
        if ($auth != null) {
            $user = User::where("password", "=", $auth)->first();
        }
        // Pre-load password
        if ($password != null) {
            $user = User::where("password", "=", $password)->first();
            Cookie::queue("auth", $password);
        }

        // Checking User-Agent
        // $UA = $request->header("User-Agent");
        // if (strpos($UA, "Android") !== false && strpos($UA, "Line") !== false) {
        //     return view("redirect", ["agent" => "Android LINE"]);
        // } else if (strpos($UA, "iPhone") !== false || strpos($UA, "iPad") !== false) {
        //     if (strpos($UA, "Line") !== false) {
        //         return view("redirect", ["agent" => "iOS LINE"]);
        //     }
        //    $is_valid = False;
        //     foreach (array("Safari", "CriOS", "FxiOS", "OPiOS") as $key => $value) {
        //         if (strpos($UA, $value) !== false) {
        //            $is_valid = True;
        //        }
        //     }
        //     if (!$is_valid) {
        //         return view("redirect", ["agent" => "iOS WebView"]);
        //     }
        // }
        if ($user == null) {
            Cookie::queue(Cookie::forget("auth"));
            return view("login");
        } else {
            return redirect("dashboard");
        }

    }

    public function logout() {
        Cookie::queue(Cookie::forget("auth"));
        return redirect("/login");
    }

    public function fail() {
        Cookie::queue(Cookie::forget("auth"));
        return view("fail");
    }

    public function dashboard(Request $request) {
        // $agent = $request->$agent;
        return view("dashboard", ["user" => $request->user]);
    }

    public function getMyPassword(Request $request) {
        return view("getMyPassword");
    }

    private function serverFail() {
        return ("伺服器錯誤");
    }

    public function myTeam(Request $request) {
        $user = $request->user;
        //User::where("password", "=", Cookie::get("auth"))->first();
        $team = $user->team; //Team::where("tid", "=", $user->tid)->first();
        return view("myteam", ["team" => $team, "user" => $user]);
    }

    public function allTeam(Request $request) {
	    if($request->user->role<99)
	    return "permission deny";
        return view("allteam", ["teams" => Team::where("tid", "!=", 99)->orderBy("points", "desc")->get(), "user" => $request->user]);
    }

    public function qrscan(Request $request) {
        return view("qrscan", ["user" => $request->user]);
    }

    public function qrscan_beta(Request $request) {
        return view("qrscan_beta", ["user" => $request->user]);
    }

    public function qrinfo(Request $request) {
        $item = Qr::where("serial", "=", $request->serial)->first();
        $user = User::where("password", "=", Cookie::get("auth"))->first();
        return view("qrinfo", ["user" => $user, "qr" => $item]);
    }

    public function qrdeposit(Request $request) {
        $user = User::where("password", "=", Cookie::get("auth"))->first();
        $team = $user->team;
        $qr = Qr::where("serial", "=", $request->serial)->first();
        if ($team == null || $qr == null || $qr->used == 1) {
            return view("qrfail", ["qr" => $qr, "team" => $team]);
        }

        $old = $team->points;
        $new = $old + $qr->points;
        Qr::where("serial", "=", $request->serial)->update(["used" => 1]);
        //Team::where("tid", "=", $member->team)
        $team->points += $qr->points;
        $team->save();
        //$team->update( ["points" => $new] );

        $text = $user->name . " (" . $team->tid . ") 儲值 " . $qr->creator . " 發送的 " . $qr->points . " 元。";
        $data["text"] = $text;
        Log::create($data);
        return view("qrsuccess", ["qr" => $qr, "team" => $team]);
    }

    public function qrcreate(Request $request) {
        $user = $request->user; //User::where("password", "=", Cookie::get("auth"))->first();
        if ($user->role < 10) {
            return ("權限不足");
        }

        $points = $request->points;
        $msg = $request->msg;

        if ($points == null || $msg == null) {
            return view("qrcreate", ["user" => $request->user]);
        }

        if ($user->role != 99) {
            $user->quota -= $points;
            $user->save();
        }

        $data["serial"] = "FZ" . substr(md5(uniqid(rand(), true)), 0, 28);
        while (Qr::where("serial", "=", $data["serial"])->exists()) {
            $data["serial"] = "FZ" . substr(md5(uniqid(rand(), true)), 0, 28);
        }
        $data["points"] = $points;
        $data["used"] = False;
        $data["msg"] = $msg;
        $data["creator"] = $user->nickname;
        Qr::create($data);
        $code = QrCode::format("png")
            ->errorCorrection("H")
            ->merge("../public/img/logo.png", .3, true)
            ->size(500)
            ->margin(2)
            ->generate("http://2018yzucamp.tyze.me/pay/qr/info/" . $data["serial"], "../public/qrcodes/" . $data["serial"] . ".png");
        return redirect("/qrcodes/" . $data["serial"] . ".png");
    }

    public function qrgenerate(Request $request) {
        $serial = $request->serial;
    }

    public function qrlist(Request $request) {
        return view("qrlist", ["qrs" => Qr::where("creator", "=", $request->user->nickname)->orWhere("creator", "=", $request->user->name)->orderBy("created_at", "DESC")->get()]);
    }

    public function qrsuccess(Request $request) {
        return view("qrsuccess");
    }

    public function admin(Request $request) {
        if ($request->user->role < 99) {
            return "permission denied";
        }

        return view("admin", [
            "user" => $request->user,
            "logs" => Log::orderBy("created_at", "DESC")->take(20)->get(),
            "heilansha" => User::where("role", "=", 30)->get(),
            "qrs" => Qr::orderBy("used", "ASC")->orderBy("created_at", "DESC")->get(),
            "users" => User::orderBy("tid", "ASC")->orderBy("role", "ASC")->get(),
            "teams" => Team::orderBy("tid", "ASC")->get(),
        ]);
    }

    public function editQuota(Request $request) {
        $editusers = $request->input("editusers");
        $points = $request->points;
        $action = $request->action;
        foreach ($editusers as $edituser) {
            if ($action == "set") {
                $user = User::where("sid", "=", $edituser)->first();
                $user->quota = $points;
                $user->save();
            } else if ($action == "add") {
                $user = User::where("sid", "=", $edituser)->first();
                $user->quota += $points;
                $user->save();
            } else if ($action == "sub") {
                $user = User::where("sid", "=", $edituser)->first();
                $user->quota -= $points;
                $user->save();
            }
        }
        return "success";
    }

    public function betago(Request $request){
	$points = $request->points;
	$msg = $request->msg ?? "來自貝塔狗的禮物";
	$creator = $request->creator ?? "錢莊老闆";
	if(empty($points))
		return response()->json(['status'=>0, 'text'=>'未填寫金額']);

	$data["serial"] = "FZ" . substr(md5(uniqid(rand(), true)), 0, 28);
        while (Qr::where("serial", "=", $data["serial"])->exists()) {
            $data["serial"] = "FZ" . substr(md5(uniqid(rand(), true)), 0, 28);
	}
        $data["points"] = $points;
        $data["used"] = False;
        $data["msg"] = $msg;
        $data["creator"] = $creator;
        Qr::create($data);
        $code = QrCode::format("png")
            ->errorCorrection("H")
            ->merge("../public/img/logo.png", .3, true)
            ->size(500)
            ->margin(2)
            ->generate("http://2018yzucamp.tyze.me/pay/qr/info/" . $data["serial"], "../public/qrcodes/" . $data["serial"] . ".jpg");
	return response()->json([
		'status' => 1,
		'pic' => "https://2018yzucamp.tyze.me/pay/qrcodes/". $data["serial"] . ".jpg", 
		'url' => "https://2018yzucamp.tyze.me/pay/qr/info/". $data["serial"]
		]);
    }
}
