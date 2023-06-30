<div class="position-absolute top-3 start-0 mx-2" aria-label="Menu">
  <!-- Menu "Icon -->
  <figure class="cursor-pointer m-0 open_menu" id="open_menu" onclick="openMenu()">
    <img src="images/menu.svg" title="Ouvrir le menu" alt="Menu" class="w-40" />
  </figure>
  <!-- Open Menu -->
      <nav class="bg-primary text-white p-2 d-none" aria-label="Menu Item" id="menu_items">
      <!-- Close menu icon -->
            <figure onclick="closeMenu()" class="cursor-pointer">
                <img src="images/close.svg" title="Fermer le menu" alt="Fermer" class="w-20" />
            </figure>
                <ul class="list-unstyled px-4 text-decoration-none" >
                  <li class="cursor-pointer d-flex align-items-center fw-semibold"><i class="fa-solid fa-house px-2 icon-hover"></i>Accueil</li>
                    <li class="cursor-pointer d-flex align-items-center fw-semibold">
                      <a class="text-decoration-none text-white" href="profile.php">
                      <i class="fa-solid fa-user px-2"></i>
                      Profil
                    </a>
                  </li>
                  <li class="cursor-pointer d-flex align-items-center fw-semibold"><i class="fa-solid fa-circle-info px-2"></i>A propos</li>
                    <li class="cursor-pointer d-flex align-items-center fw-semibold"><i class="fa-solid fa-lock px-2"></i>Confidentialité</li>
                      <li class="cursor-pointer d-flex align-items-center fw-semibold"><i class="fa-solid fa-right-to-bracket px-2"></i>
                        <a class="text-white text-decoration-none  " onclick="showForm()">Se connecter</a>
                      </li>
                    <li class="cursor-pointer d-flex justify-content-space-between align-items-center fw-semibold"><i class="fa-solid fa-power-off px-2"></i>
                        <a class="text-white text-decoration-none" href="template/disconnect.php">Se deconnecter</a>
                  </li>
                    <?php if (!isset($_SESSION['s_users_id'])) { ?>
                      <li class="cursor-pointer" onclick="showForm()">S'inscrire</li>
                    <?php } ?>
                    <?php if (isset($_SESSION['s_users_id'])) { ?>
                      <div class="user-avatar rounded-3 border-2 border-primary no-outline my-4 d-flex justify-content-center">
                        <?php if (!empty($_SESSION['s_avatar']) && file_exists('images/avatar/' . $_SESSION['s_avatar'])) { ?>
                          <img src="images/avatar/<?php echo $_SESSION['s_avatar']; ?>" class="imgProfil" width="50" alt="Avatar">
                        <?php } else { ?>
                          <img src="images/avatar/default-avatar.png" class="imgProfil" width="50" alt="Avatar">
                        <?php } ?>
                      </div>
                    <?php } ?>
                </ul>
      <script>
        // fonction qui enlève la classe d-none à l'id hoverSection 
        function showForm() {
          document.getElementById('hoverSection').classList.remove('d-none');
        }
      </script>
  </nav>
</div>