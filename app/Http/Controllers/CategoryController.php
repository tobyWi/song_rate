<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;
use App\Song;

class CategoryController extends Controller
{
    //All Categories
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.all', ['categories' => $categories]);
    }

    //Create new category
    public function store() 
    {
        $this->validate(request(), [
            'name'         => 'required|string|max:50'
        ]);

        Category::create([
            'name'         => request()->name
        ]);

        Session::flash('msg', 'Category added!');

        return redirect()->back();
    }

    //Edit Category
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    //Update Category
    public function update($id)
    {
        
        $this->validate(request(), [
            'name'=>'required|string|max:10',
        ]);

        $category = Category::findOrFail($id);

        $category->name = request()->name;

        $category->save();


        Session::flash('msg', 'Category name updated');


        return redirect()->route('admin.categories.all');

    }

    public function destroy($id)
    {
        
        if (Song::where('category_id', $id)->count()) {

            Session::flash('error', 'Category can\'t be removed');

            return redirect()->back();

        }


        $category = Category::findOrFail($id);

        $category->delete();

        Session::flash('msg', "Category $category->name deleted");


        return redirect()->route('admin.categories.all');
    }

}
