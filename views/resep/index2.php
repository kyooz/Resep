<h1>Resep List</h1>

<p>
    <a href="/resep/create" class="btn btn-success">Create Product</a>
</p>


<form>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search Product" name="search" value="<?php echo $search ?>">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Create Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resep as $i => $resep) : ?>
        <tr>
            <th scope="row"><?php echo $i + 1 ?></th>
            <td>
                <?php if ($resep['image']): ?>
                    <img src="/<?php echo $resep['image'] ?>" class="thumb-image">
                <?php endif ?>
            </td>
            <td><?php echo $resep['title'] ?></td>
            <td><?php echo $resep['create_date'] ?></td>
            <td>
                <a href="/products/update?id=<?php echo $resep['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <form style="display:inline-block" method="post" action="/products/delete">
                    <input type="hidden" name="id" value="<?php echo $resep['id']?>">
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
