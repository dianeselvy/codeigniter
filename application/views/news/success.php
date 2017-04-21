<?php
//application/views/news/success.php
$this->load->view($this->config->item('theme') . 'header');
?>


<p><b>Yay! You've successfully created a news item!</b></p>
<p>Now I suppose you want to see it?</p>


<?php

$this->load->view($this->config->item('theme') . 'footer');

?>