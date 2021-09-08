<?php
namespace App\Services;
use App\Models\Image;
use App\Models\Product;
use App\imports\ProductImport;
use App\imports\Image1ProductImport;
use App\imports\Image2ProductImport;
use App\imports\Image3ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use DB;

class ProductService
{
    public function storeProduct($request)
    {
        DB::beginTransaction();
        try{
            $OBJ_Products = new Product($request->all());
            $OBJ_Products->slug = Str::slug($request->name);
            $OBJ_Products->save();

            $get_id_product = Product::orderBy('id','desc')->first();
            $images = [];
            if($request->hasfile('file_image')){
                foreach($request->file('file_image') as $key =>  $image){
                    $name = $image->getClientOriginalName();
                    $image->move(public_path('images/products'), $name);  
                    $images[] = $name; 

                    $OBJ_Images = new Image();
                    $OBJ_Images->image = $images[$key];
                    $OBJ_Images->product_id = $get_id_product->id;
                    $OBJ_Images->STT = $key+1;
                    $OBJ_Images->status = 1;
                    $OBJ_Images->save();
                }
            }
            DB::commit();
            return true;
        }
        catch(Exception $ex){
            DB::rollBack();
            return false;
        }
    }

    public function updateProduct($request,$id_product)
    {
        DB::beginTransaction();
        try{

            Product::find($id_product)->update($request->all());

            if($request->hasfile('file_image')){
                foreach($request->file('file_image') as $image){
                    $name = $image->getClientOriginalName();
                    $image->move(public_path('images/products'), $name);  
                }
            }

            if($request->file_image){
                for($i = 1;$i<=3;$i++){
                    if(isset($request->file_image[$i])){
                        $proImageName = $request->file_image[$i]->getClientOriginalName();
                        $productImage['image'] = $proImageName;
                        Image::where([['product_id', '=',$id_product], ['STT', '=', $i]])->update($productImage);
                    }
                }
            }
            DB::commit();
            return true;
                
        }
        catch(Exception $ex){
            DB::rollBack();
            return false;
        }
    }

    public function importProduct($request)
    {
        DB::beginTransaction();
        try{
            Excel::import(new ProductImport,$request->file('file'));
            Excel::import(new Image1ProductImport,$request->file('file'));
            Excel::import(new Image2ProductImport,$request->file('file'));
            Excel::import(new Image3ProductImport,$request->file('file'));

            DB::commit();
            return true;
        }
        catch(Exception $ex){
            DB::rollBack();
            return false;
        }
    }
}