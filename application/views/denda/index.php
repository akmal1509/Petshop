        <?php //cek_user() 
        ?>
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3><?php echo $title ?></h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php echo $this->session->flashdata('message'); ?>
                                <form action="<?php echo base_url('denda/update') ?>" method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <label>Nominal Denda</label>
                                        <input type="hidden" class="form-control" name="id_denda" id="id_denda" value="<?php echo $denda['id'] ?>" readonly>
                                        <input type="text" class="form-control" name="denda" id="denda" value="<?php echo $denda['denda'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block"><i class="fa fa-paper-plane-o m-right-xs"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>