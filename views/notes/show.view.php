<?php include base_path("views/partials/header.php"); ?>
<?php include base_path("views/partials/nav.php"); ?>
<?php include base_path("views/partials/banner.php"); ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <a href="notes?id=1" class="text-blue-500 hover:underline">
        Go Back ...
    </a>
    <p><?=$note["content"] ?></p>   
    </div>
</main>

<?php include base_path("views/partials/footer.php"); ?>

