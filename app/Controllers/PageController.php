<?php
require_once('libs/autoload.php');

class PageController extends Controller{
    public function index(){
        return $this->view('page.home','master');
    }

    public function order(){
        return $this->view('page.order','master');
    }

    public function detail($id){
        $this->item = Product::find($id);
        return $this->view('page.detail','master','item');
    }

    public function type($id){
        $this->types = Product::getByType($id);
        return $this->view('page.type','master','types');
    }

    public function addCart(){
        $prdct = Product::find($_POST['id']);
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($prdct,$_POST['id']);
        Session::put('cart',$cart);
        print_r(json_encode(Session::get('cart')));
    }

    public function reduceCart(){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($_POST['id']);
        if(count($cart->items) > 0)
            Session::put('cart',$cart);
        else
            Session::forget('cart');
    }

    public function reduceCartByOne(){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($_POST['id']);
        if(count($cart->items) > 0)
            Session::put('cart',$cart);
        else
            Session::forget('cart');
    }

    public function search(){
        return $this->view('page.search','master');
    }

}