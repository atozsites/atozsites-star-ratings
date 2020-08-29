<div class="Atozsites-stars-inactive">
    <?php for ($i = 1; $i <= $best; $i++) : ?>
        <div class="Atozsites-star" data-star="<?= $i ?>">
            <?= \Atozsites\StarRating\view('inactive-star') ?>
        </div>
    <?php endfor; ?>
</div>
