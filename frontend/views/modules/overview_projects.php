
<?php
$data = $args['data'];

$project_ids = array_slice($data['selection'] ?? [], 0, 3);
?>

<section data-module="overview_projects">

    <!-- Section Title -->

    <?php if (!empty($data['title'])) : ?>

        <h2 class="section-title">
            <?= esc_html($data['title']) ?>
        </h2>

    <?php endif; ?>


    <!-- Project Grid -->

    <div class="projects">

        <?php foreach ($project_ids as $project_id) : ?>

            <?php
            $project = get_project_by_id((int) $project_id);

            $category = $project['project_categories'][0] ?? '';
            ?>

            <a
                class="project-card"
                href="<?= esc_url($project['link']) ?>"
            >

                <!-- Project Image -->

                <div class="project-image-wrapper">

                    <?php if (!empty($project['image']['src'])) : ?>

                        <img
                            class="project-image"
                            src="<?= esc_url($project['image']['src']) ?>"
                            alt="<?= esc_attr($project['image']['alt'] ?? '') ?>"
                            loading="lazy"
                        >

                    <?php endif; ?>


                    <!-- Category Badge -->

                    <?php if ($category) : ?>

                        <span class="project-category">
                            <?= esc_html($category) ?>
                        </span>

                    <?php endif; ?>

                </div>


                <!-- Project Title -->

                <h3 class="project-title">
                    <?= esc_html($project['title']) ?>
                </h3>


                <!-- Project Description -->

                <?php if (!empty($project['description'])) : ?>

                    <p class="project-description">
                        <?= esc_html($project['description']) ?>
                    </p>

                <?php endif; ?>

            </a>

        <?php endforeach; ?>

    </div>

</section>
