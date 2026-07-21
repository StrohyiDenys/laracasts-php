
    <?php include __DIR__ . "/../partials/head.php" ?>
    <?php include __DIR__ . "/../partials/nav.php" ?>
    <?php include __DIR__ . "/../partials/banner.php" ?>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <ul>
            <?php foreach ($notes as $note) : ?>
                <li>
                    <a href="/note?id=<?=$note['id']?>" class="text-sky-500  underline">
                        <?=htmlspecialchars($note['body'])?>
                    </a>
                </li>
            <?php endforeach;?>
            </ul>
            <li class="list-none mt-6">
                <p>
                    <a href="/note/create" class="text-sky-500  underline">Create Note </a>
                </p>
            </li>
        </div>

    </main>
    <?php include __DIR__ . "/../partials/footer.php" ?>
