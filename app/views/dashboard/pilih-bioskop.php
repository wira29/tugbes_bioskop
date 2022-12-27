<?php
require_once __DIR__ . "/layouts/navbar.php";
?>

<div style="background-color: black;">
  <div class="container p-3">
    <a href="<?= $uriHelper->baseUrl('film/' . $data['film']->id) ?>" class="text-white fs-5"><i class="fas fa-arrow-left me-3"></i> Kembali</a>
  </div>
</div>
<div class="p-5 mb-4 rounded-3 jumbotron" style="background-image: url('<?= $uriHelper->baseUrl('assets/img/jumbotron.png') ?>');">
  <div class="container py-5">
    <div class="row justify-content-between">
      <div class="col-3">
        <img src="<?= $uriHelper->baseUrl('assets/img/film/poster/' . $data['film']->poster) ?>" alt="">
      </div>
      <div class="col-7">
        <p>Judul Film</p>
        <h3 class="fw-bold"><?= $data['film']->judul ?></h3>
        <p><i class="fas fa-star text-warning me-2"></i> <?= $data['film']->rating ?> IMDB</p>

        <p class="mt-5">Bioskop</p>
        <p class="fw-bold">-</p>

      </div>
    </div>
  </div>
</div>

<div class="container container-jadwal">
  <h4 class="sub-title">Jadwal Nonton</h4>
  <div class="row mt-4">
    <?php foreach ($data['tanggal'] as $t) { ?>
      <div class="col-md-2 mt-3">
        <div class="card card-item card-tanggal" data-tanggal="<?= $t['tanggal'] ?>">
          <div class="card-body">
            <p><?= $t['tanggal'] ?></p>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <hr class="mt-5">

  <div class="row mt-5">
    <div class="container-bioskop">
      <p>Pilih tanggal terlebih dahulu.</p>
    </div>

  </div>
</div>

<script>
  $(document).ready(function() {
    $('.card-tanggal').click(function() {
      $(this).addClass('active', true)

      var tanggal = $(this).data('tanggal')
      var idFilm = "<?= $data['film']->id ?>"

      $.ajax({
        method: 'POST',
        url: '<?= $uriHelper->baseUrl('checkout/getJadwal') ?>',
        data: {
          id_film: idFilm,
          tanggal: tanggal
        },
        dataType: 'JSON',
        success: function(e) {
          var html = ''
          e.map((val) => {
            var htmlTeater = ''
            val.teater.map((t) => {
              var htmlWaktu = ''
              t.waktu.map((w) => {
                htmlWaktu += `<div class="col-md-2">
                                                <div class="card card-item card-waktu" onClick='jadwal(${JSON.stringify(val)}, ${JSON.stringify(t)}, ${JSON.stringify(w)})' data-jadwal="${val}">
                                                    <div class="card-body text-center">
                                                    
                                                        <a href="<?= $uriHelper->baseUrl() ?>pilih-kursi/${w.id}">${w.waktu}</a>
                                                    </div>
                                                </div>
                                            </div>`
              })

              htmlTeater += `<div class="row justify-content-between mt-5">
                                            <h5 class="col fw-bold">${t.nama_teater}</h5>
                                            <p class="col text-end">Rp 30.000</p>
                                        </div>
                                        <div class="row">
                                            ${htmlWaktu}
                                        </div>`
            })
            html += `<div class="mt-4">
                                        <h5 class="fw-bold"><img class="me-3" src="<?= $uriHelper->baseUrl('assets/img/icon-bioskop.png') ?>" alt=""> ${val.nama}</h5>
                                        <p>${val.alamat}</p>
                                        ${htmlTeater}
                                        
                                    </div>`
          })
          $('.container-bioskop').html(html)
        }
      })



    })
    $('.card-waktu').click(function() {
      alert('aa')
      console.log($(this).data('jadwal'))
    })


  })

  function jadwal(bioskop, teater, waktu) {
    console.log(bioskop, teater, waktu)
    window.reload.
    $.ajax({
      url: '/jadwal',
      method: 'POST',
      data: {

      }
    })
    $('.container-bioskop').removeClass('active')
  }
</script>

<?php
require_once __DIR__ . "/layouts/footer.php";
?>