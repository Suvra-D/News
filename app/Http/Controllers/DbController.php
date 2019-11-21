<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DbController extends Controller
{
    public function index()
    {
        // To show selected fields from database
/*
        $all = DB::table('employee')->select('name','email','phone')->get();
        dd($all);
        */
        // To show first row of table
/*
        $first = DB::table('employee')->first();
        dd($first);
        */
        // To show row of tables in order
/*
        $order = DB::table('employee')->select('name','email','salary')->orderBy('salary','DESC')->get();
        dd($order);
        */
        // To count the numbers of rows in a table
/*
        $count = DB::table('employee')->count();
        dd($count);
        */
        // To Limit the number of rows
/*
        $limit = DB::table('employee')->select('name','email','phone')->limit('2')->get();
        dd($limit);
  */
        // To show min or max value from a column
/*
        $min = DB::table('employee')->min('salary');
        dd($min);
        */
        // To show value by order of a column in  table

        $offset = DB::table('employee')->orderBy('salary','ASC')->offset(0)->limit(1)->get();
        dd($offset);
    }

    public function joining()
    {
        $result = DB::table('order')
                  ->join('user','user.id','=','order.user_id')
                  ->select('user.name','order.id','order.order_date','order.amount')        // Selection Field names to display
                  ->where('status',1)                                                        // Where condition
                  ->get();
        dd($result);
    }
}
