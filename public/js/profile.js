const tabs = document.querySelectorAll('.col_ratting_2 .tab .tablinks');
const tables = document.querySelectorAll('.rating');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        tables.forEach(table => {
            table.style.display = 'none'
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