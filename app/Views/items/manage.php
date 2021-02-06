<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
</head>

<body>
    <div class="container">
        <h2><?= esc($title); ?></h2>

        <div class="row mt-3">
            <table class="table table-borderless" id="items">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Categories</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (! empty($items) && is_array($items)) : ?>
                    <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['price']; ?></td>
                        <td><?php echo implode($item['categories'], ','); ?></td>
                        <td>
                            <a href="<?php echo base_url('items/update/'.$item['id']);?>"
                                class="btn btn-success">Edit</a>
                            <a href="<?php echo base_url('items/delete/'.$item['id']);?>"
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