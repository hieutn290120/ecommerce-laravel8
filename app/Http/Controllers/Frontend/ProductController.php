<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\category;
use App\Models\product;
use Image;
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
        $getProduct = product::all();
        return response()->json($getProduct);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        $brand = brand::all();
        return view('frontend.product.add', compact('category', 'brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $image) {
                $name = $image->getClientOriginalName();
                $name_2 = 'hinh85_' . $image->getClientOriginalName();
                $name_3 = 'hinh329_' . $image->getClientOriginalName();


                $path = public_path('upload/image_product/' . $name);
                $path2 = public_path('upload/image_product/' . $name_2);
                $path3 = public_path('upload/image_product/' . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(50, 70)->save($path2);
                Image::make($image->getRealPath())->resize(200, 300)->save($path3);
                $data[] = $name;
            }
        }
        // dd($data);
        $result = $request->all();
        $result['image'] = json_encode($data);
        $product = product::create($result);
        return response()->json($product,201);
    }
    public function edit($id)
    {
        $product = product::where('id', $id)->get();
        $getProduct = product::find($id)->toArray();
        $getArrImage = json_decode($getProduct['image'], true);
        return view('frontend.product.edit', compact('product', 'getArrImage'));
    }
    public function update(Request $request, $id)
    {
        $getProduct = product::find($id)->toArray();
        $getArrImage = json_decode($getProduct['image'], true);
        $imageDelete = $request->imageDelete;
        foreach ($getArrImage as $key => $value) {
            if ((in_array($value, $imageDelete))) {
                unset($getArrImage[$key]);
                if (is_file('upload/image_product/' . $value)) {
                    unlink('upload/image_product/' . $value);
                }
            }
        }
        $imageOld = array_values($getArrImage);
        $data = [];
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $image) {
                $name = $image->getClientOriginalName();
                $name_2 = 'hinh85_' . $image->getClientOriginalName();
                $name_3 = 'hinh329_' . $image->getClientOriginalName();
                $data[] = $name;
            }
        }
        $imageNew = array_merge($imageOld, $data);
        if (count($imageNew) > 3) {
            return redirect()->back()->withErrors('Update product error');
        }else{
            if ($request->hasfile('image')) {
                foreach ($request->file('image') as $image) {
                    $name = $image->getClientOriginalName();
                    $name_2 = 'hinh85_' . $image->getClientOriginalName();
                    $name_3 = 'hinh329_' . $image->getClientOriginalName();


                    $path = public_path('upload/image_product/' . $name);
                    $path2 = public_path('upload/image_product' . $name_2);
                    $path3 = public_path('upload/image_product' . $name_3);
                    Image::make($image->getRealPath())->save($path);
                    Image::make($image->getRealPath())->resize(50, 70)->save($path2);
                    Image::make($image->getRealPath())->resize(200, 300)->save($path3);
                    $data[] = $name;
                }
            }
            $results = [
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'image' =>$imageNew,
                'category' => $request->get('category'),
                'brand' => $request->get('brand'),
                'status' => $request->get('status'),
                'sale' => $request->get('sale'),
                'company' => $request->get('company'),
                'details' => $request->get('details'),
            ];
            $product = product::find($id)->update($results);
            return response()->json($product);
        }
    }
    public function destroy($id)
    {
        $proDelete = product::where('id',$id)->delete();
        return response()->json($proDelete,200);
    }
    public function getDetails($id)
    {
        $productDetails = product::where('id',$id)->get();
        return view('frontend.product.product-details',compact('productDetails'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
