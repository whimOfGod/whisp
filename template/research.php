<div class="bg-secondary-subtle search_result w-100 p-2 mb-2">
    <?php if (count($_SESSION['results']) > 0): ?>
        <?php foreach ($_SESSION['results'] as $element): ?>
        <article class="w-75 mx-auto bg-white rounded-4 px-3 py-2 mb-2" id="tweetSearch<?= $element['whisps_id']; ?>">
            <h3 class="text-primary fs-4 fw-bold <?= $query ?>">
                <i class="fa-solid fa-tags w-20 pt-2 cursor-pointer icon-color-<?= $element['tag'] ?>"></i>
                <?= $element['pseudo']; ?>
            </h3>
            <!-- content -->
            <p>
                <?= $element['tweet']; ?>
            </p>
            <!-- Image -->
            <?php if ($element['media']): ?>
                <figure class="border-top rounded cursor-pointer">
                    <img src="images/<?= $element['media'] ?>" alt="image" class="w-100 h-80">
                </figure>
            <?php endif; ?>

            <!-- Delete and post date -->
            <form action="template/delete_whisp.php" method="POST">
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="border-0 bg-inherit">
                        <i class="fa-solid fa-trash icon-color-red">
                            <input type="hidden" name="supp" value="<?= $element['whisps_id'] ?>">
                        </i>
                    </button>
                    <span><?= $element['date'] ?></span>
                </div>
            </form>
        </article>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun tweet trouvé.</p>
    <?php endif; ?>
</div>