<?php

namespace App\Http\Controllers;

use App\pizzaorder;
use Illuminate\Http\Request;
use DB;


class PizzaorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizza = pizzaorder::all();

        return response()->json($pizza);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        DB::table('pizzaorders')->insert($data);

        return response()->json([
            'message' => 'Order placed successfully',
            // 'order' => $pizza
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pizzaorder  $pizzaorder
     * @return \Illuminate\Http\Response
     */
    public function show(pizzaorder $pizzaorder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pizzaorder  $pizzaorder
     * @return \Illuminate\Http\Response
     */
    public function edit(pizzaorder $pizzaorder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pizzaorder  $pizzaorder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pizzaorder $pizzaorder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pizzaorder  $pizzaorder
     * @return \Illuminate\Http\Response
     */
    public function destroy(pizzaorder $pizzaorder)
    {
        //
    }
}
