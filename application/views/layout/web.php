<?php  $this->load->view('frontend/requires/header');?>
<?php
        if (isset($banner)) {
            $this->load->view('frontend/requires/banner');
        }
?>
<?php  $this->load->view('frontend/'.$subview);?>
<?php  $this->load->view('frontend/requires/footer');?>