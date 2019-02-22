<?php

if (!defined('ABSPATH')) {
    exit;
}

function progress_bar_block_assets() {
    wp_enqueue_style(
        'progress_bar_block-cgb-style-css',
        plugins_url('dist/blocks.style.build.css', __DIR__),
        ['wp-editor'],
        filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' )
    );
}

add_action('enqueue_block_assets', 'progress_bar_block_assets');

function progress_bar_block_editor_assets() {
    wp_enqueue_script(
        'progress_bar_block-js',
        plugins_url('/dist/blocks.build.js', __DIR__),
        ['wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'],
      filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' )
    );

    wp_enqueue_style(
        'progress_bar_block-editor-css', // Handle.
        plugins_url('dist/blocks.editor.build.css', __DIR__),
        ['wp-edit-blocks'],
      filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' )
    );
}

add_action('enqueue_block_editor_assets', 'progress_bar_block_editor_assets');

register_block_type('klarity/klarity-progress-bar-block', [
    'render_callback' => 'render_progress_bar',
    'attributes' => [
        'progress' => [
            'type' => 'number',
            'default' => '0',
        ],
        'progressColor' => [
            'type' => 'string',
            'default' => '#49DB95',
        ],
        'backgroundColor' => [
            'type' => 'string',
            'default' => '#E2E2E2',
        ]
    ]
]);

function render_progress_bar( $attributes ) {
    $progress = $attributes['progress'] ?? 0;
    $progress_color = $attributes['progressColor'] ?? '#49DB95';
    $background_color = $attributes['backgroundColor'] ?? '#E2E2E2';
	return "
        <div class='row'>
            <div class='progress-number col s2 center-align'>
                <h5 class='col s2 center-align' style='margin-left: $progress%; color: $progress_color'>$progress%</h5>
            </div>
        </div>
        <div class='progress' style='background-color: $background_color'>
               <div class='determinate' style='width: $progress%; background-color: $progress_color'></div>
        </div>";
}
