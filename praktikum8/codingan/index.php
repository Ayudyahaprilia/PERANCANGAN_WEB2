<?php include "pagination.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Pagination Modern</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f1f3f7;
        }
        .card {
            border-radius: 15px;
        }
        .table thead tr {
            background: #0d6efd;
            color: white;
        }
        .active {
            background-color: #0d6efd !important;
            color: white !important;
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">Data User</h3>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>UserID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = $users->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['userid']; ?></td>
                    <td><?= $row['firstname']; ?></td>
                    <td><?= $row['lastname']; ?></td>
                    <td><?= $row['username']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="mt-3 text-center">
            <?= $pagination ?>
        </div>

    </div>
</div>

</body>
</html>
