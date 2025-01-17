
const element_category = document.querySelector('#show__category');
const element_categorys = document.querySelectorAll('.popup__category__ml__tl')
element_category.onclick = function () {
    element_categorys.forEach(function (element) {
        if (element.style.display === 'block') {
            element.style.display = 'none';
        } else {
            element.style.display = 'block';
        }
    });
}
const backToTopButton = document.querySelector("#scroll");
window.onscroll = function () {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100)
        backToTopButton.style.display = "block";
    else backToTopButton.style.display = "none";
};


// Khi người dùng click vào nút, cuộn trang về đầu
backToTopButton.addEventListener("click", function () {
    window.scrollTo({ top: 0, behavior: "smooth" });
});

// const button_like = document.querySelector('#button_like');
// if (button_like) {
//     button_like.onclick = function () {
//         if (button_like.style.color !== "red")
//             button_like.style.color = "red"
//         else button_like.style.color = "grey"
//     }
// }

// const button_rams = document.querySelectorAll('.product_detail_right_ram button')
// if (button_rams) {
//     button_rams.forEach(element => {
//         element.onclick = function () {
//             button_rams.forEach(btn => btn.classList.remove('color_active'));
//             element.classList.add('color_active');
//         }
//     })
// }

// const button_color = document.querySelectorAll('.product_detail_right_color button')
// if (button_color) {
//     button_color.forEach(element => {
//         element.onclick = function () {
//             button_color.forEach(btn => btn.classList.remove('color_active'));
//             element.classList.add('color_active');
//         }
//     })
// }





// const button_rating = document.querySelectorAll('#button_rating button');
// if (button_rating) {
//     button_rating.forEach((element) => {
//         element.onclick = function () {
//             button_rating.forEach(element => element.classList.remove('click_active_border'));
//             this.classList.add('click_active_border');
//         }
//     });
// }

const category_search = document.querySelector('.product_search_list_category p');
if (category_search) {
    category_search.onclick = function () {
        const popup_category_search = document.querySelector('.product_search_list_category_popup');
        popup_category_search.style.display === "block" ?
            popup_category_search.style.display = "none" :
            popup_category_search.style.display = "block";
    };
}

const branch_search = document.querySelector('.product_search_list_branch p');
if (branch_search) {
    branch_search.onclick = function () {
        const popup_branch_search = document.querySelector('.product_search_list_branch_popup');
        popup_branch_search.style.display === "block" ?
            popup_branch_search.style.display = "none" :
            popup_branch_search.style.display = "block";
    };
}


//API địa chỉ trang thanh toán

//popup chat
const room_chat = document.getElementById('room_chat');
const popup_chat = document.querySelector('.chat');
const btn_close_roomchat = document.querySelector('.chat_title span');
btn_close_roomchat.addEventListener('click', function () {
    popup_chat.style.display = "none"
})
room_chat.onclick = function (event) {
    event.preventDefault();
    if (popup_chat.style.display == "block")
        popup_chat.style.display = "none"
    else popup_chat.style.display = "block"
}

const tabs = document.querySelectorAll('.tablinks');
const rates = document.querySelectorAll('.rating');
tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        tabs.forEach(element => {
            element.classList.remove('active_tab');
        })
        tab.classList.add('active_tab');
        rates.forEach(rate => {
            rate.style.display = 'none'
        })
        if (tab.textContent === 'Tất cả') {
            document.getElementById('all').style.display = 'block';
        } else if (tab.textContent === '5 sao') {
            document.getElementById('5sao').style.display = 'block'
        } else if (tab.textContent === '4 sao') {
            document.getElementById('4sao').style.display = 'block'
        } else if (tab.textContent === '3 sao') {
            document.getElementById('3sao').style.display = 'block'
        } else if (tab.textContent === '2 sao') {
            document.getElementById('2sao').style.display = 'block'
        } else if (tab.textContent === '1 sao') {
            document.getElementById('1sao').style.display = 'block'
        }
    })
})

const histories = document.querySelectorAll('.history');
tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        histories.forEach(history => {
            history.style.display = 'none'
        })
        if (tab.textContent === 'Tất cả') {
            document.getElementById('all').style.display = 'block'
        } else if (tab.textContent === 'Chờ thanh toán') {
            document.getElementById('thanhtoan').style.display = 'block'
        } else if (tab.textContent === 'Đang chuẩn bị') {
            document.getElementById('chuanbi').style.display = 'block'
        } else if (tab.textContent === 'Đang giao') {
            document.getElementById('danggiao').style.display = 'block'
        } else if (tab.textContent === 'Hoàn thành') {
            document.getElementById('hoanthanh').style.display = 'block'
        } else if (tab.textContent === 'Đã hủy') {
            document.getElementById('dahuy').style.display = 'block'
        } else if (tab.textContent === 'Trả hàng/Hoàn tiền') {
            document.getElementById('trahang').style.display = 'block'
        }
    })
})

