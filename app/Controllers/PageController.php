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
        $this->item->SoLuotXem++;
        $this->item->save();
        $this->type = ProductType::find($this->item->MaLoaiSP);
        $this->brand = Factory::find($this->item->MaHangSX);
        $this->sameItems = Product::getByType($this->item->MaLoaiSP);
        return $this->view('page.detail','master','item','type','brand','sameItems');
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
        if(Session::has('auth'))
            return $this->view('page.profile','master');
        header('location:index');
    }

    public function loadMore(){
        if(isset($_POST['id']))
            if($data = Product::more($_POST['id']))
                print_r(json_encode($data));
    }

    public function newCaptcha(){
        Captcha::new();
    }

    public function validateCaptcha(){
        if(Session::get('captcha') == $_POST['captcha'])
            echo '0';
        else
            echo '1';
    }

    public function checkout(){
        $cart = Session::get('cart');
        $user = Session::get('auth');
        $bill = new Bill;
        $bill->NgayLap = date('Y-m-d H:i:s');
        $bill->TongTien = $cart->totalPrice;
        $bill->MaTK = $user->id;
        $bill->MaTinhTrang = 2;
        if(!$bill->save()):
            echo '1';
            return;
        endif;

        foreach ($cart->items as $key => $item):
            $bill_detail = new BillDetail;
            $bill_detail->SoLuong = $item['qty'];
            $bill_detail->GiaBan = $item['price']/$item['qty'];
            $bill_detail->MaHD = $bill->MaHD;
            $bill_detail->MaSP = $key;

            $product = Product::find($key);
            $product->SoLuongTon-= $item['qty'];
            $product->SoLuongBan+= $item['qty'];
            $product->save();
            if(!$bill_detail->save()):
                echo '1';
                return;
            endif;
        endforeach;
        Session::forget('cart');
        echo '0';
    }

    public function payhistory(){
        return $this->view('page.payhistory','master');
    }
}