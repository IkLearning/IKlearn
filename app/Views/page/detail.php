<div class="col-lg-9">
    <div class="card mt-4">
    <img class="card-img-top img-fluid" src="source/img/product/<?= $this->item->TenSP?>/cover/<?= $this->item->HinhSP?>" alt="Hình Đại Diện">
    <div class="card-body">
        <img src="source/img/product/<?= $this->item->TenSP?>/thumbnail/<?= $this->item->TenSP.'.png'?>" alt="Chưa có hình">
        <h3 class="card-title"><?= $this->item->TenSP?></h3>
        <h4>$<?= $this->item->GiaSP ?></h4>
        <button onclick="addCart(<?= $this->item->MaSP ?>)" class="btn btn-success"><span><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Thêm</span></button>
    </div>
    </div>
    <div class="card card-outline-secondary my-4">
    <div class="card-header">
        Truyền Thuyết
    </div>
    <div class="card-body">
        <p><?= $this->item->MoTa ?></p>
    </div>
    </div>
    <!-- End Load content-->
</div>