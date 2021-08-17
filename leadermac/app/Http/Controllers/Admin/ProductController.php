<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CatalogCategory;
use App\Models\ProductsSpecification;
use App\Models\ProductsPhoto;
use App\Models\Tags;

class ProductController extends Controller {

    public function getIndex(Request $request) {


        $products = Product::with('category.parent_category')->OrderBy('order_id');

        if ($request->has('ct_id') && $request->get('ct_id') > 0) {
            $products = $products->where('category_id', $request->get('ct_id'));
        }

        if ($request->has('title') && $request->get('title') != '') {
            $products = $products->where('title', 'ILIKE', '%' . $request->get('title') . '%');
        }

        $products = $products->paginate(20);

        $categories = CatalogCategory::get();

        return view('admin.product.index', compact('products', 'categories'));
    }

    public function getCreate() {


        $categories = CatalogCategory::get();


        return view('admin.product.create', compact('categories'));
    }

    public function postCreate(Request $request) {

        $product = Product::create($request->except('_token', 'specifications', 'photos', 'tags'));





        /*
          if($request->hasFile('photos')) {
          $photos = $request->file('photos');
          foreach($photos as $photo) {
          $name = str_random(10);
          $ext = $photo->guessExtension();
          $photo->move(public_path() .'/product', $name.'.'.$ext);
          ProductsPhoto::insert(['product_id' => $product->id, 'url' => '/product/'. $name.'.'.$ext]);

          }

          }
         * 
         */


        if ($request->has('photos') && count($request->get('photos'))) {
            $photos = $request->get('photos');

            foreach ($photos as $photo) {

                if ($photo['url'] != '') {
                    $photo['product_id'] = $product->id;
                    ProductsPhoto::insert($photo);
                }
            }
        }


        if ($request->has('specifications') && count($request->get('specifications'))) {
            $specs = $request->get('specifications');

            foreach ($specs as $spec) {

                if ($spec['name'] != '') {
                    $spec['product_id'] = $product->id;
                    ProductsSpecification::insert($spec);
                }
            }
        }



        flash('Продукт успешно добавлен');

        return redirect('/admin/products');
    }

    public function getEdit($id) {

        $product = Product::find($id);

        $categories = CatalogCategory::get();



        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function postEdit($id, Request $request) {


        $tags = $request->get('tags');
        if (is_array($tags)) {
            $selected_category = CatalogCategory::find($request->get('category_id'));

            $selected_tags = [];
            foreach ($tags as $tag) {
                if (ctype_digit($tag)) {
                    $selected_tags[] = $tag;
                } else {
                    $selected_tags[] = Tags::insertGetId(['name' => $tag, 'type' => 'product', 'lang' => $selected_category->lang]);
                }
            }

            Product::find($id)->tags()->sync($selected_tags);
        }

        ProductsSpecification::where('product_id', $id)->delete();

        if ($request->has('specifications') && count($request->get('specifications'))) {
            $specs = $request->get('specifications');

            foreach ($specs as $spec) {

                if ($spec['name'] != '') {
                    $spec['product_id'] = $id;
                    ProductsSpecification::insert($spec);
                }
            }
        }

        ProductsPhoto::where('product_id', $id)->delete();

        if ($request->has('photos') && count($request->get('photos'))) {
            $photos = $request->get('photos');

            foreach ($photos as $photo) {
                if ($photo['url'] != '') {
                    $photo['product_id'] = $id;
                    ProductsPhoto::insert($photo);
                }
            }
        }

        Product::where('id', $id)->update($request->except('_token', 'specifications', 'photos', 'tags'));

        flash('Продукт успешно изменен');
        return redirect('/admin/products');
    }

    public function getDelete($id) {
         Product::where('id', $id)->delete();
          return redirect('/admin/products');
    }
}
