<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold"><?php echo $page_title;?></h2>
                            <h5 class="text-white op-7 mb-2"></h5>
                        </div>
                        <div class="ml-md-auto py-2 py-md-0">
                            <a href="<?php echo base_url('services/create');?>" class="btn  btn-round" style="background-color: white; color:black;">Add Service</a>

                            <a href="<?php echo base_url('backend/');?>Category/getCategoryReport/<?php if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>/<?php if($this->uri->segment(5)!=""){ echo $this->uri->segment(5);}?>" class="btn  btn-round" style="background-color: skyblue; color:black;">Export to excel</a>

                            <!-- <button  id="btnExport" name="btnExport" class="btn btn-round" style="background-color: skyblue; color:black;">Export to excel</button> -->
                        </div>
                    </div>
                </div>
            </div>
        <div class="page-inner mt--5">
                <section class="card">
                   
                    
                    
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
                </section>
        </div>
    </div>
</div>
