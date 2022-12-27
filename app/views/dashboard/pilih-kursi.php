<?php
require_once __DIR__ . "/layouts/navbar.php";
?>
<body>
  <div class="container mt-5">

    <?php
    $row = 'F';
    $col = 8;
    for ($i = 'A'; $i <= $row; $i++) {
    ?>
      <div class="row gap-2 justify-content-center">
        <?php
        for ($j = 1; $j <= $col; $j++) { ?>
          <p onclick="seatClicked(event)" class="col btn <?= (in_array($i . $j, $data['bookedSeats']) ? 'btn-primary' : 'btn-secondary') ?> <?= $j % 4 == 0 ? 'me-5' : '' ?>">
            <?= $i . $j ?>
          </p>
        <?php
        } ?>
      </div><?php
          } ?>

    <button class="btn btn-primary" onclick="updateSeat()">pilih</button>
    
    <div class="row mt-5">
      <h4>Harga Rp.<span id="harga"></span>
      </h4>
      <h4>Tempat Duduk <p id="tempat-duduk">-</p>
      </h4>
    </div>

    
    <div class="col-md-12 text-end mt-5">
      <a href="<?= $uriHelper->baseUrl('confirm-checkout/' . $data['transaksi']->id) ?>" class="btn btn-primary">Checkout</a>
    </div>
  </div>

  <script>
    const selectedSeat = [];
    const bookedSeat = <?= json_encode($data['bookedSeats']) ?>;
    let current_harga = 0;

    const seatClicked = (e) => {
      const el = e.target
      const seat = el.innerHTML.trim()
      console.log(bookedSeat)
      if (bookedSeat.includes(seat)) {
        console.log('telah dipesan')
        return
      }
      if (selectedSeat.indexOf(seat) != -1) {
        selectedSeat.splice(selectedSeat.indexOf(seat), 1)
      } else {
        selectedSeat.push(seat);
      }
      el.classList.toggle('btn-primary');
      el.classList.toggle('btn-secondary');
      console.log(selectedSeat)
    }
    const updateSeat = () => {
      const harga = document.querySelector('#harga')
      const tempat = document.querySelector('#tempat-duduk')

      current_harga = '<?= $data['jadwal']['harga'] ?>' * selectedSeat.length
      harga.innerHTML = current_harga
      let elText = "";
      selectedSeat.forEach(seat => {
        elText += `<button class='btn btn-success mx-2 mt-3'>${seat}</button>`
        console.log(seat)
      })
      tempat.innerHTML = elText
      sendSeat()
    }

    const sendSeat = () => {
      $.ajax({
        url: `<?= $uriHelper->baseUrl() ?>checkout/jadwal/${<?= $data['jadwal']["id"] ?>}`,
        method: 'POST',
        data: {
          selectedSeat, current_harga, idTransaksi: '<?= $data['transaksi']->id ?>'
        }
      })
    }
  </script>
  <?php
require_once __DIR__ . "/layouts/footer.php";
?>