<?php
/* Template Name: Login Template */

get_header();
?>


	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			

		</main><!-- #main -->
	</section><!-- #primary -->

<script src="https://www.gstatic.com/firebasejs/5.5.3/firebase.js"></script>

<script src="cred.js"></script>
<script>
  firebase.initializeApp(config);
</script>

<script>//var provider = new firebase.auth.GoogleAuthProvider();
var email = 'jonah.freeland2@gmail.com';
var password = 'dogsss2';
firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
  // Handle Errors here.
  var errorCode = error.code;
  var errorMessage = error.message;
  // ...
  console.log(error);
});


</script>
<?php
get_footer();
