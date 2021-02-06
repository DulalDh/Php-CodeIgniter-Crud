<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">

</head>

<body>
    <div class="container mt-5">
        <div class="row mt-3">
            <h2><?= esc($title); ?></h2>
            <table class="table table-borderless" id="categories">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (! empty($categories) && is_array($categories)) : ?>
                    <?php foreach ($categories as $item): ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td>
                            <a href="<?php echo base_url('categories/update/'.$item['id']);?>"
                                class="btn btn-success">Edit</a>
                            <a href="<?php echo base_url('categories/delete/'.$item['id']);?>"
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>