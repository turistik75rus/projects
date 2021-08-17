<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Block;


class BlockController extends Controller {

    public function getIndex(Request $request) {


        $blocks = Block::orderBy('id', 'desc')->paginate(20);
        return view('admin.block.index', compact('blocks'));
    }

    public function getCreate() {

 
        return view('admin.block.create');
    }

    public function postCreate(Request $request) {

    
        Block::create($request->get('block'));

        return redirect('/admin/blocks');
    }

    public function getEdit($id) {

        $block = Block::find($id);


        return view('admin.block.edit', compact('block'));
    }

    public function postEdit($id, Request $request) {

        Block::find($id)->update($request->get('block'));

        return redirect('/admin/blocks');
    }

    
        public function getDelete($id) {

        Block::find($id)->delete();

        return redirect('/admin/blocks');
    }
}
