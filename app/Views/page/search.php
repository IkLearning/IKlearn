<div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12"  style="margin:5% 0">
    <h1 class="gallery-title">Tìm Kiếm</h1>
</div>
<ul class="list-inline">
    <li class="list-inline-item breadcrumb-item">|</li>
    <div class="list-inline-item checkbox-animated">
        <input id="IP450" type="checkbox" class="searchFilter">
        <label for="IP450">
            <span class="check"></span>
            <span class="box"></span>
            450
            <i class="fa fa-diamond"></i>
        </label>
    </div>
    <div class="list-inline-item checkbox-animated">
        <input id="IP1350" type="checkbox" class="searchFilter">
        <label for="IP1350">
            <span class="check"></span>
            <span class="box"></span>
            1350
            <i class="fa fa-diamond"></i>
        </label>
    </div>
    <div class="list-inline-item checkbox-animated">
        <input id="IP3150" type="checkbox" class="searchFilter">
        <label for="IP3150">
            <span class="check"></span>
            <span class="box"></span>
            3150
            <i class="fa fa-diamond"></i>
        </label>
    </div>
    <div class="list-inline-item checkbox-animated">
        <input id="IP6300" type="checkbox" class="searchFilter">
        <label for="IP6300">
            <span class="check"></span>
            <span class="box"></span>
            6300
            <i class="fa fa-diamond"></i>
        </label>
    </div>
    <li class="list-inline-item breadcrumb-item">|</li>
    <div class="list-inline-item checkbox-animated">
        <input id="fighter" type="checkbox" class="searchFilter">
        <label for="fighter">
            <span class="check"></span>
            <span class="box"></span>
            Đấu sĩ
        </label>
    </div>
    <div class="list-inline-item checkbox-animated">
        <input id="ap" type="checkbox" class="searchFilter">
        <label for="ap">
            <span class="check"></span>
            <span class="box"></span>
            Pháp sư
        </label>
    </div>
    <div class="list-inline-item checkbox-animated">
        <input id="adc" type="checkbox" class="searchFilter">
        <label for="adc">
            <span class="check"></span>
            <span class="box"></span>
            Xạ thủ
        </label>
    </div>
    <div class="list-inline-item checkbox-animated">
        <input id="sp" type="checkbox" class="searchFilter">
        <label for="sp">
            <span class="check"></span>
            <span class="box"></span>
            Hỗ trợ
        </label>
    </div>
    <div class="list-inline-item checkbox-animated">
        <input id="tanker" type="checkbox" class="searchFilter">
        <label for="tanker">
            <span class="check"></span>
            <span class="box"></span>
            Đỡ đòn
        </label>
    </div>
    <div class="list-inline-item checkbox-animated">
        <input id="assassin" type="checkbox" class="searchFilter">
        <label for="assassin">
            <span class="check"></span>
            <span class="box"></span>
            Sát thủ
        </label>
    </div>
    <li class="list-inline-item breadcrumb-item">|</li>
</ul>
<div id="resultSearch"><h3 class="alert alert-success"><?= count($this->items) ?> Kết quả</h3></div>
<div class="row" style="margin:5% 0" id="searchBody">
<?php foreach($this->items as $item): ?>
<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 project wow animated fadeInLeft"  style="background-image:url(../app/public/source/img/product/<?= str_replace(' ','',$item->TenSP) ?>/cover/<?= $item->HinhSP ?>)">
    <div class="project-hover" id="sp<?=$item->MaSP ?>">
        <h2><?= $item->TenSP ?></h2>
        <h4><span><?= $item->GiaSP ?><i class="fa fa-diamond" aria-hidden="true"></i></span></h4>
        <hr />
        <p><?= substr($item->MoTa,  0, 90) ?>..</p>
        <a href="Page/Detail/<?= $item->MaSP ?>">Chi tiết</a>
        <a href="javascript:;" onclick="addCart(<?= $item->MaSP ?>)"><span class="fa fa-cart-arrow-down"></span></a>
    </div>
</div>
<?php endforeach; ?>
<div class="clearfix"></div>
</div>
<div class="ajax-load text-center" style="display:none">
    <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading</p>
</div>
