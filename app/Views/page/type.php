<div class="row"  style="margin:10% 0">
    <?php foreach($this->types as $item): ?>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 project wow animated fadeInLeft"  style="background-image:url(source/img/product/<?= str_replace(' ','',$item->TenSP) ?>/cover/<?= $item->HinhSP ?>)">
            <div class="project-hover">
                <h2><?= $item->TenSP ?></h2>
                <h4><span><?= $item->GiaSP ?><i class="fa fa-diamond" aria-hidden="true"></i></span></h4>
                <hr />
                <p><?= substr($item->MoTa,  0, 90) ?>..</p>
                <a href="<?=route('page','detail',$item->MaSP) ?>">Chi tiết</a>
                <a href="javascript:" onclick="addCart(<?= $item->MaSP ?>)"><span class="fa fa-cart-arrow-down"></span></a>
            </div>
        </div>
    <?php endforeach ?>
</div>
