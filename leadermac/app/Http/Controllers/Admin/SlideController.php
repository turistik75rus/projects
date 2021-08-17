<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slide;

class SlideController extends Controller {

    public function getIndex() {

        $slides = Slide::paginate(20);

        return view('admin.slide.index', compact('slides'));
    }

    public function getCreate() {



        return view('admin.slide.create');
    }

    public function postCreate(Request $request) {


        Slide::insert($request->except('_token'));

        flash('Слайд успешно добавлен');

        return redirect('/admin/slides');
    }

    public function getEdit($id) {

        $slide = Slide::find($id);

  

        return view('admin.slide.edit', compact('slide'));
    }

    public function postEdit($id, Request $request) {


  
        Slide::where('id', $id)->update($request->except('_token'));

        flash('Слайд успешно изменен');
        return redirect('/admin/slides');
    }
    
    public function getDelete($id) {
         Slide::where('id', $id)->delete();
             return redirect('/admin/slides');
    }
    
    
    public function postOrder(Request $request) {
        //  dd($request->all());
        $order = $request->get('order');
        $order = json_decode($order, true);
       // dd($order);
        $i = 1;
        foreach ($order as $data) {

            Slide::where('id', $data['id'])->update([
                'order_id' => $i
            ]);
            $i++;
        }
    }

    public function getOrder() {
        $slides = Slide::orderBy('order_id')->where('show', 'true')->get();


        return view('admin.slide.order', compact('slides'));
    }

}
