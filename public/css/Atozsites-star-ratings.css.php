<?php if ($gap !== false) : ?>
    .Atozsites-star-ratings .Atozsites-stars .Atozsites-star {
        margin-right: <?= $gap ?>px;
    }
    [dir="rtl"] .Atozsites-star-ratings .Atozsites-stars .Atozsites-star {
        margin-left: <?= $gap ?>px;
        margin-right: 0;
    }
<?php endif; ?>

<?php if ($stars['inactive']) : ?>
    .Atozsites-star-ratings .Atozsites-stars .Atozsites-star .Atozsites-icon,
    .Atozsites-star-ratings:not(.Atozsites-disabled) .Atozsites-stars .Atozsites-star:hover ~ .Atozsites-star .Atozsites-icon {
        background-image: url("<?= $stars['inactive'] ?>");
    }
<?php endif; ?>

<?php if ($stars['active']) : ?>
    .Atozsites-star-ratings .Atozsites-stars .Atozsites-stars-active .Atozsites-star .Atozsites-icon {
        background-image: url("<?= $stars['active'] ?>");
    }
<?php endif; ?>

<?php if ($stars['selected']) : ?>
    .Atozsites-star-ratings.Atozsites-disabled .Atozsites-stars .Atozsites-stars-active .Atozsites-star .Atozsites-icon,
    .Atozsites-star-ratings:not(.Atozsites-disabled) .Atozsites-stars:hover .Atozsites-star .Atozsites-icon {
        background-image: url("<?= $stars['selected'] ?>");
    }
<?php endif; ?>