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

        $negativeResponse = '';

        $newArray = [];
        if (isset($_GET['parking']) && $_GET['parking'] == 'true'){
            foreach($hotels as $hotelEl){
                if($hotelEl['parking'] == true && $hotelEl['vote'] == $_GET['vote']){
                    $newArray[] = $hotelEl;
                }
            }
            $hotels = $newArray;
            if (empty($newArray)){
                $negativeResponse = '<h5> Nessun risultato presente </h5>';
            }
        }
        
        if (isset($_GET['parking']) && $_GET['parking'] == 'false') {
            foreach($hotels as $hotelEl){
                if($hotelEl['parking'] == false && $hotelEl['vote'] == $_GET['vote']){
                    $newArray[] = $hotelEl;
                }
            }
            $hotels = $newArray;
        }
        
        $selectParking = $_GET['parking'] ?? '';
        $selectVote = $_GET['vote'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Hotel</title>
</head>

<body>
    <header>
        <h1>Hotel List</h1>
    </header>

    <main>
        <form action="index.php" method="GET" >
            <select name="parking" id="parking">
                <option value="">Seleziona opzione</option>
                <option value="true">Con parcheggio</option>
                <option value="false">Senza parcheggio</option>
            </select>
            <select name="vote" id="vote">
                <option value="">Seleziona opzione</option>
                <option value="1">Voto: 1</option>
                <option value="2">Voto: 2</option>
                <option value="3">Voto: 3</option>
                <option value="4">Voto: 4</option>
                <option value="5">Voto: 5</option>
            </select>
            <button type="submit" >Invia</button>
        </form>

        <div class="response">
        <?php
        if($negativeResponse != null){
            echo $negativeResponse;
        }
        
        foreach ($hotels as $hotelEl){
            echo 
            "<div class='card py-2'>
                <h2> $hotelEl[name] </h2>
                <p> $hotelEl[description] </p>
                <h5> Voto: $hotelEl[vote] </h5>
                <h6> Distanza dal centro: $hotelEl[distance_to_center] </h6>
            </div>";
        }

        ?>
        </div>

    </main>
</body>

</html>