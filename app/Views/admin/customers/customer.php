<?= $this->extend('admin/master') ?>

<?= $this->section('header-content') ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customer Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= url_to('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Customer Page</li>
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
                        <a href="<?= url_to('customer-create') ?>" class="btn btn-primary btn-block">Create New</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Image</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone number</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1; ?>
                    <?php foreach ($customers as $customer) : ?>
                        <tr>
                            <td style="vertical-align: middle;"><?= $count++ ?></td>
                            <td style="vertical-align: middle;">
                                <?php if ($customer['profile_image']) : ?>
                                    <img class="img-circle" width="40px" height="40px"
                                         src="<?= $customer['profile_image'] ?>">
                                <?php else: ?>
                                    <img class="img-circle" width="40px" height="40px"
                                         src="<?= base_url('assets/images/users/User.png'); ?>">
                                <?php endif; ?>
                            </td>
                            <td style="vertical-align: middle;"><?= $customer['first_name'].' '.$customer['last_name'] ?></td>
                            <td style="vertical-align: middle;"><?= $customer['email'] ?></td>
                            <td style="vertical-align: middle;"><?= $customer['phone_number'] ?></td>
                            <td style="vertical-align: middle;">
                                <a class="btn btn-info btn-sm" href="<?= url_to('customer-edit', $customer['id']) ?>">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="<?= url_to('customer-delete', $customer['id']) ?>">
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