<?php 

class Flasher {
    public static function setFlash($pesan, $aksi, $tipe) {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }
    public static function flash() {
        if (isset($_SESSION['flash'])) {   
            echo '<div class="mt-3 alert alert-'. $_SESSION['flash']['tipe'] .'" role="alert">
            <b style="color: black;">' . $_SESSION['flash']['pesan'] . '</b> ' . $_SESSION['flash']['aksi'] . '
          </div>';
            unset($_SESSION['flash']);
        }
    }
}