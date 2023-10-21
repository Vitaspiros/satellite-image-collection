<?php
    $data = file_get_contents("data.json");
    $json = json_decode($data);

    $display_html = array();

    const DEGREE_LIMIT = 10;

    foreach ($json as $image) {
        $degrees = rand(-DEGREE_LIMIT, DEGREE_LIMIT);
        $imgStyle = "\"transform: rotate({$degrees}deg);\"";
        $textOffset = ($degrees / DEGREE_LIMIT) * -30;
        $textStyle = "\"transform: rotate({$degrees}deg) translateX({$textOffset}px); font-weight: 500;\"";
        array_push($display_html, "<div class=\"imgDiv\"><img style=$imgStyle src=\"img/{$image->name}\"/><br/><p style=$textStyle>{$image->label}</p></div>");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="style/index.css" rel="stylesheet"/>
</head>
<body>
    <center>
        <h1>Satellite Image Collection</h1>
        <p>All these images have been received by me from the NOAA satellites. The image processing is being done through SatDump.</p>
    <br/><br/>
    <?php foreach($display_html as $item) {echo $item;} ?>

    <!-- We aren't using footer tag due to HTML4 backwards compatibility -->
    <h5>
        The code of this website is published on <a href="#">Github</a> and is licensed under the AGPL-v3 license.
    </h5>
    </center>
</body>
</html>