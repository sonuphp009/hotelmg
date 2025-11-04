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
                   
                    
                   

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Service Name</th>
                                <th>Description</th>
                                <th>Price ($)</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($services as $service): ?>
                            <tr>
                                <td><?= $service->id ?></td>
                                <td><?= $service->service_name ?></td>
                                <td><?= $service->description ?></td>
                                <td><?= number_format($service->price, 2) ?></td>
                                <td>
                                    <a href="<?= site_url('services/edit/'.$service->id) ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="<?= site_url('services/delete/'.$service->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this service?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
        </div>
    </div>
</div>
