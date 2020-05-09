<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pizza;
use App\menu;
use App\pizzamenu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class menucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'pizza' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $cart = menu::where("user_id", Auth::id())->firstOr(function () {
            $new_cart = new menu();
            $new_cart->user_id = Auth::id();

            $new_cart->save();

            return $new_cart;
        });

        foreach ($request->items as $key => $value) {

            if ($this->checkIfInCart($cart->items, $value['id'])) {
                $item_cart = new pizzamenu();

                $item_cart->item_id = $value['id'];
                $item_cart->quantity = $value['quantity'];
                $item_cart->cart_id = $cart->id;
                $item_cart->save();
            }
        }

        return response()->json([
            "success" => true,
            "message" => "Items successfully added to cart",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cart = menu::where('user_id', Auth::id())->first();
        $response = [];

        if (!empty($cart))
            foreach ($cart->items as $item) {
                array_push($response, [
                    'id' => $item->id,
                    'name' => $item->name,
                    'image_url' => $item->image_url,
                    'price' => $item->price,
                    'quantity' => $item->pivot->quantity,
                ]);
            }

        return response()->json([
            'items' => $response
        ]);
    }

    public function remove_item(Request $request, int $id)
    {
        $cart = menu::where('user_id', Auth::id())->first();

        $item_cart = DB::table('pizza_to_menu')->where([['menu_id', '=', $cart->id], ['pizza_id', '=', $id]])->delete();

        if (empty($item_cart)) {
            return response()->json([
                'success' => false,
                'message' => "This pizza isn't in your menu",
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Item remove successfully',
        ]);
    }

    private function checkIfInCart($items, $id)
    {

        foreach ($items as $key => $value) {
            if ($value['id'] == $id)
                return false;
        }

        return true;
    }
}
