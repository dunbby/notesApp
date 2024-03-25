<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p>
            <?= htmlspecialchars($note['body']) ?>
        </p>

        <div class="border-t border-gray-900/10 mt-12 flex items-center justify-between gap-x-6">
            <div class="flex items-center justify-start gap-x-6">
                <a href="/notes" class="text-sm font-semibold leading-6 my-6 text-gray-900 hover:underline">Back</a>
                <a href="/note/edit?id=<?= $note['id'] ?>"
                   class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500
            focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
            focus-visible:outline-gray-600">Edit</a>
            </div>
            <form method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button type="submit"
                        class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                    Delete
                </button>
            </form>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>
