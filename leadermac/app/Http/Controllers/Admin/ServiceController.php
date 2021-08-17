<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller {

    public function getIndex() {

        $services = Service::get();

        return view('admin.service.index', compact('services'));
    }

    public function getCreate() {



        return view('admin.service.create');
    }

    public function postCreate(Request $request) {

        $service = $request->get('service');

if ($request->hasFile('file')) {
        $file = $request->file('file');

        $service['url'] = $this->upload($file, $service);
}
        Service::insert($service);

        flash('Услуга успешно добавлена');

        return redirect('/admin/services');
    }

    public function getEdit($id) {

        $service = Service::find($id);



        return view('admin.service.edit', compact('service'));
    }

    public function postEdit($id, Request $request) {

        $service = $request->get('service');
        
        
        if ($request->hasFile('file')) {
          
            $file = $request->file('file');

            $service['url'] = $this->upload($file, $service);
        }
        

        Service::where('id', $id)->update($service);

        flash('Услуга успешно изменена');
        return redirect('/admin/services');
    }

    public function upload($file, $service) {


        $attachment['ext'] = $file->getClientOriginalExtension();


        $random_name = str_slug($service['name']);


        $name = $random_name . '.' . $attachment['ext'];
        $dir = 'files/';

        $file->move($dir, $name);

        return '/' . $dir . $name;
    }

}
