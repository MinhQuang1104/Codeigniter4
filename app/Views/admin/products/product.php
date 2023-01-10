<?= $this->extend('admin/master') ?>

<?= $this->section('header-content') ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= url_to('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Product Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <div>
                        <a href="<?= url_to('product-create') ?>" class="btn btn-primary btn-block">Create New</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Sku</th>
                        <th>Weight</th>
                        <th>Dimension</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Category</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1; ?>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['sku'] ?></td>
                            <td><?= $product['weight'] ?></td>
                            <td><?= $product['dimension'] ?></td>
                            <td>$<?= $product['price'] ?></td>
                            <td><?= $product['description'] ?></td>
                            <td><?= $product['category_name'] ?></td>
                            <td>
<!--                                <a class="btn btn-primary btn-sm" href="--><?//= url_to('product-view', $product['id']) ?><!--">-->
<!--                                    <i class="fas fa-folder"></i>View-->
<!--                                </a>-->
                                <a class="btn btn-info btn-sm" href="<?= url_to('product-edit', $product['id']) ?>">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="<?= url_to('product-delete', $product['id']) ?>">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>