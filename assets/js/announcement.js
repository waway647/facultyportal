$(document).ready(function() {
    // Load the CSS file when the script runs

    fetchAnnouncements(); // Fetch all Announcements on page load

    $('#searchInput').on('keypress', function(event) {
        if (event.which == 13) {  // Enter key is pressed
            var searchTerm = $(this).val().trim();  // Get and trim the search term from the input field

            // Check if there's a search term
            if (searchTerm === '') {
                // Hide the search display if there's no search term
                $('.searchDisplay1').removeClass('show'); // Remove 'show' class
            } else {
                // Display the search term on the left side of the search bar
                $('#searchDisplay1').text(searchTerm);  // Display the search term in the h6 element
                
                // Show the search display by adding 'show' class
                $('.searchDisplay1').addClass('show');  // Add 'show' class to display it as flex
            }

            $('#sortSelect').val('');  // Reset the sort order
            $('#sortDate').val('');  // Reset the sort date
            // Call the function to fetch consultations with the search term
            fetchAnnouncementsBySearch(searchTerm);  
        }
    });

    $('#sortSelect').on('change', function() {
        var sortOrder = $(this).val();  // Get the selected sort order

        $('#searchInput').val('');  // Reset the search input
        $('#sortDate').val('');  // Reset the sort date	
        // Call the function to fetch consultations with the sort order
        fetchAnnouncementsBySort(sortOrder);
    });

    $('#sortDate').on('change', function() {
        var sortDate = $(this).val();  // Get the selected date

        $('#searchInput').val('');  // Reset the search input
        $('#sortSelect').val('');  // Reset the sort order
        // Call the function to fetch consultations with the sort date
        fetchAnnouncementsByDate(sortDate);
    });
});

// Function to fetch announcements via AJAX
function fetchAnnouncements() {
    $.ajax({
        url: 'http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/getAnnouncements',
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            console.log('AJAX success (Announcements):', result);
            if (result.announcements && Array.isArray(result.announcements)) {
                if (result.announcements.length === 0) {
                    $('#announcementList tbody').html('<tr><td colspan="4">No announcements found.</td></tr>');
                } else {
                    createAnnouncementsTable(result.announcements, result.role_name); // Pass role_name
                }
            } else {
                console.error('Expected an array of announcements but received:', result);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching Announcements:', error);
        }
    });
}

