<?php
require_once('libs/autoload.php');

class AdminController extends Controller{
    public function __construct(){
        if(!Session::has('auth'))
            header("location: ../auth/login");
        if(Session::get('auth')->role != 1)
            header("location: ../page");
        parent::__construct();
    }

    public function index(){
        return $this->view('modules.table','admin.dashdoard');
    }

    public function products(){
        return $this->view('product.index','admin.dashdoard');
    }

    public function producttypes(){
        return $this->view('product_type.index','admin.dashdoard');
    }

    public function factories(){
        return $this->view('factory.index','admin.dashdoard');
    }

    public function users(){
        return $this->view('user.index','admin.dashdoard');
    }

    public function usertypes(){
        return $this->view('user_type.index','admin.dashdoard');
    }

    //Product Activity
    public function showProduct(){
      $item =  Product::find($_POST['id']);
      print_r(json_encode($item));
    }

    public function saveProduct(){
        $product = new Product;
        $product->FromJson($_POST['sp']);
        if($product->MaSP == null)
            $product->NgayNhap = date('Y-m-d H:i:s');
        if($product->save()){
            echo '0';
            return;
        }
        echo '1';
    }

    public function deleteProduct(){
        $product = Product::find($_POST['id']);
        if($product->delete())
            echo '0';
        else
            echo '1';
    }

    //User Activity
    public function showUser(){
        $item = User::find($_POST['id']);
        print_r(json_encode($item));
    }

    public function saveUser(){
        $user = new User;
        $user->FromJson($_POST['usr']);
        if($user->save()){
            echo '0';
            return;
        }
        echo '1';
    }

    public function profile(){
        return $this->view('user.profile','admin.dashdoard');
    }

    //Bill Activity
    public function bills(){
        return $this->view('bill.index','admin.dashdoard');
    }

    public function updateBillState(){
        $bill = Bill::find($_POST['id']);
        $bill->MaTinhTrang = $_POST['tinhtrang'];
        if($bill->save())
            print_r (json_encode(Bill::all()));
    }

    // Categories
    public function saveProductType(){
        $lsp = new ProductType;
        $lsp->FromJson($_POST['lsp']);
        if($lsp->save()){
            print_r(json_encode(ProductType::all()));
            return;
        }
        echo '1';
    }

    public function deleteProductType(){
        $producttype = ProductType::find($_POST['id']);
        if($producttype->delete())
        {
            print_r(json_encode(ProductType::all()));
            return;
        }
            echo '1';
    }

    //Factory
    public function saveFactory(){
        $hsx = new Factory;
        $hsx->FromJson($_POST['hsx']);
        if($hsx->save()){
            print_r(json_encode(Factory::all()));
            return;
        }
        echo '1';
    }

    public function deleteFactory(){
        $factory = Factory::find($_POST['id']);
        if($factory->delete())
        {
            print_r(json_encode(Factory::all()));
            return;
        }
            echo '1';
    }


    //User types
    public function saveUserType(){
        $usrtype = new UserType;
        $usrtype->FromJson($_POST['usrtype']);
        if($usrtype->save()){
            print_r(json_encode(UserType::all()));
            return;
        }
        echo '1';
    }

    public function deleteUserType(){
        $usrtype = UserType::find($_POST['id']);
        if($usrtype->delete())
        {
            print_r(json_encode(UserType::all()));
            return;
        }
            echo '1';
    }

}