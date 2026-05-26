// ===============================
// SIDEBAR ACTIVE
// ===============================

const menuLinks = document.querySelectorAll('.menu a');

menuLinks.forEach(link => {

    link.addEventListener('click', function(){

        menuLinks.forEach(item => {
            item.classList.remove('active');
        });

        this.classList.add('active');

    });

});

// ===============================
// CARD HOVER EFFECT
// ===============================

const cards = document.querySelectorAll('.card-custom');

cards.forEach(card => {

    card.addEventListener('mouseenter', () => {

        card.style.transform = 'translateY(-5px)';
        card.style.transition = '0.3s';

    });

    card.addEventListener('mouseleave', () => {

        card.style.transform = 'translateY(0px)';

    });

});

// ===============================
// HEADER SHADOW ON SCROLL
// ===============================

window.addEventListener('scroll', function(){

    const header = document.querySelector('.header');

    if(header){

        if(window.scrollY > 10){

            header.style.boxShadow =
            '0 15px 40px rgba(0,0,0,0.08)';

        }else{

            header.style.boxShadow =
            '0 10px 35px rgba(15,23,42,0.06)';

        }

    }

});

// ===============================
// PREVIEW FOTO UPLOAD
// ===============================

const fotoInput = document.getElementById('foto');
const preview = document.getElementById('preview');

if(fotoInput){

    fotoInput.addEventListener('change', function(){

        const file = this.files[0];

        if(file){

            const reader = new FileReader();

            reader.onload = function(e){

                if(preview){

                    preview.src = e.target.result;

                    preview.style.display = 'block';

                }

            }

            reader.readAsDataURL(file);

        }

    });

}

// ===============================
// TOGGLE PASSWORD
// ===============================

function togglePassword(id,icon){

    const input = document.getElementById(id);

    if(input.type === "password"){

        input.type = "text";

        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');

    }else{

        input.type = "password";

        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');

    }

}