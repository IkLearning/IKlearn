<div style="margin: 5% 0">
    <div class="container row">
        <div class="col-md-8">
            <div class="card mt-4">
                <img class="card-img-top img-fluid" src="source/img/product/<?= str_replace(' ','',$this->item->TenSP)?>/cover/<?= $this->item->HinhSP?>" alt="Hình Đại Diện">
                <div class="card-body">
                    <img src="source/img/product/<?= str_replace(' ','',$this->item->TenSP)?>/thumbnail/<?= str_replace(' ','',$this->item->TenSP).'.png'?>" alt="Chưa có hình">
                    <h3 class="card-title"><?= $this->item->TenSP?></h3>
                    <h4>
                        <i class="fa fa-diamond" aria-hidden="true"></i>
                        <?= $this->item->GiaSP ?>
                    </h4>
                    <h5>Lượt xem: <?= $this->item->SoLuotXem ?></h5>
                    <h5>Lượt bán: <?= $this->item->SoLuongBan ?></h5>
                    <h5>Loại: <?= $this->type->TenLoaiSP ?></h5>
                    <h5>Nhà sản xuất: <?= $this->brand->TenHangSX ?></h5>
                    <button onclick="addCart(<?= $this->item->MaSP ?>)" class="btn btn-outline-info"><span><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Thêm</span></button>
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
        </div>
        <div class="col-md-4">
            <div style="margin:5% 0; float:right;">
                <h5 class="alert alert-info">Sản phẩm cùng loại</h5>
                <div class="menu">
                <?php foreach($this->sameItems as $item): ?>
                    <a class="dropdown-item" href="<?= route('page','detail',$item->MaSP) ?>">
                        <p>
                            <span><img width="100" src="source/img/product/<?= str_replace(' ','',$item->TenSP)?>/thumbnail/<?=str_replace(' ','',$item->TenSP).'.png' ?>" alt=""></span>
                            <span><?= $item->TenSP ?></span>
                            <span><i class="fa fa-diamond" aria-hidden="true"></i><?= $item->GiaSP ?></span>
                            <hr>
                        </p>
                    </a>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>