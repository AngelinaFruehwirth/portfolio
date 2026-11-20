
<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


/* Project Information */

Container::make('post_meta', '01 – Projektgrundlagen')
    ->where('post_type', '=', 'project')
    ->set_priority('high')

    // Hero
    ->add_tab('Hero', [

        Field::make('text', 'hero_title', 'Hero-Titel')
            ->set_help_text('Grosse Überschrift auf dem Hero-Bild. Falls leer, wird der Projekttitel verwendet.'),

        Field::make('image', 'hero_image', 'Hero-Bild')
            ->set_help_text('Grossformatiges Querformat. Falls leer, wird das Projektbild verwendet.'),

    ])

    // Project Information
    ->add_tab('Projektinformationen', [

        Field::make('textarea', 'lead', 'Einleitungstext (Lead)')
            ->set_required()
            ->set_rows(3)
            ->set_help_text('Kurze Einführung in das Projekt.'),

        Field::make('image', 'image', 'Projektbild')
            ->set_required()
            ->set_width(35)
            ->set_help_text('Bild für die Projektseite und die Projektübersicht.'),

        Field::make('textarea', 'description', 'Projektbeschreibung')
            ->set_required()
            ->set_width(65)
            ->set_rows(5)
            ->set_help_text('Beschreibung des Projekts. Wird auch für den Teaser verwendet.'),

        Field::make('textarea', 'credits', 'Credits')
            ->set_rows(3)
            ->set_help_text('Beteiligte Personen, Verantwortlichkeiten oder Zusammenarbeit.'),

    ]);
