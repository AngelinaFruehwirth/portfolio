<?php
$data = $args['data'];
?>

<?php if (!empty($data['images'])) : ?>

    <section data-module="image-gallery">

        <!-- Gallery Images -->
        <div class="gallery-track">

            <?php foreach ($data['images'] as $image) : ?>

                <div class="gallery-slide">

                    <img
                        src="<?= esc_url($image['src']) ?>"
                        alt="<?= esc_attr($image['alt']) ?>"
                        loading="lazy"
                    >

                </div>

            <?php endforeach; ?>

        </div>

        <!-- Gallery Pagination -->
        <?php if (count($data['images']) > 1) : ?>

            <div class="gallery-pagination">

                <?php foreach ($data['images'] as $index => $image) : ?>

                    <button
                        type="button"
                        class="gallery-dot <?= $index === 0 ? 'active' : '' ?>"
                        data-slide="<?= $index ?>"
                        aria-label="Bild <?= $index + 1 ?> anzeigen"
                        aria-current="<?= $index === 0 ? 'true' : 'false' ?>"
                    ></button>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </section>

<?php endif; ?>
