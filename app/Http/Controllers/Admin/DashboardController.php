<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $how_much_operator = DB::table('operators')->where('user_id', $user_id)->count();
        $operator_id = DB::table('operators')->select("id")->where('user_id', $user_id)->get();
        $operator = DB::table('operators')->select("id", "name", "engagement_price", "description", "phone", "address", "foundation_year")->where('user_id', $user_id)->get();
        $there_is_operator = false;
        if($how_much_operator == 0){
            $there_is_operator = false;
        }else{
            $there_is_operator = true;
        }
        return view('admin.dashboard', compact("there_is_operator", "operator_id", "operator"));
    }
}