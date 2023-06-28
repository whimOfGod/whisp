<div class="bg-secondary-subtle search_result w-100 p-2 mb-2">
    <?php if (count($_SESSION['results']) > 0): ?>
        <?php foreach ($_SESSION['results'] as $element): ?>
        <article class="w-75 h-80 mx-auto bg-white rounded-4 px-3 py-2 mb-2" id="tweetSearch<?= $element['whisps_id']; ?>">
        <div class="row"> 
                    <!-- avatar -->
                    <div class=" col-1 d-flex flex-column align-items-center justify-content-start">
                        <!-- if the user have an avatar, we display it, autherwise the default avatar will be displayed -->
                        <?php if (!empty($_SESSION['s_avatar']) && file_exists('images/avatar/' . $_SESSION['s_avatar'])) { ?>
                            <img src="images/avatar/<?php echo $_SESSION['s_avatar']; ?>" class="imgProfil" width="25" alt="Avatar">
                        <?php } else { ?>
                            <img class="border rounded-5 d-flex aligns-item-center" src="images/avatar/default-avatar.png" class="imgProfil" width="25" alt="Avatar">
                        <?php } ?>
                    </div>
                    <!-- pseudo -->
                    <div class="col d-flex align-items-center"> 
                        <h3 class="text-primary fs-6 p-1 fw-semibold">
                            @
                            <?= $element['pseudo'] ?>
                        </h3>
                    </div>
                    <!-- tag -->
                    <div class="col-1">
                        <i class="fa-solid fa-tags w-20 pt-2 cursor-pointer float-end 
                            <?php
                                echo 'icon-color-' . $element['tag'];
                                # if the user doesn't have a tag, we display the default tag with the class icon-color-gray
                                if ($element['tag'] == null) {
                                    echo ' icon-color-gray';
                                }
                            ?>">
                        </i>
                    </div>
                    <!-- the whisp content or the post content -->
                        <p>
                            <?= $element['tweet'] ?>
                        </p>
                </div>
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