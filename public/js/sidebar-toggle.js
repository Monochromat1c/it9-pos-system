const checkbox = document.getElementById('check');
const sidebar = document.getElementById('sidebar');
const content = document.querySelector('.content');
const overlay = document.createElement('div');
overlay.classList.add('overlay');

checkbox.addEventListener('change', function () {
    if (this.checked) {
        sidebar.classList.add('show-sidebar');
        overlay.style.display = 'block';
        document.body.style.overflow = 'hidden';
    } else {
        sidebar.classList.remove('show-sidebar');
        overlay.style.display = 'none';
        document.body.style.overflow = '';
    }
});

document.body.appendChild(overlay);
