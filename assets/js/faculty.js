$(document).ready(function() {
    loadFaculty();
});

function loadFaculty() {
    $.ajax({
        url: '/GitHub/facultyportal/index.php/common_controllers/FacultyDetails/getFaculty',
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            console.log('AJAX success (Faculty Data):', result);
            if (result) {
                // Directly assign full_name and email to the respective divs
                $('#full_name').text(result.full_name);
                $('.text-wrapper-6').text(result.email); // Assuming the response includes an 'email' field
            } else {
                console.error('Invalid data received:', result);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching faculty:', error);
        }
    });
}