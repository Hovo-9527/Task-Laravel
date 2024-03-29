<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        $total = 0;
        $costs = 0;
        $endingTotal=0;
        $endingCosts=0;
        foreach ($products as $key){
            $total+=$key['price'];
            $costs+=$key['cost'];
            if($key['count']>0){
                $endingTotal+=$key['price'];
                $endingCosts+=$key['cost'];
            }
        }
        $income = $total-$costs;
        $incomeEnding = $endingTotal-$endingCosts;
        return view('admin.product',compact('categories', 'incomeEnding', 'total', 'costs', 'income'))->with('product',$products);
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
    public function store(ProductRequest $request)
    {
        $products = new Product();
        $products->title = $request->title;
        $products->cost = $request->cost;
        $products->price = $request->price;
        $products->count = $request->count;
        $products->category_id = $request->category_id;
        $products->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::find($id);
        return view('admin.edit-product',)->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        Product::where('id', $id)->update([
            'title' => $request->title,
            'cost' => $request->cost,
            'price' => $request->price,
            'count' => $request->count,
            'category_id' => $request->category_id,
        ]);

        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Product::find($id)){
            Product::where('id',$id)->delete();
            return redirect()->back();

        }
    }
}
