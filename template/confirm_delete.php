<?php 
    if ($_SESSION['whisps_id']) { ?>
<section class="bg-black-transparent position-fixed start-0 top-0 w-100 h-100
                d-flex align-items-center justify-content-center"
                id="delete_form">
        <!-- un bouton pour fermer la section -->
        <button class="btn bg-danger text-white position-absolute top-0 end-0 m-4"
         onclick="closeDelete()">Fermer</button> 
    <div>
        <!-- Login form -->
        <div class="rounded-3 bg-white border border-info p-5 h-full">
            <form   class="d-flex flex-column" action="template/confirm_delete_action.php" method="POST">
                <h3 class="fw-bold fs-5"> Voulez vous vraiment supprimer ce poste ?</h3>
                <input type="hidden" name="supp" value="<?= $_SESSION['whisps_id'] ?>">
                <input type="submit" value="supprimer" class="my-3 bg-primary py-1 text-white border-0 rounded-3" />
            </form>
        </div>
    </div>
    <script>
        function closeDelete(){
                document.getElementById("delete_form").classList.add("d-none");
        }
    </script>
</section>
<?php } ?>