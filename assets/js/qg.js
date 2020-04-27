function f($id, $i) {
    window.location.href = "<?php echo base_url(); ?>index.php/missoes/view?id=" + $id + "&idslot=" + $i;
}