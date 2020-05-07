<?php

namespace App\Http\Controllers;

use App\Menu;

use Illuminate\Http\Request;
use DB;
use App\IncomingOrders;


class IncomingordersController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'order' => 'required'


        ]);

        $data = array();
        $data['name'] = $request->input('name');
        $data['location'] = $request->input('location');
        $data['order'] = $request->input('order');
        $data['phone'] = $request->input('phone');
        $data['email'] = $request->input('email');
        $data['message'] = $request->input('message');
        DB::table('orders')->insert($data);
    }

    public function index()
    {
        $tasks = orders::all();

        return response()->json($tasks);
    }
}
