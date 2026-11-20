
<?php
$data = $args['data'];
?>

<?php if (!empty($data['video'])) : ?>

    <section data-module="video-embed">

        <!-- Video Player -->

        <div class="video-container">

            <?= $data['video'] ?>

        </div>

    </section>

<?php endif; ?>
