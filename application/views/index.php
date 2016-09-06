<?php foreach ($todos as $todo): ?>
    <h2><?php echo $todo['title'] ?></h2>
    <div id="list">
        <?php echo $todo['description'] ?>
    </div>
<?php endforeach ?>

<a href="<?php echo base_url(); ?>index.php/view/<?php echo $todo['id'] ?>">View</a> 
