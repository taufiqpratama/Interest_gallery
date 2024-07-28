<?php
session_start();
include 'koneksi.php';

if (isset($_POST['kirim'])) {
    $fotoid = $_POST['fotoid'];
    $userid = $_SESSION['userid'];
    $isikomentar = $_POST['isikomentar'];
    $tanggalkomentar = date('Y-m-d');

    $query = mysqli_query($conn, "INSERT INTO komentar (fotoid, userid, isikomentar, tanggalkomentar)
                                    VALUES ('$fotoid','$userid','$isikomentar','$tanggalkomentar')");

    if ($query) {
        echo "<script>
                location.href = 'detail.php?fotoid=$fotoid';
              </script>";
    } else {
        echo "Failed to add comment.";
    }
} else if (isset($_POST['edit'])) {
    $fotoid = $_POST['fotoid'];
    $komentarid = $_POST['komentarid'];
    $isikomentar = $_POST['isikomentar'];

    $sql = mysqli_query($conn, "UPDATE komentar SET isikomentar='$isikomentar' WHERE komentarid='$komentarid'");
    if ($sql) {
        echo "<script>
                location.href = 'detail.php?fotoid=$fotoid';
              </script>";
    } else {
        echo "Failed to edit comment.";
    }
} else if (isset($_POST['hapus'])) {
    $fotoid = $_POST['fotoid'];
    $komentarid = $_POST['komentarid'];

    $sql = mysqli_query($conn, "DELETE FROM komentar WHERE komentarid='$komentarid'");
    if ($sql) {
        echo "<script>
                location.href = 'detail.php?fotoid=$fotoid';
              </script>";
    } else {
        echo "Failed to delete comment.";
    }
}
?>
