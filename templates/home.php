<?php include 'header.php'; ?>

<?php foreach ($posts as $slug => $post): ?>

<h3><a href="/<?php echo $slug; ?>"><?php echo $post['title']; ?></a></h3>
<p style="color:#808080;"><?php echo $post['date']->format('F j, Y') ?></p>
    <p>
<?php echo $post['content']; ?>
    </p>

    <hr />
<?php endforeach; ?>

<?php include 'footer.php'; ?>
