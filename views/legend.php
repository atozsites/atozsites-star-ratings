<div class="Atozsites-legend">
    <?php if ($count) : ?>
        <strong class="Atozsites-score"><?= $score ?></strong>
        <span class="Atozsites-muted">/</span>
        <strong><?= $best ?></strong>
        <span class="Atozsites-muted">(</span>
        <strong class="Atozsites-count"><?= $count ?></strong>
        <span class="Atozsites-muted">
            <?= _n('vote', 'votes', $count, 'Atozsites-star-ratings') ?>
        </span>
        <span class="Atozsites-muted">)</span>
    <?php else : ?>
        <span class="Atozsites-muted"><?= $greet ?></span>
    <?php endif; ?>
</div>
