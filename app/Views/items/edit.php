<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
</head>

<body>
    <div class="container">
        <h2>Edit Item</h2>
        <form action="/items/update/<?php echo $item['id'] ?>" method="post" class="form-horizontal">
            <fieldset>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">Name</label>
                    <div class="col-md-5">
                        <input id="textinput" name="name" type="text" placeholder="Name"
                            value="<?php echo $item['name'] ?>" class="form-control input-md" required="">
                        <br>
                        <input id="textinput" name="price" type="text" placeholder="Price"
                            value="<?php echo $item['price'] ?>" class="form-control input-md" required="">
                        <br>

                        <select name="categories[]" size=4 multiple>
                            <?php foreach ($categories as $item): ?>
                            <option value="<?php echo $item['id']; ?>" <?php if (in_array($item['id'], $categoryIds)) {
                                echo 'selected="selected"'; } ?>><?= esc($item['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <button id="submit" type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
</body>

</html>