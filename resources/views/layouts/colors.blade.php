<?php
  use \App\Color;
 ?>


<style media="screen">
  [class*='-primary']:not(.nocolor) {
    background-color:  <?php echo Color::hex('primary') ?> !important;
    border-color: rgba(0, 0, 0, 0.21) !important;
  }
  [class*='-info']:not(.nocolor) {
    background-color:  <?php echo Color::hex('info') ?> !important;
    border-color: rgba(0, 0, 0, 0.21) !important;
  }
  [class*='-warning']:not(.nocolor) {
    background-color:  <?php echo Color::hex('warning') ?> !important;
    border-color: rgba(0, 0, 0, 0.21) !important;
  }
  [class*='-success']:not(.nocolor) {
    background-color:  <?php echo Color::hex('success') ?> !important;
    border-color: rgba(0, 0, 0, 0.21) !important;
  }
  [class*='-danger']:not(.nocolor) {
    background-color:  <?php echo Color::hex('danger') ?> !important;
    border-color: rgba(0, 0, 0, 0.21) !important;
  }
  .color-background:not(.nocolor) {
    background:  <?php echo Color::hex('background') ?> !important;
  }
  .color-panel-headers:not(.nocolor) {
    background-color:  <?php echo Color::hex('panel-headers') ?> !important;
    color: #fff !important;
  }
  .color-foreground:not(.nocolor) {
    background-color:  <?php echo Color::hex('foreground') ?> !important;
    color: #fff !important;
  }

</style>
