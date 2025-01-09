document.addEventListener("DOMContentLoaded", () => {
    kt(); // Khởi tạo danh sách sản phẩm
    SeachProduct(); // Gọi hàm tìm kiếm sản phẩm ngay khi tải trang
});
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

const button_like = document.querySelector('#button_like');
if (button_like) {
    button_like.onclick = function () {
        if (button_like.style.color !== "red")
            button_like.style.color = "red"
        else button_like.style.color = "grey"
    }
}

const button_rams = document.querySelectorAll('.product_detail_right_ram button')
if (button_rams) {
    button_rams.forEach(element => {
        element.onclick = function () {
            button_rams.forEach(btn => btn.classList.remove('color_active'));
            element.classList.add('color_active');
        }
    })
}

// const button_color = document.querySelectorAll('.product_detail_right_color button')
// if (button_color) {
//     button_color.forEach(element => {
//         element.onclick = function () {
//             button_color.forEach(btn => btn.classList.remove('color_active'));
//             element.classList.add('color_active');
//         }
//     })
// }

const button_minus = document.getElementById('button_minus_value');
const button_plus = document.getElementById('button_plus_value');
const input_number = document.getElementById('number_input');
if (input_number) {
    input_number.addEventListener('input', function (event) {
        // Loại bỏ tất cả các ký tự không phải là số
        if (isNaN(this.value) || this.value === "") {
            this.value = "1";
        }
    });
    button_minus.onclick = function () {
        parseInt(input_number.value) > 0 && parseInt(input_number.value) < 2 ? input_number.value = 1 :
            input_number.value = parseInt(input_number.value) - 1;
    }
    button_plus.addEventListener('click', function () {
        input_number.value = parseInt(input_number.value) + 1;
    });
}
const button_rating = document.querySelectorAll('#button_rating button');
if (button_rating) {
    button_rating.forEach((element) => {
        element.onclick = function () {
            button_rating.forEach(element => element.classList.remove('click_active_border'));
            this.classList.add('click_active_border');
        }
    });
}

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
fetch('https://esgoo.net/api-tinhthanh/1/0.htm')
    .then(response => response.json())
    .then(data => {
        let provinces = data.data;
        if (provinces !== undefined) {
            provinces.map(item => document.getElementById('provinces').innerHTML += `<option value="${item.id}">${item.full_name}</option>`);
        }
    });

function hadelChangeProvince(provinceId) {
    fetch(`https://esgoo.net/api-tinhthanh/2/${provinceId.value}.htm`)
        .then(response => response.json())
        .then(data => {
            let districts = data.data;
            document.getElementById('districts').innerHTML = '<option value="">Quận Huyện</option>';
            document.getElementById('wards').innerHTML = '<option value="">Phường xã</option>';
            if (districts !== undefined) {
                districts.map(item => document.getElementById('districts').innerHTML += `<option value="${item.id}">${item.full_name}</option>`);
            }
        });

}
function hadelChangeDistrict(districtId) {
    fetch(`https://esgoo.net/api-tinhthanh/3/${districtId.value}.htm`)
        .then(response => response.json())
        .then(data => {
            let wards = data.data;
            document.getElementById('wards').innerHTML = '<option value="">Phường xã</option>';
            if (wards !== undefined) {
                wards.map(item => document.getElementById('wards').innerHTML += `<option value="${item.code}">${item.full_name}</option>`);
            }
        });
}
//popup chat
const room_chat  = document.getElementById('room_chat');
const popup_chat = document.querySelector('.chat');
const btn_close_roomchat = document.querySelector('.chat_title span');
btn_close_roomchat.addEventListener('click',function(){
   popup_chat.style.display = "none"
})
room_chat.onclick = function(event){
    event.preventDefault();
    if(popup_chat.style.display == "block")
        popup_chat.style.display = "none"
    else popup_chat.style.display = "block"
}

const tabs = document.querySelectorAll('.tablinks');
const rates = document.querySelectorAll('.rating');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        rates.forEach(rate => {
            rate.style.display = 'none'
        })
        if (tab.textContent === 'Tất cả') {
            document.getElementById('all').style.display = 'block'
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
    } else
    {
        icon_hs_pwd.style.display = "none";
        document.getElementById('lock_pwd').style.display = "block";
    }
}

