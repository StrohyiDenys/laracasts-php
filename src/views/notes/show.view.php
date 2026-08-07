
    <?php include __DIR__ . "/../partials/head.php" ?>
    <?php include __DIR__ . "/../partials/nav.php" ?>
    <?php include __DIR__ . "/../partials/banner.php" ?>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="w-1/2">
                <p class="px-1 text-lg mb-6">
                        <?=htmlspecialchars($note['body'])?>
                </p>
                <footer class="mt-6 gap-x-4 flex justify-start">
                    <a class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                       href="/note/edit?id=<?=$note['id']?>">Edit</a>
                    <a href="/notes" class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Go back...</a>
                </footer>
            </div>
        </div>
    </main>
    <?php include __DIR__ . "/../partials/footer.php" ?>
