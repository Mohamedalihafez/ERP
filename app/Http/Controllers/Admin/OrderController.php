<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.pages.order.index',[
            'orders' => Order::filter($request->all())->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(Order $order)
    {
        return view('admin.pages.order.upsert',[
            'order' => $order,
            'products'=> Product::all(),
        ]);
    }
    public function getPrice(Request $request)
    {
       return Order::getPrice($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function modify(OrderRequest $request)
    {
        return Order::upsertInstance($request);
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
    public function destroy(Order $order)
    {
        return $order->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.order.index',[
            'orders' => Order::filter($request->all())->paginate(10)
        ]);
    }
}
