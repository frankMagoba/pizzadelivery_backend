<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\menu;
use App\pizzamenu;
use App\pizza;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class orderscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = order::where('user_id', Auth::id())->get();
        $response = [];

        foreach($orders as $order) {
            $total = 0;
            foreach($order->items as $item){
                $total += $item->price * $item->pivot->quantity;
            }
            array_push($response, [
                'order'=> $order,
                'total' => $total
            ]);
        }

        return response()->json($response);
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
        $validator = Validator::make($request->all(),[
            'address' => 'required',
            'phone_number' => 'required',
            'name' => 'required',
            'currency' => 'required',
            'pizzas' => 'required',
        ]);

        if ( $validator->fails() ) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);

        }

        $order = new order();
        // $currency = Currency::find($request->currency);

        $order->user_id = $request->user_id ? $request->user_id : null;
        $order->address = $request->address;
        $order->phone_number = $request->phone_number;
        $order->name =$request->name;
        $order->currency_id =$request->currency;
        $order->delivery_rate =5;

        $order->save();

        foreach ($request->items as $key => $value) {
            $item_order = new pizzamenu();
            $item = pizza::find($value['id']);

            $item_order->order_id = $order->id;
            $item_order->item_id = $item->id;
            $item_order->price = $item->price;
            $item_order->quantity = $value['quantity'];

            $item_order->save();
        }

        if($request->user_id){
            $cart = menu::where('user_id',$request->user_id)->delete();
        }

        return response()->json([
            'success' => true,
            'response' => [
                'message'=>"The order was placed successfully",
                'order_number'=>$order->id,
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = order::find($id);
        $total = 0;

        foreach($order->items as $item){
            $total += $item->price * $item->pivot->quantity;
        }

        return response()->json([
            'order'=>$order,
            'total'=>$total
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
