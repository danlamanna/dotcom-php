<?php include 'header.php'; ?>

<h2 style="margin-bottom:-5px;"><?php echo $post['title'] ?></h2>
     <p><?php printf("tags: %s", implode(", ", $post['tags'])); ?></p>
    <p style="color:#808080;"><?php echo $post['date']->format('F j, Y') ?></p>

        <p style="padding-top:5px;">
<?php echo $post['content']; ?>
     </p>

     <ul class="pager">
     <li class="previous">
     <a href="/">&larr; home</a>
         </li>
         </ul>

<?php include 'footer.php'; ?>