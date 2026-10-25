alerts = document.getElementById('alert');

if (!alerts.innerHTML == '') {
    setTimeout(() => {
        alerts.style.transition = 'opacity 0.5 ease';
        alerts.style.transition = 0;
        setTimeout(() => {alerts.style.display = 'none'})
    }, 3000)
}