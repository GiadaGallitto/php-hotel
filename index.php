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

        if (isset($_GET['parking']) && $_GET['parking'] == 'true'){
            $newArray = [];
            foreach($hotels as $hotelEl){
                if($hotelEl['parking'] == true){
                    $newArray[] = $hotelEl;
                }
            }
            $hotels = $newArray;
        }
        
        $selectParking = $_GET['parking'] ?? '';
        var_dump($selectParking);
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
                <option value="" disabled selected>Seleziona opzione</option>
                <option value="true">Con parcheggio</option>
                <option value="false">Senza parcheggio</option>
            </select>
            <button type="submit" >Invia</button>
        </form>

        <?php


        // if(in_array('parking', $_GET)){
        //     echo "<h5> Giusto </h5>";
        // } else {
        //     echo "<h5> Sbagliato </h5>";
        // };
        
        foreach ($hotels as $hotelEl){
            // foreach ($hotelEl as $key => $value){
            //     echo "<h2> {$value} </h2>";
            // }
            echo 
            "<div class='card py-2'>
                <h2> $hotelEl[name] </h2>
                <p> $hotelEl[description] </p>
                <h4> Voto: $hotelEl[vote] </h4>
                <h4> Distanza dal centro: $hotelEl[distance_to_center] </h4>
            </div>";
        }
        ?>
    </main>
</body>

</html>