<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller {

    public function getIndex() {

        $customers = Customer::get();

        return view('admin.customer.index', compact('customers'));
    }

    public function getCreate() {



        return view('admin.customer.create');
    }

    public function postCreate(Request $request) {


        Customer::insert($request->get('customer'));


        return redirect('/admin/customers');
    }

    public function getEdit($id) {

        $customer = Customer::find($id);



        return view('admin.customer.edit', compact('customer'));
    }

    public function postEdit($id, Request $request) {


        Customer::where('id', $id)->update($request->get('customer'));


        return redirect('/admin/customers');
    }
    
        public function getDelete($id, Request $request) {


        Customer::where('id', $id)->delete();


        return redirect('/admin/customers');
    }

   

}
