<?php 
    require '../vendor/autoload.php';

    use GuzzleHttp\Client;

    $client = new Client();

    $response = $client->request('GET', 'http://omdbapi.com', [
        'query' => [
            'apikey' => 'dca61bcc',
            's' => 'naruto'
        ]
    ]);

    $result = json_decode($response->getBody()->getContents(), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Rest Client Guzzle</title>
</head>
<body>
    <?php foreach($result['Search'] as $movie): ?>
        <ul>
            <li>
                Judul: <?= $movie['Title']; ?>
            </li>
            <li>
                Tahun: <?= $movie['Year']; ?>
            </li>
            <li>
                <img src="<?= $movie['Poster']; ?>" alt="" width="80">
            </li>
        </ul>
    <?php endforeach; ?>
</body>
</html>