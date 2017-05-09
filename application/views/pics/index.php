<?php
//application/views/pics/create.php

$this->load->view($this->config->item('theme') . 'header');

?>

<h2><?php echo $title; ?></h2>

<?php foreach ($pics as $pics_item): ?>

        <h3><?php echo $pics_item['title']; ?></h3>
        <div class="main">
                <?php echo $pics_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('pics/'.$pics_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>

<!--
<ul>
    <li><a href="mariners.php">Mariners</a></li>
    <li><a href="seahawks.php">Seahawks</a></li>
    <li><a href="sounders.php">Sounders</a></li>
</ul>
-->




<?php

$this->load->view($this->config->item('theme') . 'footer');

?>