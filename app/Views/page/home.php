<div style="margin:10% 0"></div>
<div class="jumbotron">
    <h1>Sản Phẩm Mới</h1>
</div>
<div class="row" style="margin:5% 0">
    <?php foreach(Product::news(10) as $item): ?>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 project wow animated fadeInLeft" style="background-image:url(source/img/product/<?= str_replace(' ','',$item->TenSP) ?>/cover/<?= $item->HinhSP ?>)">
        <div class="project-hover">
            <h2><?= $item->TenSP ?></h2>
            <h4><span><?= $item->GiaSP ?><i class="fa fa-diamond" aria-hidden="true"></i></span></h4>
            <hr />
            <p<?= substr($item->MoTa,  0, 90) ?>..></p>
            <a href="<?=route('page','detail',$item->MaSP) ?>">Chi tiết</a>
            <a href="javascript:" onclick="addCart(<?= $item->MaSP ?>)"><span class="fa fa-cart-arrow-down"></span></a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="clearfix"></div>
<div class="jumbotron">
    <h1>Sản Phẩm Bán Chạy</h1>
</div>
<div class="row" style="margin:5% 0">
    <?php foreach(Product::mostBuy() as $item): ?>
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
    <?php endforeach; ?>
    <div class="clearfix"></div>
</div>

