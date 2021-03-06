<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function apiDeleteFromOrder($orderId, $id)
    {
        $orderItem = OrderItem::find($id);

        if ($orderItem->order_id == $orderId) $orderItem->delete();

        return Order::find($orderId);

        $order = Order::with('items')->where('id', $orderId)->first();

        foreach ($order->items as $item) {
            if ($item->id == $id)
            dd($item);
            $item->product = Product::where('id', $item->product_id)->first(['name', 'price']);
        }

        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \App\Order
     */
    public function apiShowWithItems($id)
    {
        $order = Order::with('items')->where('id', $id)->first();

        foreach ($order->items as $item) {
            $item->product = Product::where('id', $item->product_id)->first(['id', 'name', 'price']);
        }

        return $order;
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Order::with('items')->find($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \App\Order
     */
    public function showWithItems($id)
    {
        $order = Order::with('items')->where('id', $id)->first();

        foreach ($order->items as $item) {
            $item->product = Product::where('id', $item->product_id)->first(['id', 'name', 'price']);
        }

        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publicShow()
    {
        return response(view('frontend.orders.show'));
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
