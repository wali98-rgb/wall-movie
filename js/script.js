// Toggle Class Active
function aktif() {
    const sidebar = document.querySelector('.sidebar')
    
    // Saat hamburger di klik
    document.querySelector('#hamburger').onclick = () => {
        sidebar.classList.toggle('sidebar-active')
    }

    // Saat diklik diluar navbar, sidebarnya ilang
    const hamburger = document.querySelector('#hamburger')
    
    document.addEventListener('click', function(event) {
        if (!hamburger.contains(event.target) && !sidebar.contains(event.target)) {
            sidebar.classList.remove('sidebar-active')
        }
    })
}