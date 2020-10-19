<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Size;
use App\ProductMaster;

class ProductController extends Controller
{
    public function ProcuctIndex(){

        $product = ProductMaster::all();
    	return view('product.index',compact('product'));
    }
    public function ProcuctCreate(){
         $category_list = Category::all();
         // dd($category_list)
         $size = Size::all();
        return view('product.create',compact('category_list','size'));
    }

    public function productView($product_id){
        $product = ProductMaster::find($product_id);
        return view('product.view',compact('product'));
    }
    public function productEdit($product_id){
        // dd($product_id); 
        $product = ProductMaster::find((int)$product_id);
        // dd($product);
         $category_list = Category::all();
         $size = Size::all();
        return view('product.edit',compact('category_list','size','product'));
    }
    public function productSave(Request $req){

        $product = new ProductMaster();
        $product->product_name = $req->product_name;
        $product->product_category = $req->product_category;
        $product->product_size = $req->product_size;
        $product->product_price = $req->product_price;
        $product->product_stock = $req->product_stock;
        $product->product_description = $req->product_description;
        if($product->save()) {

            $response["status"] = "success";            
            }

            else {

            $response["status"] = "failure";
            }

        return $response;

    }

    public function productUpdate(Request $req,$product_id){

        $product = ProductMaster::find((int)$product_id);
        $product->product_name = $req->product_name;
        $product->product_category = $req->product_category;
        $product->product_size = $req->product_size;
        $product->product_price = $req->product_price;
        $product->product_stock = $req->product_stock;
        $product->product_description = $req->product_description;
        if($product->save()) {

            $response["status"] = "success";            
            }

            else {

            $response["status"] = "failure";
            }

        return $response;
    }

    public function productDelete($product_id){

         $product = ProductMaster::find((int)$product_id);
        $product->delete();
        return back()->with('warning','Product Deleted successfully!');
    }

    // ================Category section start===============================

    public function productCategory(){

        $category = Category::all();

    	return view('product_category.index',compact('category'));
    }

    public function ProductCategoryCreate(){

    	return view('product_category.create');
    }
    public function ProductCategorySave(Request $req){

        // dd($req->all());
        $category = new Category();
        $category->product_category = $req->product_category;
        if($category->save()) {

            $response["status"] = "success";            
            }

            else {

            $response["status"] = "failure";
            }

        return $response;
    }

    public function ProductCategoryEdit($category_id){

            $cat_id = (int)$category_id;
             $category = Category::find((int)$category_id);
              $category_list = Category::all();
             return view('product_category.edit',compact('category','category_list', 'cat_id'));
    }

    public function ProductCategoryUpdate(Request $req, $cat_id){

        $category = Category::find((int)$cat_id);
        $category->product_category = $req->product_category;
             if($category->save()) {

             $response["status"] = "success";            
             }

             else {

             $response["status"] = "failure";
             }

        return $response;
    }
    public function productCategoryList($category_id){

        $category = Category::find((int)$category_id);

        return view('product_category.view',compact('category'));

    }
    public function productCategoryDelete($category_id){

        // dd($category_id);

         $category = Category::find((int)$category_id);
        $category->delete();
        return back()->with('warning','Category Deleted successfully!');
    }

      // ================Category section end===============================



    // ================Size section start===============================

        public function productSize(){

         $size = Size::all();

        return view('product_size.index',compact('size'));
    }

    public function productSizeCreate(){
        return view('product_size.create');
    }
    public function productSizeSave(Request $req){

        $size = new Size();
        $size->product_size = $req->product_size;
        if($size->save()) {

             $response["status"] = "success";            
             }
             else {
             $response["status"] = "failure";
             }
        return $response;
    }
    public function productSizeEdit($size_id){

        // dd($size_id);
        $siz_id = (int)$size_id;
             $size = Category::find((int)$siz_id);
              $size_list = Size::all();

        return view('product_size.edit',compact('size','siz_id','size_list'));
    }
    public function productSizeUpdate(Request $req,$size_id){

        // dd($req->all());
        $size = Size::find((int)$size_id);
        $size->product_size = $req->product_size;
             if($size->save()) {

             $response["status"] = "success";            
             }

             else {

             $response["status"] = "failure";
             }
    }

    public function productSizeView($size_id){
         $size = Size::find((int)$size_id);
         return view('product_size.view',compact('size'));
    }
    public function productSizeDelete($size_id){

        $size = Size::find((int)$size_id);
        $size->delete();
        return back()->with('warning','Size Deleted successfully!');
    }

    // ================Size section start end===============================
}
