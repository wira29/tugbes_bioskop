<?php $this->view('admin/layouts/header') ?>

<body>
  <div class="contianer-fluid override">
    <div class="d-flex max-w-100">
      <?= $this->view('/admin/layouts/sidebar') ?>

      <main class="p-4 flex-grow-1">
        <header class="container-fluid d-flex align-items-center justify-content-between">
          <div>
            <a class="text-theme-primary " data-bs-toggle="collapse" href="#sidebar" role="button"><i class="fa-solid fa-bars fa-xl mb-3"></i></a>
            <h2>Dashboard</h2>
          </div>
          <a type="button" href="<?= Helper::baseUrl() ?>admin/user/create" class="m-3 btn btn-primary">Create</a>

        </header>
        <article class="container-fluid ">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias doloremque laudantium ab ipsum dignissimos earum quos nihil doloribus esse quam deleniti obcaecati officia ex animi voluptatibus, tempora, reprehenderit distinctio possimus?
        </article>
      </main>
    </div>
  </div>

</body>

</html>