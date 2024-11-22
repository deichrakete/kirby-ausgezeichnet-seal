<?php

use Kirby\Cms\App as Kirby;

Kirby::plugin('auorg/ausgezeichnet-seal', [
  'hooks' => [
    'page.render:after' => function ($html) {
      if (option('auorg.ausgezeichnet-seal.use-snippet')) {
        return $html;
      } else {
        $sealHtml = snippet('ausgezeichnet-seal', ['renderHook' => true], true);

        return str_replace('</body>', $sealHtml . '</body>', $html);
      }
    }
  ],
  'options' => [
    'use-snippet' => false,
    'type' => 'rounded',
    'position' => 'right',
    'margin-bottom' => 0,
    'margin-horizontal' => 0,
    'background-color' => '#ffffff',
    'panel-background-color' => '#4e4d4d',
    'panel-text-color' => '#ffffff'
  ],
  'snippets' => [
    'ausgezeichnet-seal' => __DIR__ . '/snippets/seal.php'
  ]
]);
