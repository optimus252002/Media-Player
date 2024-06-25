<?php
include ('header.php');
require_once './api/dbcon.php';

?>

<div class="part-1">
    <?php
    // Define the active page variable based on the current page
    $active_page = basename($_SERVER['PHP_SELF'], ".php");
    // Include the navbar.php file
    include ('side-bar.php');
    ?>

</div>
<div class="part-2">


    <style>
        #ul_top_hypers {
            /* display: flex; */
            justify-content: space-around;
            list-style-type: none;
            padding-bottom: 40px;
            font-size: 22px;
            /* color:black */
        }
    </style>

    <!-- <ul id="ul_top_hypers">
        <li><a class="a_top_hypers" href="index.php" <?php if ($active_page === 'index') {
            echo
                'class="active"';
        } else {
            echo 'class="link-dark"';
        } ?>><i class="bi bi-house pr-2"></i> Home</a></li>

        <li><a class="a_top_hypers" href="music.php" <?php if ($active_page === 'music') {
            echo
                'class="active"';
        } else {
            echo 'class="link-dark"';
        } ?>><i class="bi bi-music-note-list pr-2"></i></i>Music Library</a></li>

        <li><a class="a_top_hypers" href="video.php" <?php if ($active_page === 'video') {
            echo
                'class="active"';
        } else {
            echo 'class="link-dark"';
        } ?>><i class="bi bi-camera-video pr-2"></i>Video Library</a></li>
        <li><a class="a_top_hypers" href="image.php" <?php if ($active_page === 'image') {
            echo
                'class="active"';
        } else {
            echo 'class="link-dark"';
        } ?>><i class="bi bi-image pr-2"></i>Image Library</a></li>

        <li><a class="a_top_hypers" href="upload.php" <?php if ($active_page === 'upload') {
            echo
                'class="active"';
        } else {
            echo 'class="link-dark"';
        } ?>><i class="bi bi-upload pr-2"></i>Upload Audio</a></li>

        <li><a class="a_top_hypers" href="upload-video.php" <?php if ($active_page === 'upload-video') {
            echo
                'class="active"';
        } else {
            echo 'class="link-dark"';
        } ?>><i class="bi bi-upload pr-2"></i>Upload Video</a></li>
        <li><a class="a_top_hypers" href="upload-image.php" <?php if ($active_page === 'upload-image') {
            echo
                'class="active"';
        } else {
            echo 'class="link-dark"';
        } ?>><i class="bi bi-upload pr-2"></i>Upload Image</a></li>

     
    </ul> -->
    <a style="font-size: 28px;
    text-align: center;
    margin: 10px 0; font-family: 'Cormorant Garamond', sans-serif; font-weight: 600" href="">HOME</a>

    <h4>Recents Audios</h4>

<div class="m-recents">

    <?php
    $query = "SELECT * FROM music ORDER BY created_at DESC";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($stmt);
    $query_result = mysqli_stmt_get_result($stmt);

    for ($i = 1; $i <= 3; $i++) {
        $music = mysqli_fetch_assoc($query_result);
        if ($music) {

            ?>
            <div class="m-part">
                <a href="http://localhost/media-player/music.php">
                <i class="bi bi-music-note-beamed"></i>
                <div><?= $music['music_name'] ?></div>
                </a>
            </div>

            <?php
        }
    }

    ?>



</div>
<br>
<br>
<br><br>

<h4>Recents Videos</h4>


<div class="m-recents">

    <?php
    $query = "SELECT * FROM video ORDER BY created_at DESC";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($stmt);
    $query_result = mysqli_stmt_get_result($stmt);

    for ($i = 1; $i <= 3; $i++) {
        $video = mysqli_fetch_assoc($query_result);
        if ($video) {

            ?>
            <div class="v-part" style="v-part:active { }">
                <a href="http://localhost/media-player/video.php">
                    <i class="bi bi-camera-reels"></i>
                    <div><?= $video['video_name'] ?></div>
                </a>
            </div>

            <?php
        }
    }

    ?>



</div>

</div>


</div>
</body>

</html>