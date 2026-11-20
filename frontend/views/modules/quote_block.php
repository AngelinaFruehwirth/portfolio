
<?php
$data = $args['data'];
?>

<section data-module="quote-block">

    <!-- Quote -->
    <blockquote class="quote">
        <?= nl2br(esc_html($data['quote'])) ?>
    </blockquote>

</section>