function fetchAnnouncementsBySearch(query = '') {
    $.ajax({
        url: 'http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/getAnnouncements',
        type: 'GET',
        data: { search: query },
        dataType: 'json',
        success: function(result) {
            console.log('AJAX success (Announcements):', result);
            if (result.announcements && Array.isArray(result.announcements)) {
                if (result.announcements.length === 0) {
                    $('#announcementList tbody').html('<tr><td colspan="4">No announcements found.</td></tr>');
                } else {
                    createAnnouncementsTable(result.announcements, result.role_name);
                }
            } else {
                console.error('Expected an array of announcements but received:', result);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching Announcements:', error);
        }
    });
}

function fetchAnnouncementsBySort(sortOrder = '') {
    $.ajax({
        url: 'http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/getAnnouncements',
        type: 'GET',
        data: { sort: sortOrder },
        dataType: 'json',
        success: function(result) {
            console.log('AJAX success (Announcements):', result);
            if (result.announcements && Array.isArray(result.announcements)) {
                if (result.announcements.length === 0) {
                    $('#announcementList tbody').html('<tr><td colspan="4">No announcements found.</td></tr>');
                } else {
                    createAnnouncementsTable(result.announcements, result.role_name);
                }
            } else {
                console.error('Expected an array of announcements but received:', result);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching Announcements:', error);
            $('#announcementList tbody').html('<tr><td colspan="4">Error loading announcements.</td></tr>');
        }
    });
}

function fetchAnnouncementsByDate(sortDate = '') {
    $.ajax({
        url: 'http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/getAnnouncements',
        type: 'GET',
        data: { date: sortDate },
        dataType: 'json',
        success: function(result) {
            console.log('AJAX success (Announcements):', result);
            if (result.announcements && Array.isArray(result.announcements)) {
                if (result.announcements.length === 0) {
                    $('#announcementList tbody').html('<tr><td colspan="4">No announcements found.</td></tr>');
                } else {
                    createAnnouncementsTable(result.announcements, result.role_name);
                }
            } else {
                console.error('Expected an array of announcements but received:', result);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching Announcements:', error);
            $('#announcementList tbody').html('<tr><td colspan="4">Error loading announcements.</td></tr>');
        }
    });
}

// Function to generate dropdown based on role
function generateDropdown(item, role_name) {
    if (role_name === 'Department Chair') {
        return `
            <div class="dropdown-menu" id="dropdown-${item.id}" style="display: none;">
                <a href="http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/edit/${item.id}" class="dropdown-item">Edit</a>
                <a href="#" class="dropdown-item delete-btn" data-id="${item.id}">Delete</a>
            </div>
        `;
    } else {
        // For Faculty, show a dropdown with no actionable items (or omit entirely)
        return `
            <div class="dropdown-menu" id="dropdown-${item.id}" style="display: none;">
                <a href="#" class="dropdown-item disabled">View Only</a>
            </div>
        `;
    }
}

// Function to create the table with announcement data
function createAnnouncementsTable(result, role_name) {
    $('#announcementList tbody').empty();  // Clear existing rows
    var sno = `<input type="checkbox" class="checkbox">`;  // Initialize serial number
    result.forEach(function(item) {
        // Split created_at into date and time
        var dateTime = new Date(item.created_at);
        
        // Format the date with alphabetical month
        var date = dateTime.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long', 
            day: '2-digit'
        }).replace(/,/, ','); 

        // Format the time
        var time = dateTime.toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true, 
            timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone 
        });

        var editedText = '';
        if (item.updated_at) {
            var updatedDateTime = new Date(item.updated_at);
            var updatedDate = updatedDateTime.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: '2-digit',
            }).replace(/,/, ',');
            var updatedTime = updatedDateTime.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true,
                timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone 
            });
            editedText = `<span class="edited-text">(Edited - ${updatedDate} | ${updatedTime})</span>`;
        }

        var tr = `
            <tr>
                <td>${sno}</td>
                <td>
                    <div class="date-time-container">
                        <p>${date}</p>
                        <p>${time}</p>
                    </div>
                </td>
                <td>
                    <div class="announcement-container">
                        <p>${item.from} ${editedText}</p>
                        <p>${item.title}</p>
                    </div>
                </td>
                <td>
                    <div class="action-container">
                        <a href="http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/view/${item.id}" class="announcementBtn">Details</a>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-id="${item.id}">
                                <img src="http://localhost/GitHub/facultyportal/assets/images/icon/more.png" alt="More Options">
                            </a>
                            ${generateDropdown(item, role_name)}
                        </div>				
                    </div>
                </td>
            </tr>
        `;

        $('#announcementList tbody').append(tr);  // Append the new row to the table body
    });

    // Add event listeners for dropdown toggles
    document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');
            const dropdownMenu = document.getElementById(`dropdown-${id}`);

            // Hide all other dropdowns
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu.id !== `dropdown-${id}`) {
                    menu.style.display = 'none';
                    document.body.appendChild(menu); // Move back to body if needed
                }
            });

            // Move the dropdown to the body to break stacking context
            const toggleRect = this.getBoundingClientRect();
            document.body.appendChild(dropdownMenu);
            dropdownMenu.style.position = 'fixed'; // Use fixed positioning relative to viewport
            dropdownMenu.style.top = `${toggleRect.bottom + 5}px`; // Position below the toggle
            dropdownMenu.style.left = `${toggleRect.left - dropdownMenu.offsetWidth}px`; // Align to the right of the toggle
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });
    });

    // Add event listener to close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.style.display = 'none';
            });
        }
    });

    // Add event listeners for delete buttons
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this announcement?')) {
                // Perform DELETE request via AJAX
                fetch(`http://localhost/GitHub/facultyportal/index.php/common_controllers/Announcements/delete/${id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Announcement deleted successfully.');
                        // Reload the table or remove the row
                        location.reload();
                    } else {
                        alert('Failed to delete announcement: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the announcement.');
                });
            }
        });
    });
}

// File attachment handling
const attachmentInput = document.getElementById("announcement_attachment");
const attachmentPreview = document.getElementById("announcement_attachment_preview");
let attachedFiles = []; // Store uploaded files dynamically

// Configuration for file validation (matching backend constraints)
const MAX_FILE_SIZE = 32 * 1024 * 1024; // 32MB in bytes
const ALLOWED_TYPES = [
    "image/jpeg",
    "image/jpg",
    "image/png",
    "application/pdf",
    "application/msword",
    "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
];
const MAX_FILES = 10; // Maximum number of files allowed (adjust as needed)

attachmentInput.addEventListener("change", function () {
    const newFiles = Array.from(attachmentInput.files);

    // Check total number of files (existing + new)
    if (attachedFiles.length + newFiles.length > MAX_FILES) {
        alert(`You can only upload a maximum of ${MAX_FILES} files.`);
        attachmentInput.value = ""; // Clear input to allow re-selection
        return;
    }

    // Validate and process each new file
    newFiles.forEach((file) => {
        // Check if file is already attached
        if (attachedFiles.some((attachedFile) => attachedFile.name === file.name)) {
            alert(`File "${file.name}" is already attached.`);
            return;
        }

        // Validate file type
        if (!ALLOWED_TYPES.includes(file.type)) {
            alert(`File "${file.name}" has an invalid type. Allowed types: jpg, jpeg, png, pdf, doc, docx.`);
            return;
        }

        // Validate file size
        if (file.size > MAX_FILE_SIZE) {
            alert(`File "${file.name}" exceeds the maximum size of 32MB.`);
            return;
        }

        // Add file to the list of attached files
        attachedFiles.push(file);

        // Create preview item
        const previewItem = document.createElement("div");
        previewItem.className = "attachment-preview-item";

        if (file.type.startsWith("image/")) {
            // Display image preview
            const img = document.createElement("img");
            img.src = URL.createObjectURL(file);
            img.alt = file.name;
            img.style.maxWidth = "50px"; // Limit image size in preview
            img.style.maxHeight = "50px";
            img.onload = function () {
                URL.revokeObjectURL(img.src); // Free memory
            };
            previewItem.appendChild(img);
        } else {
            // Display an icon or placeholder for non-image files
            const icon = document.createElement("span");
            icon.textContent = "📄"; // Use an emoji or icon for non-image files
            icon.style.fontSize = "24px";
            previewItem.appendChild(icon);
        }

        // Display file name
        const fileName = document.createElement("span");
        fileName.textContent = file.name;
        fileName.style.display = "block";
        fileName.style.maxWidth = "100px"; // Limit width to prevent overflow
        fileName.style.overflow = "hidden";
        fileName.style.textOverflow = "ellipsis";
        fileName.style.whiteSpace = "nowrap";
        previewItem.appendChild(fileName);

        // Display file size
        const fileSize = document.createElement("span");
        fileSize.textContent = `(${(file.size / (1024 * 1024)).toFixed(2)}MB)`;
        fileSize.style.fontSize = "12px";
        fileSize.style.color = "#666";
        previewItem.appendChild(fileSize);

        // Add a remove button for each file
        const removeButton = document.createElement("button");
        removeButton.textContent = "Remove";
        removeButton.className = "remove-file-btn";
        removeButton.onclick = function () {
            // Remove file from the list of attached files
            attachedFiles = attachedFiles.filter((f) => f.name !== file.name);
            previewItem.remove();
        };
        previewItem.appendChild(removeButton);

        // Add preview item to the container
        attachmentPreview.appendChild(previewItem);
    });

    // Reset file input to allow re-uploading the same file if removed
    attachmentInput.value = "";
});

// Ensure form submission includes the attached files
const form = document.querySelector("#addAnnouncement"); // Use the correct form ID
form.addEventListener("submit", function (event) {
    // Prevent submission if no files are attached (if required)
    // Uncomment if you want to enforce at least one file
    // if (attachedFiles.length === 0) {
    //     alert("Please attach at least one file.");
    //     event.preventDefault();
    //     return;
    // }

    // Re-add the attached files to the input for submission
    if (attachedFiles.length > 0) {
        const dataTransfer = new DataTransfer();
        attachedFiles.forEach((file) => {
            dataTransfer.items.add(file);
        });
        attachmentInput.files = dataTransfer.files; // Set the file input to include attached files
    }
});