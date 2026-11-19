<?php
$data = $args['data'];
js_log($data);
?>

<section data-module="overview_projects">
    <h2><?= $data['title'] ?></h2>
    <div class="projects">
        <?php foreach ($data['selection'] as $project_id) : ?>
            <?php
                $project = get_project_by_id($project_id);
                js_log($project);
            ?>
            <a href="<?= $project['link'] ?>" target="_self">
                <img src="<?= $project['image']['src'] ?>" alt="<?= $project['image']['alt'] ?>">
                <h3><?= $project['title'] ?></h3>
                <p><?= $project['description'] ?></p>
            </a>
        <?php endforeach; ?>
    </div>
    <mark>hier kommen meine projekte</mark>
</section>