<?php

require_once '../library/user.php';
require_once '../library/booking.php';

$titre = 'Réservations';

session_start();



if(isset($_SESSION['user'])){

    $user = $_SESSION['user'];
   $booking = new booking;

}
?>




<?php include '../includes/header.php'; ?>




<main>

<section id="event">

<article class="reservation">
<h2>Les réservations déjà effectuées<h2>
</article>

<?php

if(isset($_SESSION['user'])){

    $user = $_SESSION['user']; 
    $booking->table();
}
?>
 </section>
</main>

<?php include '../includes/footer.php'; ?>

</html>
