document.addEventListener("DOMContentLoaded", function() {
    var countdownEndTime = localStorage.getItem('countdownEndTime');

    // If no countdown end time is found, do nothing
    if (!countdownEndTime) return;

    // Parse the countdown end time to an integer
    countdownEndTime = parseInt(countdownEndTime, 10);

    // Get the alert element
    var alertElement = document.querySelector('.end-offer-alert');

    function updateCountdown() {
        var currentTime = Math.floor(Date.now() / 1000); // Current timestamp in seconds
        var remainingTime = countdownEndTime - currentTime;

        // Show alert if time has expired
        if (remainingTime <= 0) {
            clearInterval(countdownInterval); // Stop the countdown
            remainingTime = 0; // Ensure it doesn't go negative
            alertElement.style.display = 'block'; // Show the alert
        } else {
            alertElement.style.display = 'none'; // Hide the alert
        }

        // Calculate days, hours, minutes, and seconds
        var days = Math.floor(remainingTime / (60 * 60 * 24));
        var hours = Math.floor((remainingTime % (60 * 60 * 24)) / (60 * 60));
        var minutes = Math.floor((remainingTime % (60 * 60)) / 60);
        var seconds = remainingTime % 60;

        // Update the UI with the remaining time
        document.getElementById("days").textContent = days;
        document.getElementById("hours").textContent = hours;
        document.getElementById("minutes").textContent = minutes;
        document.getElementById("seconds").textContent = seconds;
    }

    // Update the countdown every second
    var countdownInterval = setInterval(updateCountdown, 1000);

    // Initial call to display the countdown immediately
    updateCountdown();
});