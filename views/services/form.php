<!DOCTYPE html>
<html>
<head>
    <title><?= isset($service) ? 'Edit' : 'Add' ?> Service</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2><?= isset($service) ? 'Edit' : 'Add' ?> Service</h2>
    <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?= form_open(); ?>
        <div class="form-group">
            <label>Service Name</label>
            <input type="text" name="service_name" class="form-control" value="<?= set_value('service_name', $service->service_name ?? '') ?>" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"><?= set_value('description', $service->description ?? '') ?></textarea>
        </div>
        <div class="form-group">
            <label>Price ($)</label>
            <input type="text" name="price" class="form-control" value="<?= set_value('price', $service->price ?? '') ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?= site_url('services') ?>" class="btn btn-default">Back</a>
    <?= form_close(); ?>
</div>
</body>
</html>
