<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Kursi</title>
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>

<body>
  <h1>hello</h1>
  <?php
  for ($i = 1; $i <= 5; $i++) {
  ?>
    <div class="row gap-2">
      <?php $booked = [1, 2, 3, 14, 15, 16, 20, 29, 30, 21, 40];
      for ($k = ($i - 1) * 8 + 1; $k <= $i * 8; $k++) {
      ?>
        <p onclick="seatClicked(event)" class="col-1 btn <?= (in_array($k, $booked) ? 'btn-primary' : 'btn-secondary') ?> <?= $k % 4 == 0 ? 'me-4' : '' ?>">
          kursi <?= $k ?>
        </p>
      <?php
      } ?>
    </div>
  <?php
  } ?>
  <button onclick="updateSeat()">send</button>
  <h2>Harga Rp. 0<p id="harga"></p>
  </h2>
  <h2>Tempat Duduk <p id="tempat-duduk">-</p>
  </h2>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const selectedSeat = []
    const seatClicked = (e) => {
      const el = e.target
      el.classList.toggle('btn-primary');
      el.classList.toggle('btn-secondary');

      const seat = el.innerHTML.trim()
      if (selectedSeat.indexOf(seat) != -1) {
        selectedSeat.splice(selectedSeat.indexOf(seat), 1)
      } else {
        selectedSeat.push(seat);
      }
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
    }

    const sendSeat = async () => {
      try {
        const response = await axios.post('./testkursi.php', {
          selectedSeat
        })

        console.log(response)
      } catch (error) {
        console.log(error)
      }

    }
  </script>
</body>

</html>