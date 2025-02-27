document.addEventListener("DOMContentLoaded", function () {
    // Notification Panel Logic
	const notificationBtn = document.getElementById('notificationBtn');
	const notificationPanel = document.getElementById('notificationPanel');
	const notificationPanelClass = document.querySelector('.notification-panel');

	// Open the notification panel
	notificationBtn.addEventListener('click', (e) => {
	  e.preventDefault();  // Prevent default anchor behavior
	  notificationPanelClass.classList.add('open');
	  notificationPanel.innerHTML = `
	  <div class="notification-header">
					<h3>Notifications</h3>
					<button id="closePanel" class="close-btn">&times;</button>
				</div>
				<div class="notification-content">
					<div class="notification-item">
						<div class="notification-item-details">
							<p>Rose M. Perreras posted an announcement</p>
							<small>12/21/2024 11:17</small>
							
							<a href="#">
								 <button class="action-btn">View</button>
							</a>
						</div>	
						<span class="status-dot new"></span>
					</div>
				</div>`;

				const closePanel = document.getElementById('closePanel');
				if(closePanel){
					// Close the notification panel
					closePanel.addEventListener('click', () => {
					notificationPanelClass.classList.remove('open');
				});
				}
	});

	// Close the notification panel when clicking outside of it
	window.addEventListener('click', function (event) {
	// Check if the click target is outside both the panel and the button
	if (
		!notificationPanelClass.contains(event.target) &&
		!notificationBtn.contains(event.target)
	) {
		notificationPanelClass.classList.remove('open');
	}
	}); 
});