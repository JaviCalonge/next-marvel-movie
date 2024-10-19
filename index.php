<?php

const API_URL = "https://whenisthenextmcufilm.com/api";

$ch = curl_init(API_URL);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);

?>

<head>
  <meta charset="UTF-8">
  <title>Next Marvel Movie</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./marvel.webp">
</head>

<main>

  <section>
    <h1 style="font-weight: 400;">La próxima película de Marvel</h1>
    <h2><?= $data["title"]; ?></h2>
    <img src=<?= $data["poster_url"]; ?> width="300" alt="" style="border-radius: 20px;">
    <h4>Lanzamiento el <?= (new DateTime($data["release_date"]))->format('d-m-Y'); ?> </h4>
    <p style="margin-top: 1vh;">Días que faltan para el estreno: <?= $data["days_until"]; ?> </p>
    <h4>El siguiente estreno será... <img src="<?= ["following_production"] ?>" alt=""></h4>
    <img src=<?= $data["following_production"]["poster_url"]; ?> width="150" alt="" style="border-radius: 20px;">
  </section>

</main>

<style>
  :root {
    background-color: #222;
  }

  body {
    text-align: center;
  }

  h1,
  h2,
  h4,
  p {
    color: #6F7B87;
    text-shadow: 1px 1px 8px black;
    /* Sombra combinada clara y oscura */
  }
</style>