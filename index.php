<?php
require("header.php");
date_default_timezone_set('America/Sao_Paulo');
?>

<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Painel
    </h2>

    <div id="assai" class="bg-gray-800 text-white shadow-lg rounded-lg p-6">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold">Assai</h2>
        <span class="text-gray-500">
          <?php
          
          $filename = 'scraping/assai/image_0.jpg';
          if (file_exists($filename)) {
            echo date("d/m/Y", filemtime($filename));
          }
          ?>
        </span>
      </div>
      <div id="assaiImgs" class="flex flex-wrap">
        <?php
        $folderPath = 'scraping/assai';

        // Get all image files in the folder
        $imageFiles = glob($folderPath . '/*.jpg');

        // Loop through the image files and display each image
        foreach ($imageFiles as $imageFile) {
          echo '<img src="' . $imageFile . '" alt="Image" data-lg-size="1000-2000" width="300px" height="160px"  />';
        }
        ?>

      </div>
    </div>

    <div id="superbom" class="bg-gray-800 text-white shadow-lg rounded-lg p-6 mt-4">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold">Superbom</h2>
        <span class="text-gray-500">
          <?php
          
          $filename = 'scraping/assai/image_0.jpg';
          if (file_exists($filename)) {
            echo date("d/m/Y", filemtime($filename));
          }
          ?>
        </span>
      </div>
      <div id="assaiImgs" class="flex flex-wrap">
        <?php
        $folderPath = 'scraping/assai';

        // Get all image files in the folder
        $imageFiles = glob($folderPath . '/*.jpg');

        // Loop through the image files and display each image
        foreach ($imageFiles as $imageFile) {
          echo '<img src="' . $imageFile . '" alt="Image" data-lg-size="1000-2000" width="300px" height="160px"  />';
        }
        ?>

      </div>
    </div>

    <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
      Desenvolvido por Hesea
    </div>
  </div>
</main>

<script src="node_modules/lightgallery/lightgallery.umd.js"></script>

<!-- lightgallery plugins -->
<script src="node_modules/lightgallery/plugins/thumbnail/lg-thumbnail.umd.js"></script>
<script src="node_modules/lightgallery/plugins/zoom/lg-zoom.umd.js"></script>
<script type="text/javascript">
  lightGallery(document.getElementById('assaiImgs'), {
    plugins: [lgZoom, lgThumbnail],
    speed: 500,
    licenseKey: '0000-0000-000-0000'
  });
</script>
</body>


</html>