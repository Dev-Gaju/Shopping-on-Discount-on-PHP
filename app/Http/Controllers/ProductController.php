<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\SubImage;
use Illuminate\Http\Request;
use Image;
use DB;

class ProductController extends Controller
{
  public function addProdct(){
      $publishedBrands= Brand::where('publication_status',1)->get();
      $publishedCategories= Category::where('publication_status',1)->get();
      return view('admin.product.add-product',[
          'publishedBrands' =>$publishedBrands,
          'publishedCategories'=>$publishedCategories

          ]);
  }
   public function saveProductInfo(Request $request){

      $productImage=$request->file('main_image');
      $imagename=$productImage->getClientOriginalName();
      $directory=('product-Image/');
//      $productImage->move($directory,$imagename);
     $imageUrl=$directory.$imagename;
      Image::make($productImage)->save($imageUrl);
//       return $imageUrl;







       $productInfo=new Product();
       $productInfo->product_name= $request->product_name;
       $productInfo->catrgory_id= $request->category_id;
       $productInfo->brand_id=$request->brand_id;
       $productInfo->product_price=$request->product_price;
       $productInfo->product_quantity=$request->product_quantity;
       $productInfo->short_description=$request->short_description;
       $productInfo->long_description=$request->long_description;
       $productInfo->main_image=$imageUrl;
       $productInfo->publication_status=$request->publication_status;
       $productInfo->save();
       $productId=$productInfo->id;



       $SubImages=$request->file('sub_image');
       foreach ($SubImages as $SubImage){
           $Subimagename=$SubImage->getClientOriginalName();
           $Sub_directory=('sub-Image/');
           $SubImageUrl=$Sub_directory.$Subimagename;
           Image::make($SubImage)->save($SubImageUrl);

           $subImageInfo=new SubImage();
           $subImageInfo->product_id=$productId;
           $subImageInfo->sub_image=$SubImageUrl;
           $subImageInfo->save();
       }
return redirect('/product/add-product')->with('message','Save Product Info Sucessfully');

   }
   public function ManageProductInfo(){
       $productInfo=DB::table('products')
          ->join('categories','products.catrgory_id','=','categories.id')
          ->join('brands','products.brand_id','=','brands.id')
          ->select('products.id','products.product_name',
              'products.product_price','products.product_quantity',
              'products.short_description','products.long_description',
              'products.publication_status','products.main_image','categories.category_name','brands.brand_name')
           ->get();


//      $productInfo=Product::orderBy('id','desc')->get();
      return view('admin.product.manage-product',['productInfo'=>$productInfo]);
   }

   public function editProductInfo($data){

      $productInfo=Product::find($data);
      return view('admin.product.edit-product',['productInfo'=>$productInfo]);
   }

    public function updateProductInfo(Request $request){
       $updateInfo=Product::find($request->product_id);
        $updateInfo->product_name=$request->product_name;
        $updateInfo->product_price=$request->product_price;
        $updateInfo->product_quantity=$request->product_quantity;
        $updateInfo->short_description=$request->short_description;
        $updateInfo->long_description=$request->long_description;
        $updateInfo->main_image=$request->main_image;
        $updateInfo->publication_status=$request->publication_status;
        $updateInfo->update();
        return redirect('/product/manage-product')->with('message','Updated Info Successfully');

    }
}