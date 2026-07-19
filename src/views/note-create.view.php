
    <?php include "partials/head.php"?>
    <?php include "partials/nav.php"?>
    <?php include "partials/banner.php"?>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
<!--            <form method="post">-->
<!--                <label for="body" class="top-label">Note</label>-->
<!--                <div>-->
<!--                    <textarea id="body" name="body"></textarea>-->
<!--                </div>-->
<!--                <p><button type="submit">Save</button></p>-->
<!--            </form>-->
            <form method="post">
                <div class="space-y-4">
                    <div class="pb-12 w-1/2">
                            <div class="col-span-full block ">
                                <label for="body" class="block text-sm/6 font-medium text-gray-900">Note</label>
                                <div class="mt-2">
                                    <textarea id="body" name="body" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"><?= isset($_POST['body']) && !empty($errors['body']) ? $_POST['body'] : '' ?></textarea>
                                </div>
                                <?php if (isset($errors['body'])):?>
                                <div class="text-red-500 text-sm"><?=$errors['body']?></div>
                                <?php endif?>
                            </div>

                            <div class="mt-4 flex items-center justify-end gap-x-6">
                                <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                            </div>
                    </div>
                </div>
            </form>

        </div>

    </main>
    <?php include "partials/footer.php"?>
