<?php
$data = $args['data'];
?>

<section data-module="text-block">

    <!-- Optional Title -->

    <?php if (!empty($data['title'])) : ?>

        <h2 class="title">
            <?= esc_html($data['title']) ?>
        </h2>

    <?php endif; ?>


    <!-- Text Content -->

    <div data-utility="wysiwyg" class="text">

        <?= wp_kses_post(wpautop($data['text'])) ?>

    </div>

</section>
