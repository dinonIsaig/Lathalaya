document.addEventListener('DOMContentLoaded', function () {
    // Select both success and error alerts
    const alerts = [
        document.getElementById('alert-success'),
        document.getElementById('alert-error')
    ];

    alerts.forEach(alert => {
        if (alert) {
            
            setTimeout(() => {
                alert.style.opacity = '0';
                
                setTimeout(() => {
                    alert.remove();
                }, 500); 
            }, 5000); // 5000ms = 5 seconds
        }
    });
});
