<?php
include ('header.php');
require_once './api/dbcon.php';

?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond&family=DM+Mono:wght@400;500&display=swap');

    body {
        font-family: sans-serif;
        margin: 0;
        padding: 0;
        background: rgb(25, 134, 163);
    }

    /* Gallery wrapper */
    /* a{
            font-family: 'Cormorant Garamond', sans-serif;
        } */
    h1 {
        font-family: 'Cormorant Garamond', sans-serif;
        padding: 12px 0 20px 48px;
        margin: 0 73px;
        color: #61614b;
        font-size: 3em;
        display: inline-block;
    }
</style>
<div class="part-1">

    <?php
    // Define the active page variable based on the current page
    $active_page = basename($_SERVER['PHP_SELF'], ".php");
    // Include the navbar.php file
    include ('side-bar.php');
    ?>

</div>

<div class="part-2">
    <a class="home_index" href="http://localhost/media-player/index.php">Home</a>
    <h1>Audios</h1>
    <table class="song-table" border="1">
        <thead style="height:15mm;">
            <tr>
                <th style="padding: 15px;">Action</th>
                <th style="padding: 15px;">Audio</th>
                <th style="padding: 15px;">Duration</th>
                <th style="padding: 15px;">Edit</th>
                <th style="padding: 15px;">Delete</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM music ORDER BY created_at";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_execute($stmt);
            $query_result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($query_result) > 0) {
                while ($music = mysqli_fetch_assoc($query_result)) {
                    $source = 'uploads/audios/' . $music['pre_name'];
                    $id = "icon" . $music['mid'];
                    ?>
                    <tr style="height:15mm;">
                        <td style="padding: 15px;">
                            <i id="<?= $id ?>" onclick="playAudio('<?= $id ?>', '<?= $source ?>')"
                                style="font-size: 28px; cursor:pointer;" class="bi bi-play-circle"></i>
                        </td>
                        <td style="padding: 15px;"><?= htmlspecialchars($music['music_name']) ?></td>

                        <td style="padding: 15px;">
                            <?php
                            echo $music['duration'];
                            ?>
                        </td>
                        <td style="padding: 15px;"><a href="edit-music.php?id=<?php echo $music['mid']; ?>"> Edit</a> </td>
                        <td style="padding: 15px;" onclick="deletes()"> <a
                                href="./api/delete_music.php?id=<?php echo $music['mid']; ?>">Delete</a></td>
                        <?php
                }
            } ?>
            </tr>
        </tbody>
    </table>
</div>

<div class="part-3">
    <div class="b1" id="music_name">

    </div>

    <div class="b2">


        <div class="curr-duration" id="current-time">
            00:00
        </div>
        <div class="range">
            <input class="custom-range" id="seek-bar" type="range" min="0" value="0">

        </div>
        <div class="duration" id="duration">
            00:00
        </div>
    </div>
</div>
<script>
    function deletes() {
        alert('Bạn có muốn xóa không ?')
    }
</script>
<?php

include ('footer.php');

?>