<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>General Website Settings</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/home') ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">General Website Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <form class="form-horizontal form-submit-event" action="<?= base_url('admin/setting/update_web_settings') ?>" method="POST" id="system_setting_form" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="site_title">Site Title <span class='text-danger text-xs'>*</span></label>
                                        <input type="text" class="form-control" name="site_title" value="<?= (isset($web_settings['site_title'])) ? output_escaping($web_settings['site_title']) : '' ?>" placeholder="Prefix title for the website. " />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="support_number">Support Number <span class='text-danger text-xs'>*</span></label>
                                        <input type="text" class="form-control" name="support_number" value="<?= (isset($web_settings['support_number'])) ? output_escaping($web_settings['support_number']) : '' ?>" placeholder="Customer support mobile number" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="support_email">Support Email <span class='text-danger text-xs'>*</span></label>
                                        <input type="text" class="form-control" name="support_email" value="<?= (isset($web_settings['support_email'])) ? output_escaping($web_settings['support_email']) : '' ?>" placeholder="Customer support email" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Copyright Details <span class='text-danger text-xs'>*</span></label>
                                        <textarea name="copyright_details" id="copyright_details" class="form-control" cols="30" rows="3"><?= (isset($web_settings['copyright_details'])) ? output_escaping($web_settings['copyright_details']) : '' ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Address <span class='text-danger text-xs'>*</span></label>
                                        <textarea name="address" id="address" class="form-control" cols="30" rows="5"><?= (isset($web_settings['address'])) ? output_escaping($web_settings['address']) : '' ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="app_short_description">Short Description <span class='text-danger text-xs'>*</span></label>
                                        <textarea name="app_short_description" id="app_short_description" class="form-control" cols="30" rows="5"><?= (isset($web_settings['app_short_description'])) ? output_escaping($web_settings['app_short_description']) : '' ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="map_iframe">Map Iframe <span class='text-danger text-xs'>*</span></label>
                                        <textarea name="map_iframe" id="map_iframe" class="form-control" cols="30" rows="5"><?= (isset($web_settings['map_iframe'])) ? output_escaping($web_settings['map_iframe']) : '' ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="logo">Logo <span class='text-danger text-xs'>*</span></label>
                                                <div class="col-sm-10">
                                                    <div class='col-md-3'><a class="uploadFile img btn btn-primary text-white btn-sm" data-input='logo' data-isremovable='0' data-is-multiple-uploads-allowed='0' data-toggle="modal" data-target="#media-upload-modal" value="Upload Photo"><i class='fa fa-upload'></i> Upload</a></div>
                                                    <?php
                                                    if (!empty($logo)) {
                                                    ?>
                                                        <label class="text-danger mt-3">*Only Choose When Update is necessary</label>
                                                        <div class="container-fluid row image-upload-section">
                                                            <div class="col-md-3 col-sm-12 shadow p-3 mb-5 bg-white rounded m-4 text-center grow image">
                                                                <div class=''>
                                                                    <div class='upload-media-div'><img class="img-fluid mb-2" src="<?= BASE_URL() . $logo ?>" alt="Image Not Found"></div>
                                                                    <input type="hidden" name="logo" id='logo' value='<?= $logo ?>'>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else { ?>
                                                        <div class="container-fluid row image-upload-section">
                                                            <div class="col-md-3 col-sm-12 shadow p-3 mb-5 bg-white rounded m-4 text-center grow image d-none">
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="favicon">Favicon <span class='text-danger text-xs'>*</span></label>
                                                <div class="col-sm-10">
                                                    <div class='col-md-3'><a class="uploadFile img btn btn-primary text-white btn-sm" data-input='favicon' data-isremovable='0' data-is-multiple-uploads-allowed='0' data-toggle="modal" data-target="#media-upload-modal" value="Upload Photo"><i class='fa fa-upload'></i> Upload</a></div>
                                                    <?php
                                                    if (!empty($favicon)) {
                                                    ?>
                                                        <label class="text-danger mt-3">*Only Choose When Update is necessary</label>
                                                        <div class="container-fluid row image-upload-section">
                                                            <div class="col-md-3 col-sm-12 shadow p-3 mb-5 bg-white rounded m-4 text-center grow image">
                                                                <img class="img-fluid mb-2" src="<?= BASE_URL() . $favicon ?>" alt="Image Not Found">
                                                                <input type="hidden" name="favicon" id='favicon' value='<?= $favicon ?>'>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else { ?>
                                                        <div class="container-fluid row image-upload-section">
                                                            <div class="col-md-3 col-sm-12 shadow p-3 mb-5 bg-white rounded text-center grow image d-none">
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="support_email">Meta Keywords <span class='text-danger text-xs'>*</span></label>
                                        <textarea name="meta_keywords" id="meta_keywords" class="form-control" cols="30" rows="5"><?= (isset($web_settings['meta_keywords'])) ? $web_settings['meta_keywords'] : '' ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="support_email">Meta Description <span class='text-danger text-xs'>*</span></label>
                                        <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="5"><?= (isset($web_settings['meta_description'])) ? $web_settings['meta_description'] : '' ?></textarea>
                                    </div>
                                </div>
                                <hr>
                                <h4>App downlod Section</h4>
                                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for="is_delivery_boy_otp_setting_on"> Enable / Disable</label>
                                        <div class="card-body">
                                            <input type="checkbox" name="app_download_section" <?= (isset($web_settings['app_download_section']) && $web_settings['app_download_section'] == '1') ? 'Checked' : ''  ?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="app_download_section_title">Title <span class='text-danger text-xs'>*</span></label>
                                        <input type="text" class="form-control" name="app_download_section_title" value="<?= (isset($web_settings['app_download_section_title'])) ? output_escaping($web_settings['app_download_section_title']) : '' ?>" placeholder="App download section title. " />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="app_download_section_tagline">Tagline<span class='text-danger text-xs'>*</span></label>
                                        <input type="text" class="form-control" name="app_download_section_tagline" value="<?= (isset($web_settings['app_download_section_tagline'])) ? output_escaping($web_settings['app_download_section_tagline']) : '' ?>" placeholder="App download section Tagline." />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="app_download_section_short_description">Short Description <span class='text-danger text-xs'>*</span></label>
                                        <textarea name="app_download_section_short_description" id="app_download_section_short_description" class="form-control" cols="30" rows="5"><?= (isset($web_settings['app_download_section_short_description'])) ? output_escaping($web_settings['app_download_section_short_description']) : '' ?></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="app_download_section_title">Playstore URL <span class='text-danger text-xs'>*</span></label>
                                        <input type="text" class="form-control" name="app_download_section_playstore_url" value="<?= (isset($web_settings['app_download_section_playstore_url'])) ? output_escaping($web_settings['app_download_section_playstore_url']) : '' ?>" placeholder="Playstore URL. " />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="app_download_section_tagline">Applestore URL<span class='text-danger text-xs'>*</span></label>
                                        <input type="text" class="form-control" name="app_download_section_appstore_url" value="<?= (isset($web_settings['app_download_section_appstore_url'])) ? output_escaping($web_settings['app_download_section_appstore_url']) : '' ?>" placeholder="Appstore URL." />
                                    </div>
                                </div>
                                <hr>
                                <h4>Social Media Links</h4>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>