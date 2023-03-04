<?php
include('views/includes/header.php');
include('views/includes/slider.php');
?>
    <main class="container-fluid mt-3">
        <h3 class="text-center text-uppercase mb-3 text-primary">TOP bài hát yêu thích</h3>
        <div class="row">
            <?php foreach ($articles as $article) { ?>
            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <img src="<?= $article['hinhanh'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="?action=show&?id=<?=$article['ma_bviet']?>" class="text-decoration-none"><?= $article['ten_bhat'] ?></a>
                        </h5>
                    </div>
                </div>
            </div>
        <?php } ?>
    </main>
    <?php
require_once('views/includes/footer.php');
?>