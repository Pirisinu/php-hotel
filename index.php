<?php
$hotels = [
  [
    'name' => 'Hotel Belvedere',
    'description' => 'Hotel Belvedere Descrizione',
    'parking' => true,
    'vote' => 4,
    'distance_to_center' => 10.4
  ],
  [
    'name' => 'Hotel Futuro',
    'description' => 'Hotel Futuro Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 2
  ],
  [
    'name' => 'Hotel Rivamare',
    'description' => 'Hotel Rivamare Descrizione',
    'parking' => false,
    'vote' => 1,
    'distance_to_center' => 1
  ],
  [
    'name' => 'Hotel Bellavista',
    'description' => 'Hotel Bellavista Descrizione',
    'parking' => false,
    'vote' => 5,
    'distance_to_center' => 5.5
  ],
  [
    'name' => 'Hotel Milano',
    'description' => 'Hotel Milano Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 50
  ],
];
$filterParking = isset($_GET['filterParking']) ? $_GET['filterParking'] : "";

$filteredHotels = [];
if ($filterParking === "1") {
  // Filtra solo gli hotel con parcheggio
  foreach ($hotels as $hotel) {
    if ($hotel['parking'] === true) {
      $filteredHotels[] = $hotel;
    }
  }
} elseif ($filterParking === "0") {
  // Filtra solo gli hotel senza parcheggio
  foreach ($hotels as $hotel) {
    if ($hotel['parking'] === false) {
      $filteredHotels[] = $hotel;
    }
  } 
} else {
  // Nessun filtro, mostra tutti gli hotel
  $filteredHotels = $hotels;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- BOOTSTRAP -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.css' integrity='sha512-r0fo0kMK8myZfuKWk9b6yY8azUnHCPhgNz/uWDl2rtMdWJlk7gmd9socvGZdZzICwAkMgfTkVrplDahQ07Gi0A==' crossorigin='anonymous'/>
  <!-- FONT-AWESOME -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css' integrity='sha512-KOWhIs2d8WrPgR4lTaFgxI35LLOp5PRki/DxQvb7mlP29YZ5iJ5v8tiLWF7JLk5nDBlgPP1gHzw96cZ77oD7zQ==' crossorigin='anonymous'/>
  <title>Php Hotel</title>
</head>
<body>
  <form method="get" action="index.php" class="w-75 m-auto bg-body-secondary p-4 text-center border rounded-4 ">
    <div class="mb-3">
      <label for="parolaDaCensurare" class="form-label">Filtra per parcheggio:</label>
      <select name="filterParking" class="form-select" id="filterParking">
      <option value="" <?php if ($filterParking === "") echo 'selected'; ?>>Scegli un opzione</option>
      <option value="1" <?php if ($filterParking == 1) echo 'selected'; ?>>Con parcheggio</option>
      <option value="0" <?php if ($filterParking == 0) echo 'selected'; ?>>Senza parcheggio</option>
    </select>
    </div>
    <button type="submit" class="btn btn-primary">Invia Form</button>
  </form>
  <div class="container bg-body-secondary d-flex p-4 ">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nome dell'hotel:</th>
          <th scope="col">Descrizione:</th>
          <th scope="col">Ha il parcheggio?</th>
          <th scope="col">Voto:</th>
          <th scope="col">Distanza dal centro:</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($filteredHotels as $hotel): 
            if(
              $filterParking = $hotels ||
              ($filterParking == 1 && $hotel['parking'] == true)||
              ($filterParking == 0 && $hotel['parking'] == false)
            ):
        ?>
        <tr>
          <th scope="row"><?php echo $hotel["name"] ?></th>
          <td><?php echo $hotel["description"] ?></td>
          <td>
            <?php 
              if($hotel["parking"] == true){
                echo "Ha il parcheggio";
              }else{echo "Non ha il parcheggio";}
            ?>
          </td>
          <td>
            <?php
              for($i=0; $i < $hotel["vote"]; $i++){
                echo "<i class=\"fa-solid fa-star\"></i>";
              }
            ?>
          </td>
          <td><?php echo $hotel["distance_to_center"] ?> km dal centro. </td>
        </tr>
        <?php endif; endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>