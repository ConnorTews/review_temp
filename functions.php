<?php

function manifestJson()
{
  if (!file_exists("./manifest.json")) {
    if (!file_exists("./favicon.ico")) {
      echo 'no favicon';
      exit();
    } else {
      $favicon = "./favicon.ico";
    }
    $config = require './config.php';
    $manifest = fopen("./manifest.json", "w") or die("Unable to create file!");
    $manifestData = '
    {
      "name": "' . $config['webpage_name'] . '",
      "short_name": "' . $config['webpage_name'] . '",
      "start_url": "/index.php",
      "icons": [
        {
          "src": "/android-chrome-192x192.png",
          "sizes": "192x192",
          "type": "image/png"
        },
        {
          "src": "/android-chrome-512x512.png",
          "sizes": "512x512",
          "type": "image/png"
        }
      ],
      "theme_color": "#161a25",
      "background_color": "#ffffff",
      "display": "fullscreen",
      "orientation": "landscape"
    }
    ';
    fwrite($manifest, $manifestData);
    fclose($manifest);
  }
}
