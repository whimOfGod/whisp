<div id="floatingModal" > 
    <form id="floating-form-id" method="POST" action="template/publish_whisp.php" enctype="multipart/form-data" style="display:none;" >                            
        <label class="d-flex bg-secondary-subtle p-1 w-full">
            <!-- Post message -->
            <!-- lorsque l'utilisateur n'est pas connecté, il ne peut pas publier de message -->
            <?php if (isset($_SESSION['s_pseudo'])) { ?>
                <textarea class="flex-grow-1 bg-secondary-subtle no-outline border-0" name="tweet"
                        placeholder="Ecrivez quelque chose..."></textarea>
                            <script>
                                    // add a local storage to save the user's post
                                <?php if (isset($_SESSION['s_pseudo'])) { ?>
                                    const floatPost = document.querySelector('textarea');
                                        post.addEventListener('input', function(whisp_draft)
                                            {
                                                localStorage.setItem('floatPost', whisp_draft.target.value);
                                            });
                                        // when the user reload the page, the post will be saved and when he post it, the local storage will be cleared
                                        window.onload = function()
                                            {
                                                floatPost.value = localStorage.getItem('floatPost');
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

        <script>
            // floating button
                // getting the elements by selecting the id
                const floatingIcon = document.getElementById("floatingPostButton");
                const floatingPostForm = document.getElementById("floating-form-id");
                    // adding an event which will react to the click on the floating icon
                floatingIcon.addEventListener('click', function() {
                    // firstly verify if there is a display none style on the form
                    if (floatingPostForm.style.display === 'none') {
                        // if true, we replace the display none style by 'block' to show the form
                        floatingPostForm.style.display = 'block';
                    } else {
                        // replacing the display attribute value by adding a display none style
                        floatingPostForm.style.display = 'none';
                    }
                });
        </script>
    </form>
</div>
