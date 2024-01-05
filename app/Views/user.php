<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
$cek = session()->get('cek');
$data = session()->get('data');
?>
    <!-- Success alert -->
    <?php if (session()->getFlashdata('user_added')) : ?>
    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        User telah ditambahkan dengan ID: <?= session()->getFlashdata('user_added'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <!-- Error alert -->
    <?php if (session()->getFlashdata('user_error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('user_error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>


    <h1>
        <h1>Welcome, <?= $cek['username']; ?> !</h1>
        <h1>Name: <?= $cek['name']; ?></h1>
        <h1>Email: <?= $cek['email']; ?></h1>
    </h1>
    <br />
    <input type="hidden">
    <div>
        <button type="button" class="btn btn-info" role="tab" data-bs-toggle="modal" data-bs-target="#basicModal">Lihat
            Semua
            User</button>
    </div>
    <br />
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">user id</th>
                                    <th scope="col">username</th>
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $row) {
                                ?>
                                <tr>
                                    <td><?= $row['userid']; ?></td>
                                    <td><?= $row['username']; ?></td>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Ya!</button>
                </div>
            </div>
        </div>
    </div>
    <br />


    <h4>Tambah Akun</h4>
    <form method="POST" action="<?= base_url('User/add_user'); ?>">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</body>

</html>