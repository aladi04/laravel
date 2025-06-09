<?php include base_path("views/partials/header.php"); ?>
<?php include base_path("views/partials/nav.php"); ?>
<?php include base_path("views/partials/banner.php"); ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <a href="notes?id=1" class="text-blue-500 hover:underline">
        Go Back ...
    </a>
    <p><?=$note["content"] ?></p>  
    
    <form action="" method="post">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" id="id" value=<?= $note["id"]?>>
        <button class="text-sm mt-4 text-red-600 hover:underline">delete</button>
    </form>

    
    <footer class="mt-5">
        <a href="/note/edit?id=<?= $note['id'] ?>" class="text-gray-500 border border-current px-4 py-1 rounded">Edit</a>
    </footer>
    </div>
</main>

<?php include base_path("views/partials/footer.php"); ?>

