<?php $this->view('dashboard/layouts/navbar') ?>

<body>
  <div class="container">

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

    <button onclick="updateSeat()">send</button>
    <h2>Harga Rp. 0<p id="harga"></p>
    </h2>
    <h2>Tempat Duduk <p id="tempat-duduk">-</p>
    </h2>
  </div>

  <script>
    const selectedSeat = [];
    const bookedSeat = <?= json_encode($data['bookedSeats']) ?>;
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

      harga.innerHTML = 40000 * selectedSeat.length
      let elText = "";
      selectedSeat.forEach(seat => {
        elText += `<button class='btn btn-green'>${seat}</button>`
        console.log(seat)
      })
      tempat.innerHTML = elText
      sendSeat()
    }

    const sendSeat = () => {
      $.ajax({
        url: `/checkout/jadwal/${<?= $data['jadwal']["id"] ?>}`,
        method: 'POST',
        data: {
          selectedSeat
        }
      })
    }
  </script>
  <?php $this->view('dashboard/layouts/footer') ?>