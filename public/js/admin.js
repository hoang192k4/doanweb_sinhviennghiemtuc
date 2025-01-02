const menu = document.querySelectorAll('.menu div');
const contents = document.querySelectorAll('.content');
menu.forEach(page => {
    page.addEventListener('click', () => {
        menu.forEach(m => m.classList.remove('active'))
        page.classList.add('active')
        contents.forEach(content => {
            content.style.display = 'none'
        })
        if (page.textContent === 'Trang Dashboard') {
            document.getElementById('dashboard').style.display = 'block'
        } else if (page.textContent === 'Quản lý Danh mục') {
            document.getElementById('danhmuc').style.display = 'block'
        } else if (page.textContent === 'Quản lý Sản phẩm') {
            document.getElementById('sanpham').style.display = 'block'
        } else if (page.textContent === 'Quản lý Đơn hàng') {
            document.getElementById('donhang').style.display = 'block'
        } else if (page.textContent === 'Quản lý Thống kê') {
            document.getElementById('thongke').style.display = 'block'
        } else if (page.textContent === 'Quản lý Đánh giá') {
            document.getElementById('danhgia').style.display = 'block'
        } else if (page.textContent === 'Quản lý Liên hệ') {
            document.getElementById('lienhe').style.display = 'block'
        }
    })
})

const tabs = document.querySelectorAll('.tabs div');
const tables = document.querySelectorAll('.table');
tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'))
        tab.classList.add('active')
        tables.forEach(table => {
            table.style.display = 'none'
        })
        if (tab.textContent === 'Chuẩn bị') {
            document.getElementById('chuanbi').style.display = 'block'
        } else if (tab.textContent === 'Vận chuyển') {
            document.getElementById('vanchuyen').style.display = 'block'
        } else if (tab.textContent === 'Thành công') {
            document.getElementById('thanhcong').style.display = 'block'
        } else if (tab.textContent === 'Trả hàng') {
            document.getElementById('trahang').style.display = 'block'
        } else if (tab.textContent === 'Đã hủy') {
            document.getElementById('dahuy').style.display = 'block'
        } else if (tab.textContent === 'Chưa liên hệ') {
            document.getElementById('chualh').style.display = 'block'
        } else if (tab.textContent === 'Đã liên hệ') {
            document.getElementById('dalh').style.display = 'block'
        } else if (tab.textContent === 'Chờ duyệt') {
            document.getElementById('choduyet').style.display = 'block'
        } else if (tab.textContent === 'Tạm ẩn') {
            document.getElementById('taman').style.display = 'block'
        }
    })
})

function popup(name) {
    if (name == 'dm') {
        document.getElementById('popupdm').style.display = 'block'
    } else if (name == 'huy') {
        document.getElementById('popuphuy').style.display = 'block'
    } else if (name == 'xoa') {
        document.getElementById('popupxoa').style.display = 'block'
    } else if (name == 'dg') {
        document.getElementById('popupdg').style.display = 'block'
    } else if (name == 'lh') {
        document.getElementById('popuplh').style.display = 'block'
    }else if (name == 'duyet') {
        document.getElementById('popupduyet').style.display = 'block'
    }
}

function cancel(name) {
    if (name == 'dm') {
        document.getElementById('popupdm').style.display = 'none'
    } else if (name == 'sp') {
        document.getElementById('popupsp').style.display = 'none'
    } else if (name == 'huy') {
        document.getElementById('popuphuy').style.display = 'none'
    } else if (name == 'xoa') {
        document.getElementById('popupxoa').style.display = 'none'
    } else if (name == 'dg') {
        document.getElementById('popupdg').style.display = 'none'
    } else if (name == 'lh') {
        document.getElementById('popuplh').style.display = 'none'
    } else if (name == 'duyet') {
        document.getElementById('popupduyet').style.display = 'none'
    }
}
