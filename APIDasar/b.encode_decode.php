<?php 

    // Encode --> Object to JSON
    // Data manual
    $manusia = [
        [
            "nama" => "Ucup",
            "umur" => 20,
            "tinggi" => 1.7,
            "telepon" => "081234567890",
            "keren" => true,
            "hobi" => [
                "Gamer",
                "Memancing",
                "Memasak"
            ]
        ],
        [
            "nama" => "Slamet",
            "umur" => 23,
            "tinggi" => 1.75,
            "telepon" => "0810987654321",
            "keren" => false,
            "hobi" => [
                "Membaca",
                "Koding",
                "Memasak"
            ]
        ]
    ];

    $data = json_encode($manusia);
    echo $data;


    // Array to JSON
    // Data database
    $dbh = new PDO("mysql:host=localhost;dbname=php_dasar", "root", "");
    $db = $dbh->prepare("SELECT * FROM barang");
    $db->execute();

    $barang = $db->fetchAll(PDO::FETCH_ASSOC);

    $data = json_encode($barang);
    echo $data;


    // Decode --> JSON to Object
    $data =  file_get_contents('a.variabel.json');
    $manusia = json_decode($data, true);

    var_dump($manusia);
?>