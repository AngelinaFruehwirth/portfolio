<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Vorlage')
    ->where('post_type', '=', 'preset')
    ->add_fields([
        // Felder hier einfügen
    ]);