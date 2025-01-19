<?php include "partials/header.php"; ?>
<?php include "partials/nav.php"; ?>
<?php include "partials/banner.php"; ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <?php foreach($notes as $note){ ?>
        <a href="note.php?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
            <?="<li> ". $note["content"]. "</li>" ?>
        </a>
    <?php } ?>
    </div>
</main>
<?php include "partials/footer.php"; ?>

