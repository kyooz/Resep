<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
    <div><?php echo $error ?></div>
    <?php endforeach ?>
</div>
<?php endif ?>

<form action="" method="POST" enctype="multipart/form-data">

    <?php if ($resep['image']): ?>
    <img src="/<?php echo $resep['image'] ?>">
    <?php endif ?>
    
    <div class="mb-3">
        <label>Resep Image</label>
        <input type="file" name="image">
    </div>
    <div class="mb-3">
        <label>Resep Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $resep['title'] ?>">
    </div>
    <div class="mb-3">
        <label>Resep Deskripsi</label>
        <textarea class="form-control" name="description" value="<?php echo $resep['description'] ?>"></textarea>
    </div>
    <div class="mb-3">
        <label>Bahan-bahan</label>
        <textarea class="form-control" name="ingredients" value="<?php echo $resep['ingredients'] ?>"></textarea>
    </div>
    <div class="mb-3">
        <label>Langkah-langkah</label>
        <textarea class="form-control" name="step" value="<?php echo $resep['step'] ?>"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>