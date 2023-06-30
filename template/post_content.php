<form method="POST"  action="template/publish_whisp.php" enctype="multipart/form-data">
    <label class="d-flex bg-secondary-subtle p-1 w-full">
        <!-- Post message -->
        <!-- lorsque l'utilisateur n'est pas connecté, il ne peut pas publier de message -->
        <?php if (isset($_SESSION['s_pseudo'])) { ?>
            <textarea class="flex-grow-1 bg-secondary-subtle no-outline border-0" name="tweet"
                      placeholder="Ecrivez quelque chose..."></textarea>
                        <script>
                                // add a local storage to save the user's post
                            <?php if (isset($_SESSION['s_pseudo'])) { ?>
                                const post = document.querySelector('textarea');
                                    post.addEventListener('input', function(whisp_draft)
                                        {
                                            localStorage.setItem('post', whisp_draft.target.value);
                                        });
                                    // when the user reload the page, the post will be saved and when he post it, the local storage will be cleared
                                    window.onload = function()
                                        {
                                            post.value = localStorage.getItem('post');
                                            localStorage.clear();
                                        } 
                            <?php } ?>
                        </script>
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
                        
            <section id="headerSection" <?php if (!isset($_SESSION['s_pseudo'])) echo 'class="blur-background-section"'; ?>>
                <!-- Publication -->
                <?php foreach ($whisps as $element) { ?>
                    <div class="bg-secondary-subtle mb-min d-flex justify-content-center p-2">
                        <article class=" zoom-animation w-75 bg-white rounded-4 px-3 py-2 ">
                            <!-- that div have a row class that will display the information pf the connected user,it'll be divide in three -->
                            <div class="row"> 
                                <!-- avatar -->
                                <div class="  col-1 d-flex flex-column align-items-center justify-content-start">
                                    <!-- if the user have an avatar, we display it, autherwise the default avatar will be displayed -->
                                    <?php if (!empty($_SESSION['s_avatar']) && file_exists('images/avatar/' . $_SESSION['s_avatar'])) { ?>
                                        <img src="images/avatar/<?php echo $_SESSION['s_avatar']; ?>" class="imgProfil" width="25" alt="Avatar">
                                    <?php } else { ?>
                                        <img class="border rounded-5 d-flex aligns-item-center" src="images/avatar/default-avatar.png" class="imgProfil" width="25" alt="Avatar">
                                    <?php } ?>
                                </div>
                                <!-- pseudo -->
                                <div class=" image-render col d-flex align-items-center"> 
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
                            <?php if ($element['media']) { ?>
                                <figure class="border-top rounded cursor-pointer">
                                    <img src="images/<?= $element['media'] ?>" alt="image" class="w-100 h-80">
                                </figure>
                            <?php } ?>

                            <!-- Delete and post date -->               
                            <form action="template/delete_whisp.php" method="POST">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="submit" class="border-0 bg-inherit">
                                        <?php if (isset($_SESSION['s_pseudo']) && $_SESSION['s_pseudo'] == $element['pseudo']) { ?>
                                            <i class="fa-solid fa-trash icon-color-red "></i>
                                        <?php } ?>
                                        <input type="hidden" name="supp" value="<?= $element['whisps_id'] ?>">
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