function openMenu(){
    // Delete mobile menu if screen width greater than 1200px
    const elementToRemove = document.getElementById("mobile-menu");
    if (elementToRemove && screen.width>=1200) {
      elementToRemove.remove();
    }
    document.getElementById("open_menu").classList.add("d-none");
    if(document.getElementById("menu_items").classList.contains("d-none")){
        document.getElementById("menu_items").classList.remove("d-none");
    }
    if(document.getElementById("menu_items").classList.contains("close")){
        document.getElementById("menu_items").classList.remove("close");
    }
    document.getElementById("menu_items").classList.add("d-inline-block");
    document.getElementById("menu_items").classList.add("open");
    
    document.getElementById("menu").classList.add("d-none");

}
    //close menu 
function closeMenu(){
    document.getElementById("menu_items").classList.remove("open");
    document.getElementById("menu_items").classList.remove("d-inline-block");
    document.getElementById("menu_items").classList.add("close");
    
    setTimeout(() => {
        document.getElementById("open_menu").classList.remove("d-none");
        document.getElementById("menu_items").classList.add("d-none");
    }, 800);
}

function imageFile() {
    document.getElementById("image").classList.remove("d-none");           
}

function showTag() {
    document.getElementById("tag").classList.remove("d-none");           
}

// open the connexion window when the user click on the connexion button
function openSignUp(){
    document.getElementById("sign_in").classList.remove("d-flex");
    document.getElementById("sign_in").classList.add("d-none");           
    document.getElementById("sign_up").classList.remove("d-none")
}

// open the inscription window when the user click on the connexion button
function openSignIn(){
    document.getElementById("sign_up").classList.add("d-none");
    
    document.getElementById("sign_in").classList.remove("d-none")
}

// this function will close the connexion window when the user click on the close button
function closeSignIn(){
document.getElementById("hoverSection").classList.add("d-none");
}

// blur the background when the user click on the connexion button


if (document.getElementById('headerSection').classList.contains('blur-background-section')){
    document.getElementById('headerSection').style.filter = 'blur(5px)';
    document.getElementById('headerSection').style.pointerEvents = 'none';
}


