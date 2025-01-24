<?php include base_path("views/partials/header.php"); ?>
<?php include base_path("views/partials/nav.php"); ?>
<?php include base_path("views/partials/banner.php"); ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <?php foreach($notes as $note){ ?>
        <a href="note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
            <?="<li> ". htmlspecialchars($note["content"]). "</li>" ?>
        </a>
    <?php } ?>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <a href="note-create" class="text-blue-400 hover:underline">Create a new note</a>
    </div>
</main>
<?php include base_path("views/partials/footer.php"); ?>

