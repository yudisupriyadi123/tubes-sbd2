<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PostModel;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Image;

class PostController extends Controller
{
  //
  public function product(Request $req)
  {
    $title = $req['title'];
    $price = $req['price'];
    $discount = $req['discount'];
    $description = $req['description'];
    $stock = $req['stock'];
    $category = $req['category'];
    $dt = array(
      'id' => NULL,
      'name' => $title,
      'price' => $price,
      'discount_in_percent' => $discount,
      'description' => $description,
      'stock' => $stock,
      'category_id' => $category,
      'created_at' => NULL,
      'updated_at' => NULL,
      'thumbnail_image_id' => 0,
    );
    $rest = PostModel::PostProduct($dt);
    if ($rest) {
      $id = PostModel::GetProductId();
      echo $id;
    } else {
      echo "failed";
    }
  }
  public function image(Request $req)
  {
    $this->validate($req, [
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
    ]);
    $product_id = $req['product_id'];
    $image = $req->file('image');
    $chrc = array('[',']','@',' ','+','-','#','*','<','>','-','(',')',';',',','&','%','$','!','`','~','=','{','}','/',':','?','"',"'",'^');
    $filename = time().str_replace($chrc, '', $image->getClientOriginalName());
    //pembuatan image thumbnail gagal
    //create image real
    $destinationPath = 'img/posting/foto/';
    $image->move($destinationPath, $filename);

    //save data img local
    $data = array(
      'id' => NULL,
      'image' => $destinationPath.$filename,
      'product_id' => $product_id,
    );
    $rest = PostModel::PostImage($data);
    if ($rest) {
      echo "success";
    } else {
      echo "failed";
    }
  }
  public function size(Request $req)
  {
    $size = $req['size'];
    $product_id = $req['id'];
    $spl = explode(',', $size);
    try {
      for ($i=0; $i < count($spl); $i++) {
        $data = array(
          'id' => NULL,
          'size' => $spl[$i],
          'product_id' => $product_id
        );
        PostModel::PostSize($data);
      }
      echo "success";
    } catch (Exception $e) {
      echo "failed";
    }
  }
  public function color(Request $req)
  {
    $color = $req['color'];
    $product_id = $req['id'];
    $spl = explode(',', $color);
    try {
      for ($i=0; $i < count($spl); $i++) {
        $data = array(
          'id' => NULL,
          'color' => $spl[$i],
          'product_id' => $product_id
        );
        PostModel::PostColor($data);
      }
      echo "success";
    } catch (Exception $e) {
      echo "failed";
    }
  }
  public function settingup(Request $req)
  {
    $product_id = $req['id'];
    $image_id = PostModel::GetImageListId($product_id);
    $data = array('thumbnail_image_id' => $image_id);
    $rest = PostModel::PostSettingUp($product_id, $data);
    if ($rest) {
      echo "success";
    }
  }
}
