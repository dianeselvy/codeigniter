<?php
//application/views/news/view.php

$this->load->view($this->config->item('theme') . 'header');

echo '<h2>'.$pics_item['title'].'</h2>';
echo $pics_item['text'];

?>

<?php

$this->load->view($this->config->item('theme') . 'footer');

?>