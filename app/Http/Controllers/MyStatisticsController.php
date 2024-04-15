<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyStatisticsController extends Controller
{
    public function index($operator_id){
        $months = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];
        $this_year = date("Y");
        return view("admin.operators.myStatistics", compact("operator_id", "months", "this_year"));
    }

    public function message($operator_id){
        $months = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];
        $this_year = date("Y");

        $number_messages = null;
        $selected_month_number = null;
        $selected_month_name = null;
        $selected_year = null;
        $also_month = null;
        if(isset($_GET["month"]) && isset($_GET["year"])){
            $also_month = false;
            $selected_month_number = $_GET["month"];
            $selected_year = $_GET["year"];
            if($_GET["month"] == 0){
                $number_messages = DB::table("messages")
                ->where("operator_id", "=", $operator_id)
                ->whereYear("created_at", $selected_year)
                ->count();
            }else{
                for($i=0; $i<sizeof($months); $i++){
                    if(($selected_month_number - 1) == $i){
                        $selected_month_name = $months[$i];
                    }
                }
                $also_month = true;
                $number_messages = DB::table("messages")
                ->where("operator_id", "=", $operator_id)
                ->whereMonth("created_at", $selected_month_number)
                ->whereYear("created_at", $selected_year)
                ->count();
            }
        }
        return view("admin.operators.myStatistics", compact("operator_id", "months", "this_year", "number_messages", "selected_month_name", "selected_year", "also_month"));
    }

    public function review($operator_id){
        $months = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];
        $this_year = date("Y");

        $number_reviews = null;
        $selected_month_number = null;
        $selected_month_name = null;
        $selected_year = null;
        $also_month = null;
        $average = null;
        if(isset($_GET["month"]) && isset($_GET["year"])){
            $also_month = false;
            $selected_month_number = $_GET["month"];
            $selected_year = $_GET["year"];
            if($_GET["month"] == 0){
                $number_reviews = DB::table("reviews")
                ->where("operator_id", "=", $operator_id)
                ->whereYear("created_at", $selected_year)
                ->count();
                $sum_vote = DB::table("reviews")
                ->where("reviews.operator_id", "=", $operator_id)
                ->whereYear("reviews.created_at", $selected_year)
                ->join("votes", "reviews.vote_id", "=", "votes.id")
                ->sum("votes.vote_value"); 
                if($number_reviews != 0){
                    $average = $sum_vote / $number_reviews;
                }
            }else{
                for($i=0; $i<sizeof($months); $i++){
                    if(($selected_month_number - 1) == $i){
                        $selected_month_name = $months[$i];
                    }
                }
                $also_month = true;
                $number_reviews = DB::table("reviews")
                ->where("operator_id", "=", $operator_id)
                ->whereMonth("created_at", $selected_month_number)
                ->whereYear("created_at", $selected_year)
                ->count();
                $sum_vote = DB::table("reviews")
                ->where("reviews.operator_id", "=", $operator_id)
                ->whereMonth("reviews.created_at", $selected_month_number)
                ->whereYear("reviews.created_at", $selected_year)
                ->join("votes", "reviews.vote_id", "=", "votes.id")
                ->sum("votes.vote_value");
                if($number_reviews != 0){
                    $average = $sum_vote / $number_reviews;
                }
            }
        }
        return view("admin.operators.myStatistics", compact("operator_id", "months", "this_year", "number_reviews", "selected_month_name", "selected_year", "also_month", "average"));
    }
}
