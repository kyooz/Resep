<h1>Resep List</h1>

<p>
    <a href="/resep/create" class="btn btn-success">Create Product</a>
</p>

<div class="container">
    <form>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search Product" name="search" value="<?php echo $search ?>">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>
</div>

<div class="container">
    <div class="row">
    <?php foreach ($resep as $i => $resep) : ?>
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $resep['title'] ?></h5>
                    <a href="/resep/baca?id=<?php echo $resep['id'] ?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    </div>
</div>