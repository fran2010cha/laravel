<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Exports\CategoriesExport;


class CategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::all();
        $cats = Category::all();
        return view('categories.index')->with('cats', $cats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CategoryRequest $request)
    {
        $cat = new Category;
        $cat->name        = $request->name;
        $cat->description = $request->description;


        if($cat->save()) {
            return redirect('categories')->with('message', 'La Categoría '.$cat->name.' fue creada con exito!');
       }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Category::find($id);
        return view('categories.show')->with('cat', $cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::find($id);
        return view('categories.edit')->with('cat', $cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $cat = Category::find($id);
        $cat->name        = $request->name;
        $cat->description = $request->description;
        if($cat->save()) {
            return redirect('categories')->with('message', 'La Categoría '.$cat->name.' fue editada con exito!');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        if ($cat->delete()) {
            return redirect()->back()->with('message', 'La Categoria '.$cat->name.' fue eliminada con exito!');
        }
    }

    public function pdf() {
        $cat = Category::all();
        $pdf = \PDF::loadView('categories.pdf', compact('categories'));
        return $pdf->download('categories.pdf');
    }
    public function excel() {
        return \Excel::download(new CategoriesExport, 'categories.xlsx' );
         // $users = User::all();
        // $pdf = \PDF::loadView('users.pdf', compact('users'));
        // return $pdf->download('users.pdf');
    }
}
