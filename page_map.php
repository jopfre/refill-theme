<?php
/* Template Name: Map Template */

get_header();
?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
 integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
 crossorigin=""/>

<script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>


 <style>
 #map { 
 	height: 100vh;
 	z-index: 0;
  }
</style>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			
			 <div id="map"></div>

		</main><!-- #main -->
	</section><!-- #primary -->


  <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <h2 class="modal__title" id="modal-1-title">
            Add Station
          </h2>
          <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
        </header>
        <main class="modal__content" id="modal-1-content">
          <form id="add-station-form" action="">
          	<label for="title">Title</label><br>
          	<input id="input-title" type="text" name="title"><br><br>
          	<label for="latitude">Latitude</label><br>
					  <input id="input-latitude" type="text" name="latitude"><br><br>
          	<label for="longitude">Longitude</label><br>
					  <input id="input-longitude" type="text" name="longitude"><br><br>
					  <input type="submit" name="submit">	
          </form>
        </main>

      </div>
    </div>
  </div>	
<?php
get_footer();
