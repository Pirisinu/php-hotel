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


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.css' integrity='sha512-r0fo0kMK8myZfuKWk9b6yY8azUnHCPhgNz/uWDl2rtMdWJlk7gmd9socvGZdZzICwAkMgfTkVrplDahQ07Gi0A==' crossorigin='anonymous'/>
  <title>Php Hotel</title>
</head>
<body>
  <div class="container bg-body-secondary d-flex">
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
        <?php foreach ($hotels as $hotel): ?>
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
              for($i=0; $i <= $hotel["vote"]; $i++){
                echo "star";
              }
            ?>
          </td>
          <td><?php echo $hotel["distance_to_center"] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>