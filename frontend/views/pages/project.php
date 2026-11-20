<?php
$project = get_project_by_id(get_the_ID());
?>

<main data-page="project">

    <!-- Hero -->

    <section class="hero">

        <img class="hero-image"
            src="<?= esc_url($project['hero_image']['src']) ?>"
            alt="<?= esc_attr($project['hero_image']['alt']) ?>">

        <h1 class="hero-title">
            <?= esc_html($project['hero_title']) ?>
        </h1>

    </section>


    <!-- Einleitung -->

    <section class="intro">

        <p class="lead">
            <?= esc_html($project['lead']) ?>
        </p>

    </section>


    <!-- Projektinformationen -->

    <section class="project-details">

        <img class="image"
            src="<?= esc_url($project['image']['src']) ?>"
            alt="<?= esc_attr($project['image']['alt']) ?>">

        <div class="project-info">

            <!-- Kategorien -->

            <p class="category">

                <?php foreach ($project['project_categories'] as $category) : ?>

                    <span class="category-item">
                        <?= esc_html($category) ?>
                    </span>

                <?php endforeach; ?>

            </p>


            <!-- Projekttitel -->

            <h2 class="title">
                <?= esc_html($project['title']) ?>
            </h2>


            <!-- Projektbeschreibung -->

            <div class="description">
                <?= wpautop(esc_html($project['description'])) ?>
            </div>


            <!-- Credits -->

            <?php if (!empty($project['credits'])) : ?>

                <div class="credits">

                    <h3 class="credits-title">
                        Credits
                    </h3>

                    <p class="credits-text">
                        <?= nl2br(esc_html($project['credits'])) ?>
                    </p>

                </div>

            <?php endif; ?>

        </div>

    </section>


    <!-- Flexible Module -->

    <div class="project-modules">

        <?php render_modules(); ?>

    </div>

</main>
