<?php
#redirectplayer.php

$video = $_GET['v'];

header('location:http://127.0.0.1/dashboard/Spleen/Reproductor/index.html?v=' . $video);