icon_hs_pwd.addEventListener('click',function(){
    if(pwd_login.type === "password"){
        pwd_login.type ="text";
        icon_hs_pwd.innerHTML = '<i class="far fa-eye">';
    }
    else {
        pwd_login.type ="password";
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
    } else
    {
        icon_hs_pwd_register.style.display = "none";
        document.getElementById('lock_pwd_register').style.display = "block";
    }
}
icon_hs_pwd_register.addEventListener('click',function(){
    if(pwd_register.type === "password"){
        pwd_register.type ="text";
        icon_hs_pwd_register.innerHTML = '<i class="far fa-eye">';
    }
    else {
        pwd_register.type ="password";
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
    } else
    {
        icon_hs_pwd_cf_register.style.display = "none";
        document.getElementById('lock_pwd_cf_register').style.display = "block";
    }
}
icon_hs_pwd_cf_register.addEventListener('click',function(){
    if(pwd_confirm_register.type === "password"){
        pwd_confirm_register.type ="text";
        icon_hs_pwd_cf_register.innerHTML = '<i class="far fa-eye">';
    }
    else {
        pwd_confirm_register.type ="password";
        icon_hs_pwd_cf_register.innerHTML = '<i class="fas fa-eye-slash"></i>';
    }
})



/* hiển thị popup đăng nhập đăng ký */
const login_background_hidden = document.querySelector('.overflow_hidden_login');
const login = document.querySelector('.login');
const register = document.querySelector('.register');
login_background_hidden.onclick = function(){
    login_background_hidden.style.display="none";
    login.style.display = "none";
    register.style.display = "none";
};

function handleLoginAuth(){
    login_background_hidden.style.display="block";
    login.style.display = "block";
}

function handleLogin(event){
    event.preventDefault();
    login_background_hidden.style.display="block";
    login.style.display = "block";
}
function handleRegister(){
    login_background_hidden.style.display="block";
    register.style.display="block";
    login.style.display = "none";
}
function handleTargetLogin(){
    register.style.display="none";
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


document.addEventListener("DOMContentLoaded", () => {
    const minusButtons = document.querySelectorAll(".minus");
    const plusButtons = document.querySelectorAll(".plus");
    const deleteButtons = document.querySelectorAll(".btn_delete_product");
    const inputFields = document.querySelectorAll("input[type='text']");

    function updateCart() {
        const rows = document.querySelectorAll("tbody tr");
        let total = 0;

        rows.forEach(row => {
            const price = parseInt(row.cells[3].textContent.replace(/\./g, "").replace("đ", ""), 10);
            const quantity = parseInt(row.cells[4].querySelector("input").value, 10);
            const subtotal = price * quantity;
            row.cells[5].textContent = `${subtotal.toLocaleString()}đ`;
            total += subtotal;
        });

        document.querySelector(".summary span").textContent = `${total.toLocaleString()}đ`;
    }

    minusButtons.forEach((btn, idx) => {
        btn.addEventListener("click", () => {
            const input = inputFields[idx];
            if (input.value > 1) {
                input.value--;
                updateCart();
            }
        });
    });

    plusButtons.forEach((btn, idx) => {
        btn.addEventListener("click", () => {
            const input = inputFields[idx];
            input.value++;
            updateCart();
        });
    });

    deleteButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            btn.closest("tr").remove();
            updateCart();
        });
    });

    updateCart();
});


var btnOpen = document.querySelector('.complete-order')
var popup = document.querySelector('.popup-order')
var iconClose = document.querySelector('.close-popup')



function togglePopup(e) {
    console.log(e.target);
    popup.classList.toggle('hide');
}
btnOpen.addEventListener('click', togglePopup)
iconClose.addEventListener('click', togglePopup)
popup.addEventListener('click', function (e) {
    if (e.target == e.currentTarget) {
        togglePopup();
    }
})

// const active_color_price = document.querySelectorAll('.product_search_list_price_popup button');
// if (active_color_price) {
//     active_color_price.forEach((element) => {
//         element.onclick = function () {
//             active_color_price.forEach(btn => btn.classList.remove('active_price'));
//             this.classList.add('active_price');
//         }
//     });
// }
function kt(){
     const products=document.querySelectorAll('.product_search_list_right_item');
    return products;
}
function SeachProduct(min = 0, max = Infinity, itemsPage = 8) {


    const products = Array.from(kt());
    const seachProduct = [];
    products.forEach(function (product) {
        const priceText = product.querySelector('.price').innerHTML;
        const price = parseInt(priceText.replace(/[^0-9]/g, ''));
        if (price >= min && price <= max) {
            seachProduct.push(product);
        } else {
            product.style.display = "none";
        }
    });

    const countPage = Math.ceil(seachProduct.length / itemsPage);
    let index = 1;

    function LoadPage(page) {
        seachProduct.forEach(product => product.style.display = "none");
        const begin = (page - 1) * itemsPage;
        const end = begin + itemsPage;
        seachProduct.slice(begin, end).forEach(product => {
            product.style.display = 'block';
        });
        LoadPageButton(countPage, page);
    }

    function LoadPageButton(countPage, index) {
        const page = document.getElementById('page');
        page.innerHTML = '';

        // Nút "Pre"
        // if(index!=1){
            const pre = document.createElement('button');
            pre.innerHTML = "Pre";
            pre.disabled = index === 1;
            pre.addEventListener('click', () => LoadPage(index - 1));
            page.appendChild(pre);



        // Nút số trang
        for (let i = 1; i <= countPage; i++) {
            const button = document.createElement('button');
            button.innerHTML = i;
            button.className = i === index ? 'active' : '';
            button.addEventListener('click', () => LoadPage(i));
            page.appendChild(button);
        }

        // Nút "Next"
        // if(index!=countPage){
            const next = document.createElement('button');
            next.innerHTML = "Next";
            next.disabled = index === countPage ;
            next.addEventListener('click', () => LoadPage(index + 1));
            page.appendChild(next);

    }
    if (seachProduct.length > 0 ) {
        LoadPage(index);
    }
    else
    {
        document.getElementById('page').innerHTML =
            '<p>Không có sản phẩm nào phù hợp.</p>';
    }
}
