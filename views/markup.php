<div style="display: none;"
    class="Atozsites-star-ratings <?= $valign ? ("Atozsites-valign-{$valign}") : '' ?> <?= $align ? ("Atozsites-align-{$align}") : '' ?> <?= $disabled ? 'Atozsites-disabled' : '' ?>"
    data-id="<?= $id ?>"
    data-slug="<?= $slug ?>">
    <?= \Atozsites\StarRating\view('stars') ?>
    <?= \Atozsites\StarRating\view('legend') ?>
</div>
