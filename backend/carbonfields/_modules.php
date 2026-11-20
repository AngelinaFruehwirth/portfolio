
<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


// -> Konfiguration der verschiedenen Module

function create_modules_field(bool $is_project = false) {

    $modules = Field::make('complex', 'modules', 'Inhaltsmodule')
        ->set_help_text('Inhalte hinzufügen und in die gewünschte Reihenfolge bringen.');


    // -> Seitenspezifische Module

    if (!$is_project) {

        $modules

            // -> example
            ->add_fields('example', 'Beispiel', [
                Field::make('text', 'title', 'Titel')
                    ->set_required(),

                Field::make('image', 'image', 'Bild')
                    ->set_required(),
            ])

            // hero_front
            ->add_fields('hero_front', 'Hero Startseite', [
                Field::make('text', 'title', 'Titel')
                    ->set_required(),

                Field::make('textarea', 'subline', 'Subline')
                    ->set_rows(3),

                Field::make('image', 'image', 'Bild')
                    ->set_required(),
            ])

            // → overview_projects
            ->add_fields('overview_projects', 'Übersicht Projekte', [
                Field::make('text', 'title', 'Titel')
                    ->set_required(),

                Field::make('association', 'selection', 'Auswahl Projekte')
                    ->set_types([
                        [
                            'type' => 'post',
                            'post_type' => 'project',
                        ]
                    ]),
            ]);
    }


    // -> Universelle Module

    $modules

        // todo: add new modules here

        // -> text_block
        ->add_fields('text_block', 'Textabschnitt', [
            Field::make('text', 'title', 'Überschrift')
                ->set_help_text('Optional. Wird nur angezeigt, wenn das Feld ausgefüllt ist.'),

            Field::make('rich_text', 'text', 'Text')
                ->set_required(),
        ])

        // -> image_gallery
        ->add_fields('image_gallery', 'Bildergalerie', [
            Field::make('media_gallery', 'images', 'Bilder')
                ->set_type(['image'])
                ->set_required()
                ->set_help_text('Bilder auswählen und in die gewünschte Reihenfolge bringen.'),
        ])

        // -> video_embed
        ->add_fields('video_embed', 'YouTube-Video', [
            Field::make('text', 'video_url', 'YouTube-Link')
                ->set_required()
                ->set_help_text('Vollständigen YouTube-Link einfügen.'),
        ])

        // -> single_image
        ->add_fields('single_image', 'Einzelbild', [
            Field::make('image', 'image', 'Bild')
                ->set_required(),

            Field::make('text', 'caption', 'Bildunterschrift')
                ->set_help_text('Optional. Beschreibung oder Bildnachweis.'),
        ])

        // -> SETTINGS
        ->set_layout('tabbed-vertical');


    return $modules;
}


// -> Module für normale Seiten

Container::make('post_meta', 'Flexible Inhaltsmodule')
    ->where('post_type', '=', 'page')
    ->add_fields([
        create_modules_field(false),
    ]);


// -> Module für Projekte

Container::make('post_meta', '02 – Flexible Projektinhalte')
    ->where('post_type', '=', 'project')
    ->set_priority('low')
    ->add_fields([
        create_modules_field(true),
    ]);


// -> Funktion, um die Module und die entsprechenden Templates auf der Seite zu laden

function render_modules(): void {

    $modules = carbon_get_the_post_meta('modules');

    if (empty($modules)) {
        return;
    }

    foreach ($modules as $module) {

        // -> Modifiziere die Daten des Moduls, falls nötig, basierend auf dem Modultyp

        switch ($module['_type']) {

            case 'example':
            case 'hero_front':
            case 'single_image':
                $module['image'] = get_media_by_id(
                    $module['image'],
                    'full'
                );
                break;

            case 'overview_projects':
                $module['selection'] = array_map(function($item) {
                    return (int) $item['id'];
                }, $module['selection'] ?? []);
                break;

            case 'image_gallery':
                $module['images'] = array_map(function($image_id) {
                    return get_media_by_id((int) $image_id, 'full');
                }, $module['images'] ?? []);
                break;

            case 'video_embed':
                $module['video'] = wp_oembed_get(
                    $module['video_url']
                );
                break;

            // todo: add data modifications for modules here as a new case

        }


        // -> Laden des Templates basierend auf dem Modultyp und weitergeben der Daten

        get_template_part(
            'frontend/views/modules/' . $module['_type'],
            null,
            [
                'data' => $module
            ]
        );

    }
}
