<?php
    $nombre_archivo = "comentarios.txt";

    if (file_exists($nombre_archivo)) {
        $f = fopen($nombre_archivo, "r");
        fpassthru($f);
        fclose($f);
    } else {
        echo "<p>Todavía no hay comentarios.</p>";
    }
?>