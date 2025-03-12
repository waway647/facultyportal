// Fetch notifications from the server
function fetchNotifications() {
    $.ajax({
        url: 'http://localhost/GitHub/facultyportal/index.php/common_controllers/Notifications/getNotifications',
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            console.log('AJAX success (Notification Data):', result);
            if (Array.isArray(result)) {
                slideNotificationPanel(result); // Pass the fetched data
            } else {
                console.error('Expected an array but received:', result);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching notifications:', error);
        }
    });
}

// Render notifications dynamically
function slideNotificationPanel(notifications) {
    const notificationPanel = $("#notificationPanel");
    const notificationBtn = document.getElementById('notificationBtn');
    const notificationPanelClass = document.querySelector('.notification-panel');
    const navLink = notificationBtn.querySelector('.nav-link'); // Target the nav-link inside the button
    const textWrapper = notificationBtn.querySelector('.text-wrapper-4');

    // Build notification HTML using the fetched data
    let html = `
        <div class="notification-header">
            <h3>Notifications</h3>
            <button id="closePanel" class="close-btn">×</button>
        </div>
        <div class="notification-content">`;

    notifications.forEach(notif => {

            var dateTime = new Date(notif.created_at);
			
			// Format the date with alphabetical month
			var date = dateTime.toLocaleDateString('en-US', {
				year: 'numeric',
				month: 'long', // 'short' for abbreviated month (e.g., "Feb"), use 'long' for full month (e.g., "February")
				day: '2-digit'
			}).replace(/,/, ','); // e.g., "Feb 28 2025"

			// Format the time
			var time = dateTime.toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true, // Use 12-hour format with AM/PM
            timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone // User's local time zone
        	});

        html += `
            <div class="notification-item">
                <div class="notification-item-details">
                    <h4>${notif.title || 'No message'}</h4>
                    <small>${notif.posted_by || 'Posted by Unknown'}</small>
                    <small>${date || 'Unknown date'} | ${time || 'Unknown date'}</small>
                    <a href="http://localhost/GitHub/facultyportal/index.php/chairperson_controllers/Announcements/view/${notif.id}">
                        <button class="action-btn">View</button>
                    </a>
                </div>
                <span class="status-dot ${notif.status === 'unread' ? 'new' : ''}"></span>
            </div>`;
    });

    html += `</div>`;
    notificationPanel.html(html);

    // Open panel on button click and toggle active class
    notificationBtn.addEventListener('click', (e) => {
        e.preventDefault();
        if (notificationPanelClass.classList.contains('open')) {
            notificationPanelClass.classList.remove('open');
            navLink.classList.remove('active'); // Remove active when closing
            textWrapper.classList.remove('highlight');
        } else {
            notificationPanelClass.classList.add('open');
            navLink.classList.add('active'); // Add active when opening
            textWrapper.classList.add('highlight');
        }
    });

    // Close panel on close button click and revert class
    const closePanel = document.getElementById('closePanel');
    if (closePanel) {
        closePanel.addEventListener('click', () => {
            notificationPanelClass.classList.remove('open');
            navLink.classList.remove('active'); // Revert to nav-link
            textWrapper.classList.remove('highlight');
        });
    }

    // Close panel when clicking outside and revert class
    window.addEventListener('click', (event) => {
        if (
            !notificationPanelClass.contains(event.target) &&
            !notificationBtn.contains(event.target)
        ) {
            notificationPanelClass.classList.remove('open');
            navLink.classList.remove('active'); // Revert to nav-link
            textWrapper.classList.remove('highlight');
        }
    });
}

// Call fetchNotifications when the page loads
$(document).ready(function() {
    fetchNotifications();
});