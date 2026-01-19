// Set minimum date for check-in to today
document.addEventListener('DOMContentLoaded', function() {
    const checkInDate = document.getElementById('check_in_date');
    const checkOutDate = document.getElementById('check_out_date');
    
    if(checkInDate) {
        // Set min date to today
        const today = new Date().toISOString().split('T')[0];
        checkInDate.setAttribute('min', today);
        
        // Update checkout min date when checkin changes
        checkInDate.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            selectedDate.setDate(selectedDate.getDate() + 1);
            const minCheckout = selectedDate.toISOString().split('T')[0];
            if(checkOutDate) {
                checkOutDate.setAttribute('min', minCheckout);
                // Clear checkout if it's before new minimum
                if(checkOutDate.value && checkOutDate.value <= this.value) {
                    checkOutDate.value = '';
                }
            }
        });
    }
    
    // Validate checkout date
    if(checkOutDate) {
        checkOutDate.addEventListener('change', function() {
            if(checkInDate && this.value <= checkInDate.value) {
                alert('Check-out date must be after check-in date');
                this.value = '';
            }
        });
    }
});

// Auto-hide success/error messages after 5 seconds
window.addEventListener('load', function() {
    const messages = document.querySelectorAll('.success-msg, .error-msg');
    messages.forEach(function(msg) {
        setTimeout(function() {
            msg.style.transition = 'opacity 0.5s';
            msg.style.opacity = '0';
            setTimeout(function() {
                msg.style.display = 'none';
            }, 500);
        }, 5000);
    });
});

// Confirm before canceling booking
function confirmCancel() {
    return confirm('Are you sure you want to cancel this booking?');
}
