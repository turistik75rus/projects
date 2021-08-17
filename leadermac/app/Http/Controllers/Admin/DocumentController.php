<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller {

    public function getIndex() {

        $documents = Document::get();

        return view('admin.document.index', compact('documents'));
    }

    public function getCreate() {



        return view('admin.document.create');
    }

    public function postCreate(Request $request) {

        $document = $request->get('document');

if ($request->hasFile('file')) {
        $file = $request->file('file');

        $document['url'] = $this->upload($file, $document);
}
        Document::insert($document);

        flash('Документ успешно добавлен');

        return redirect('/admin/documents');
    }

    public function getEdit($id) {

        $document = Document::find($id);



        return view('admin.document.edit', compact('document'));
    }

    public function postEdit($id, Request $request) {

        $document = $request->get('document');
        
        
        if ($request->hasFile('file')) {
          
            $file = $request->file('file');

            $document['url'] = $this->upload($file, $document);
        }
        

        Document::where('id', $id)->update($document);

        flash('Документ успешно изменен');
        return redirect('/admin/documents');
    }

    public function upload($file, $document) {


        $attachment['ext'] = $file->getClientOriginalExtension();


        $random_name = str_slug($document['name']);


        $name = $random_name . '.' . $attachment['ext'];
        $dir = 'files/';

        $file->move($dir, $name);

        return '/' . $dir . $name;
    }

}
