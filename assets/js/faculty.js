$(document).ready(function() {
    loadFaculty();
});

function loadFaculty() {
    $.ajax({
        url: 'http://localhost/GitHub/facultyportal/index.php/common_controllers/FacultyDetails/getFaculty', 
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            console.log('AJAX success (Faculty Data):', result);

            if (Array.isArray(result)) {
                let loggedUserId = $('#logged_in_user').val(); // Hidden input storing logged user ID
                let facultyFullName = $('#full_name'); // Default text if no match is found

                result.forEach(function(faculty) {
                    if (faculty.id == loggedUserId) {
                        facultyFullName.text(faculty.full_name); // Get the logged-in faculty's full name
                    }
                });

            } else {
                console.error('Expected an array but received:', result);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching faculty:', error);
        }
    });
}
