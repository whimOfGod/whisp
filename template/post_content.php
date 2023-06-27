<form method="POST" action="template/publish_whisp.php" enctype="multipart/form-data">
    <label class="d-flex bg-secondary-subtle p-1 w-full">
        <!-- Post message -->
        <!-- lorsque l'utilisateur n'est pas connecté, il ne peut pas publier de message -->
        <?php if (isset($_SESSION['s_pseudo'])) { ?>
            <textarea class="flex-grow-1 bg-secondary-subtle no-outline border-0" name="tweet"
                placeholder="Ecrivez quelque chose..."></textarea>
            <!-- Add image button and tag -->
            <figure class="d-flex flex-column">
                <label for="imagePost">
                    <!-- Image -->
                    <i class="fa-solid fa-image w-20 cursor-pointer icon-color-blue"></i>
                    <input type="file" name="media" id="imagePost" hidden />
                </label>
                <!-- Tag -->
                <i class="fa-solid fa-tags w-20 pt-2 cursor-pointer icon-color-orange" onclick="showTag()"></i>
            </figure>

        <?php } else { ?>
            <textarea class="flex-grow-1 bg-secondary-subtle no-outline border-0
                            d-flex align-items-center justify-content-start" name="tweet" readonly>
                        Vous devez être connecté pour publier un message
            </textarea>
        <?php } ?>

    </label>
    <div class=" d-flex justify-content-space-between">
        <!-- Image preview -->
        <img id="previewImage" src="#" alt="Aperçu" title="Aperçu" class="d-none h-40" />
        <!-- Add image button and tag -->
        <select class="d-none no-outline border-0" name="tag" id="tag">
            <option value="red">Musique</option>
            <option value="blue">Anime</option>
            <option value="green">Histoire</option>
            <option value="violet">Science</option>
        </select>
        <button type="submit" class=" btn bg-primary ms-auto my-2 px-4 py-1 rounded-5 text-white fw-semibold">
            Publier
        </button>
        <div></div>
    </div>

</form>
<!-- Flip publications up to down -->
<figure class="border-top">
    <a href="?order=asc" class="text-decoration-none">
        <i class="fa-solid fa-arrow-down fa-xl cursor-pointer icon-color-blue "></i>
    </a>
    <a href="?order=desc " class="text-decoration-none">
        <i class="fa-solid fa-arrow-up fa-xl cursor-pointer icon-color-blue "></i>
    </a>
</figure>
<!-- Publications -->
<section>
    <!-- Publication -->
    <?php foreach ($whisps as $element) { ?>
        <div class="bg-secondary-subtle d-flex justify-content-center p-2">
            <article class="w-75 bg-white rounded-4 px-3 py-2 ">
                <h3 class="text-primary fs-6 fw-semibold">
                    @
                    <?= $element['pseudo'] ?>
                    <i class="fa-solid fa-tags w-20 pt-2 cursor-pointer float-end
                        <?php
                            echo 'icon-color-' . $element['tag']
                        ?>">
                    </i>
                </h3>
                <!-- content -->
                <p>
                    <?= $element['tweet'] ?>
                </p>
                <!-- Image -->
                <?php if ($element['media']) { ?>
                    <figure class="border-top rounded cursor-pointer">
                        <img src="images/<?= $element['media'] ?>" alt="image" class="w-100 h-80">
                    </figure>
                <?php } ?>

                <!-- Delete and post date -->
                <form action="template/delete_whisp.php" method="POST">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="border-0 bg-inherit">
                            <i class="fa-solid fa-trash icon-color-red ">
                                <input type="hidden" name="supp" value="<?= $element['whisps_id'] ?>">
                            </i>
                        </button>
                        
                        <span>
                            <?= $element['date'] ?>
                        </span>
                    </div>
                </form>
            </article>
        </div>
    <?php } ?>
    <!-- si la variable de session existe, on affiche le formulaire de suppression -->
    <?php
        if (isset($_SESSION['whisps_id'])) {
            include 'confirm_delete.php';
        }
    ?>
</section>