<div class="Atozsites-stars-active" style="width: <?= $width ?>px;">
    <?php for ($i = 1; $i <= $best; $i++) : ?>
        <div class="Atozsites-star">
            <?= \Atozsites\StarRating\view('active-star') ?>
        </div>
    <?php endfor; ?>
</div>
