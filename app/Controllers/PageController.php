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
        if(Session::has('cart')){
            print_r(json_encode(Session::get('cart')));
            return;
        }
    }

    public function reduceCartByOne(){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($_POST['id']);
        if(count($cart->items) > 0)
            Session::put('cart',$cart);
        else
            Session::forget('cart');
        if(Session::has('cart')){
            print_r(json_encode(Session::get('cart')));
            return;
        }
    }

    public function search(){
        $this->items = [];
        if(isset($_GET['key']))
            $this->items = Product::findByName($_GET['key']);
        else
            $this->items = Product::all(8);
        return $this->view('page.search','master','items');
    }

    public function searchFilter(){
        $filter = $_POST['filter']??null;
        if(!$filter)
        {
            $data = Product::all(8);
            print_r(json_encode($data));
        }
        else{
            $prices = $filter['prices']??null;
            $types = $filter['types']??null;
            if($data = Product::search($prices,$types))
                print_r(json_encode($data));
        }
    }

    public function profile(){
        return $this->view('page.profile','master');
    }

    public function loadMore(){
        if(isset($_POST['id']))
            if($data = Product::more($_POST['id']))
                print_r(json_encode($data));
    }
}