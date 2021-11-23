<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\food;
use App\Models\Category;
class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods=Food::latest()->paginate(10);
        return view('food.view',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
         'name'=>'required|unique:food',
         'description'=>'required',
         'price'=>'required',
         'category'=>'required',
         'type'=>'required'
         ]);
         food::Create([
            'name'=>$request->get('name'),
            'description'=>$request->get('description'),
            'price'=>$request->get('price'),
            'category_id'=>$request->get('category'),
            'type'=>$request->get('type')
         ]);
         return redirect()->back()->with('messege','Food Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food=Food::find($id);
        return view('food.edit',compact('food'));
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
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'category'=>'required',
            'type'=>'required'
            ]);
            $food=Food::find($id);
            $food->name=$request->get('name');
            $food->description=$request->get('description');
            $food->price=$request->get('price');
            $food->category_id=$request->get('category');
            $food->type=$request->get('type');
            $food->save();
            return redirect()->route('food.index')->with('messege','Food Updated');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food=Food::find($id);
        $food->delete();  
        return redirect()->route('food.view')->with('messege','Food Deleted');
    }
    public function listfood(){
        $categories=Category::with('food')->get();
        return view('view',compact('categories'));
    }
    
}
