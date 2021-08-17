<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;

class CustomerController extends Controller {

    public function getIndex(Request $request) {

                if (\Request::url() != 'http://www.zavodkorund.ru/contact') {
            $first = rand(0, 10);

            $second = rand(0, 10);

            if ($first == $second) {
                $first = rand(1, 5);
                $second = rand(6, 10);
            }

            $numbers = ['ноль',
                'один',
                'два',
                'три',
                'четыре',
                'пять',
                'шесть',
                'семь',
                'восемь',
                'девять',
                'десять'
            ];

            $first_l = $numbers[$first];
            $second_l = $numbers[$second];

            $t = time();

            session()->forget('captcha_result');
            
                         session()->flash('captcha_result', ($first + $second));

                $action = "плюс";
/*
            if ($t & 1) {
                session()->flash('captcha_result', ($first + $second));

                $action = "плюс";
            } else {
                session()->flash('captcha_result', ($first - $second));

                $action = "минус";
            }
*/


            view()->share('captcha_text', 'Сколько будет: ' . $first_l . ' ' . $action . ' ' . $second_l);
        }
        
        
        $products = Product::with('category')->OrderBy('order_id')->get();
        $customers = Customer::get();

        $customers = $customers->groupBy(function($item, $key) {
                    $st = $item->name;
                    $st = mb_substr($st, 0, 1);
                    return $st;
                })
                ->sortBy(function($item, $key) {
            return $key;
        });

      

        return view('frontend.customer.index', compact('customers', 'products'));
    }
    
    public function getShow(Request $request, $slug) {
        
        
                if (\Request::url() != 'http://www.zavodkorund.ru/contact') {
            $first = rand(0, 10);

            $second = rand(0, 10);

            if ($first == $second) {
                $first = rand(1, 5);
                $second = rand(6, 10);
            }

            $numbers = ['ноль',
                'один',
                'два',
                'три',
                'четыре',
                'пять',
                'шесть',
                'семь',
                'восемь',
                'девять',
                'десять'
            ];

            $first_l = $numbers[$first];
            $second_l = $numbers[$second];

            $t = time();

            session()->forget('captcha_result');

                         session()->flash('captcha_result', ($first + $second));

                $action = "плюс";
            /*
            if ($t & 1) {
                session()->flash('captcha_result', ($first + $second));

                $action = "плюс";
            } else {
                session()->flash('captcha_result', ($first - $second));

                $action = "минус";
            }*/



            view()->share('captcha_text', 'Сколько будет: ' . $first_l . ' ' . $action . ' ' . $second_l);
        }
        
           $products = Product::with('category')->OrderBy('order_id')->get();
           
           
        $customer = Customer::where('slug',$slug)->first();



      

        return view('frontend.customer.show', compact('customer', 'products'));
        
    }

}
