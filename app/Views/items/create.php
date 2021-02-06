<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
</head>

<body>
    <div class="container">
        <h2>Create Item</h2>
        <?php if ($success) echo 'Successfully created'; ?>

        <div class="row">

            <form action="/items/create" method="post">


                <label for="name">Name</label>
                <input type="input" name="name" /><br />

                <label for="price">Price</label>
                <input type="input" name="price" /><br />

                <label for="categories">Categories</label>
                <select name="categories[]" size=4 multiple>
                    <?php foreach ($categories as $item): ?>
                    <option value="<?php echo $item['id'] ?>"><?= esc($item['name']); ?></option>
                    <?php endforeach; ?>

                </select>
                <br>
                <input class='btn btn-primary' type="submit" name="submit" value="Create Item" />

            </form>
        </div>
    </div>
</body>

</html>