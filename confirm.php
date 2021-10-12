<?php

    $name = $_POST['name'];
    $prefectures = $_POST['pref'];
    $address = $_POST['address'];
    $request = $_POST['toiawase'];

    $place = sprintf ($prefectures . $address);


    // confirm.html 読み込み
    $htmlString = file_get_contents("./confirm.html");

    // html内の変換文字列を使ってconfirm.html内の文字列を変換
    $printHtml = str_replace("****replace_onamae****", $name, $htmlString);
    $printHtml = str_replace("****replace_pref****", $prefectures, $printHtml);
    $printHtml = str_replace("****replace_address****", $address, $printHtml);
    $printHtml = str_replace("****replace_request****", $request, $printHtml);

    echo $printHtml;