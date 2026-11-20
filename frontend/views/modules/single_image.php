
<?php
$data = $args['data'];
?>

<?php if (!empty($data['image']['src'])) : ?>

    <section data-module="single-image">

        <figure>

            <!-- Image -->

            <img
                class="image"
                src="<?= esc_url($data['image']['src']) ?>"
                alt="<?= esc_attr($data['image']['alt']) ?>"
                loading="lazy"
            >


            <!-- Optional Caption -->

            <?php if (!empty($data['caption'])) : ?>

                <figcaption class="caption">

                    <?= esc_html($data['caption']) ?>

                </figcaption>

            <?php endif; ?>

        </figure>

    </section>

<?php endif; ?>
