
<?php
$row =  array_chunk($this->types,3);
foreach($row as $col): ?>
    <div class="row"  style="margin:5% 0">
        <?php foreach($col as $item): ?>
            <div class="myCard transition col-md-4">
                <img src="source/img/product/<?= $item->TenSP ?>/thumbnail/<?= $item->TenSP.'.png'?>" alt="Chưa có hình">
                <h4>$ <?= $item->GiaSP ?></h4>
                <h2 class="transition"><?= $item->TenSP ?></h2>
                <p><?= substr($item->MoTa,  0, 90) ?>..</p>
                <div class="cta-container transition"><a href="<?= route('page','type',$item->MaSP) ?>" class="cta">Detail</a></div>
            </div>
        <?php endforeach ?>
    </div>
<?php endforeach ?>
