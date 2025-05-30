<?php include base_path("views/partials/header.php"); ?>
<?php include base_path("views/partials/nav.php"); ?>
<?php include base_path("views/partials/banner.php"); ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!--<form action="note-create" method="POST">-->
        <form action="/notes" method="POST">    
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                    <label for="content" class="block text-sm/6 font-medium text-gray-900">New Note</label>
                    <div class="mt-2">
                        <textarea name="content" id="content" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        <?= isset($errors["content"]) ? $_POST["content"] : '' ?>
                        </textarea>
                    </div>
                    </div>
                </div>
                </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
        <p class="text-red-500"><?= $errors["content"] ?? "" ?></p>


    </div>
</main>
<?php include base_path("views/partials/footer.php"); ?>

