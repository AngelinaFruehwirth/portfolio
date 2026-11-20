
<?php
$data = $args['data'];
?>

<section data-module="hero-front">

    <!-- Hero Background -->

    <?php if (!empty($data['image']['src'])) : ?>

        <img
            class="hero-image"
            src="<?= esc_url($data['image']['src']) ?>"
            alt="<?= esc_attr($data['image']['alt'] ?? '') ?>"
        >

    <?php endif; ?>


    <!-- Hero Content -->

    <div class="hero-content">

        <h1 class="hero-title">
            <?= esc_html($data['title']) ?>
        </h1>

        <?php if (!empty($data['subline'])) : ?>

            <p class="hero-subline">
                <?= esc_html($data['subline']) ?>
            </p>

        <?php endif; ?>

    </div>

</section>