/* handleIcon login password */
const pwd_login = document.querySelector('#password_login');
const icon_hs_pwd = document.getElementById('hide_pwd');
pwd_login.oninput = function () {
    if (pwd_login.value.length > 0) {
        icon_hs_pwd.style.display = "block";
        document.getElementById('lock_pwd').style.display = "none";
    } else {
        icon_hs_pwd.style.display = "none";
        document.getElementById('lock_pwd').style.display = "block";
    }
}

icon_hs_pwd.addEventListener('click', function () {
    if (pwd_login.type === "password") {
        pwd_login.type = "text";
        icon_hs_pwd.innerHTML = '<i class="far fa-eye">';
    }
    else {
        pwd_login.type = "password";
        icon_hs_pwd.innerHTML = '<i class="fas fa-eye-slash"></i>';
    }
})
/* handleIcon register password */
const pwd_register = document.querySelector('#password_register');
const icon_hs_pwd_register = document.getElementById('hide_pwd_register');
pwd_register.oninput = function () {
    if (pwd_register.value.length > 0) {
        icon_hs_pwd_register.style.display = "block";
        document.getElementById('lock_pwd_register').style.display = "none";
    } else {
        icon_hs_pwd_register.style.display = "none";
        document.getElementById('lock_pwd_register').style.display = "block";
    }
}
icon_hs_pwd_register.addEventListener('click', function () {
    if (pwd_register.type === "password") {
        pwd_register.type = "text";
        icon_hs_pwd_register.innerHTML = '<i class="far fa-eye">';
    }
    else {
        pwd_register.type = "password";
        icon_hs_pwd_register.innerHTML = '<i class="fas fa-eye-slash"></i>';
    }
})
/* handleIcon register password confirm*/
const pwd_confirm_register = document.querySelector('#pwd_comfirm');
const icon_hs_pwd_cf_register = document.getElementById('hide_pwd_cf_register');
pwd_confirm_register.oninput = function () {
    if (pwd_confirm_register.value.length > 0) {
        icon_hs_pwd_cf_register.style.display = "block";
        document.getElementById('lock_pwd_cf_register').style.display = "none";
    } else {
        icon_hs_pwd_cf_register.style.display = "none";
        document.getElementById('lock_pwd_cf_register').style.display = "block";
    }
}
icon_hs_pwd_cf_register.addEventListener('click', function () {
    if (pwd_confirm_register.type === "password") {
        pwd_confirm_register.type = "text";
        icon_hs_pwd_cf_register.innerHTML = '<i class="far fa-eye">';
    }
    else {
        pwd_confirm_register.type = "password";
        icon_hs_pwd_cf_register.innerHTML = '<i class="fas fa-eye-slash"></i>';
    }
})



/* hiển thị popup đăng nhập đăng ký */
const login_background_hidden = document.querySelector('.overflow_hidden_login');
const login = document.querySelector('.login');
const register = document.querySelector('.register');
login_background_hidden.onclick = function () {
    login_background_hidden.style.display = "none";
    login.style.display = "none";
    register.style.display = "none";
};

function handleLoginAuth() {
    login_background_hidden.style.display = "block";
    login.style.display = "block";
}

function handleLogin(event) {
    event.preventDefault();
    login_background_hidden.style.display = "block";
    login.style.display = "block";
}
function handleRegister() {
    login_background_hidden.style.display = "block";
    register.style.display = "block";
    login.style.display = "none";
}
function handleTargetLogin() {
    register.style.display = "none";
    login.style.display = "block";
}

/* Popup payment */
const btn_payment = document.getElementById('payment_order');
if (btn_payment) {
    const overflow_payment = document.querySelector('.overflow_payment');
    const popup_payment_cod = document.querySelector('.payment_cod');
    const popup_payment_banking = document.querySelector('.payment_banking');
    const close_popup_payment = document.querySelectorAll('.popup_payment_base p i');
    const radio_checked_method = document.getElementsByName('method_payment')
    btn_payment.onclick = function () {
        overflow_payment.style.display = "block";
        radio_checked_method.forEach((item) => {
            if (item.checked === true && item.value === "Banking") {
                popup_payment_banking.style.display = "block";
            }
            else popup_payment_cod.style.display = "block";
        })
    }
    overflow_payment.onclick = () => {
        overHiddenPopup();
    }
    close_popup_payment.forEach((item) => {
        item.onclick = () => {
            overHiddenPopup();
        }
    })
    function overHiddenPopup() {
        overflow_payment.style.display = "none";
        popup_payment_cod.style.display = "none";
        popup_payment_banking.style.display = "none";
    }
}





var btnOpen = document.querySelector('.complete-order')
var popup = document.querySelector('.popup-order')
var iconClose = document.querySelector('.close-popup')



function togglePopup(e) {
    console.log(e.target);
    popup.classList.toggle('hide');
}
if (btnOpen) {
    btnOpen.addEventListener('click', togglePopup)
    iconClose.addEventListener('click', togglePopup)
    popup.addEventListener('click', function (e) {
        if (e.target == e.currentTarget) {
            togglePopup();
        }
    })
}

