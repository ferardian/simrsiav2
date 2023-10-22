<div class="row">
                    <div class="col-12">
                        <div class="card-box">                        
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                    <form action="<?php echo base_url('dashboard/simpan_upload');?>" enctype="multipart/form-data" method="POST">
                                        <fieldset class="form-group">
                                            <label for="no_rawat">No. Rawat</label>
                                            <input type="text" class="form-control" id="no_rawat"
                                                    placeholder="No. Rawat" value="<?=$no_rawat?>" disabled>
                                                    <input type="hidden" name="no_rawat" value="<?=$no_rawat?>">
                                        </fieldset>
                                        <fieldset class="form-group">
                                        <select class="form-control select2" name="jenis_berkas">
                                            <option>Select</option>
                                            <? foreach ($jenis_berkas as $data ) {?>
                                                <option value="<?=$data->kode?>"><?=$data->nama?></option>  
                                            <?}?>
                                        </select>
                                        </fieldset>
                                       

                                        <fieldset class="form-group">
                                            <label >Upload Gambar</label>
                                            <input class="form-control" type="file" name="berkas" placeholder="Readonly input here…">
                                        </fieldset>
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div><!-- end col -->

                            
                            </div><!-- end row -->
                        </div>
                    </div><!-- end col -->
                </div>
