<?php $this->load->view('backend/requires/header');?>
    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
            <i class="la la-close"></i></button>
        <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

            <!-- BEGIN: Aside Menu -->
            <?php  $this->load->view('backend/requires/sidebar');?>
            <!-- END: Aside Menu -->
        </div>


        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <!-- BEGIN: Left Aside -->
            <?php // $this->load->view('backend/requires/top_menu');?>
            <!-- END: Left Aside -->
            <!-- BEGIN: content -->
            <div class="m-content">
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Portlet-->
                        <div class="m-portlet">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                                        <h3 class="m-portlet__head-text">
                                            <?= (isset($title)) ? $title : lang('home') ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <?php if($op == 'UPDTATE' ):
                                $out['input']='UPDTATE';
                                $out['input_title']='تعديل ';
                            else:
                                $out['input']='INSERT';
                                $out['input_title']='حفظ ';
                            endif?>
    <?=form_open_multipart("",["class"=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);?>

        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <label>Full Name:</label>
                    <input type="email" class="form-control m-input" placeholder="Enter full name">
                </div>
                <div class="col-lg-6">
                    <label class="">Contact Number:</label>
                    <input type="email" class="form-control m-input" placeholder="Enter contact number">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <label>Address:</label>
                    <div class="m-input-icon m-input-icon--right">
                        <input type="text" class="form-control m-input" placeholder="Enter your address">
                        <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-map-marker"></i></span></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="">Postcode:</label>
                    <div class="m-input-icon m-input-icon--right">
                        <input type="text" class="form-control m-input" placeholder="Enter your postcode">
                        <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-bookmark-o"></i></span></span>
                    </div>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <label>User Group:</label>
                    <div class="m-radio-inline">
                        <label class="m-radio m-radio--solid">
                            <input type="radio" name="example_2" checked value="2"> Sales Person
                            <span></span>
                        </label>
                        <label class="m-radio m-radio--solid">
                            <input type="radio" name="example_2" value="2"> Customer
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-6">
                        <button type="reset" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                    <div class="col-lg-6 m--align-right">
                        <button type="reset" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
   <?= form_close()?>
                            <!--end::Form-->
                        </div>
                        <!--end::Portlet-->
                    </div>
                </div>
            </div>
            <!-- END: content -->
        </div>
    </div>
<?php $this->load->view('backend/requires/footer'); ?>