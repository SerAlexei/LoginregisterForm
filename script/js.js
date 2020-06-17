$(document).ready(function () {
    $(".text-center > label").hover(function () { // задаем функцию при наведении курсора на элемент
        $('.rememder_hover').css('display', 'block')
    }, function () { // задаем функцию, которая срабатывает, когда указатель выходит из элемента
        $('.rememder_hover').css('display', 'none')
    });

    let form2 = document.querySelector('.myform2'),
        form1 = document.querySelector('.myform1'),
        fields2 = form2.querySelectorAll('.user_name'),
        email = form2.querySelectorAll('.email'),
        password2 = form2.querySelectorAll('.password'),
        reg_pass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/,
        reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    $('.button_sign_in').on('click', function (event) {
        event.preventDefault();
        let valid = true;
        $('.form-group > .before').css('opacity', 0);
        $('.form-group > .after').css('opacity', 0);
        if (reg.test(email[0].value) === false) {
            // alert('Введите корректный e-mail');
            $('.email_up_before').css('opacity', 1);
            valid = false;
        }else {
            $('.email_up_after').css('opacity', 1);
        }
        if (!fields2[0].value || fields2[0].value.length < 10) {
            console.log('Please fill in the field');
            $('.user_name_up_before').css('opacity', 1);
            valid = false;
        }else {
            $('.user_name_up_after').css('opacity', 1);
        }
        if (reg_pass.test(password2[0].value) === false) {
            // alert('Введите корректный password');
            $('.password_up_before').css('opacity', 1);
            valid = false;
        } else {
            $('.password_up_after').css('opacity', 1);
        }
        if(valid===true){
            form2.submit();
        }
    });
    $('.button_login').on('click', function (event) {
        event.preventDefault();
        form1.submit();
    })
});