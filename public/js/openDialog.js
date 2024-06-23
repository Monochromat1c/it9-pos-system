function openDialog(action, genderId, genderName) {
    console.log('Gender ID:', genderId); // Check the value of genderId
    // Show the appropriate dialog based on action
    if (action === 'show') {
        document.getElementById('showDialogTitle').textContent = 'View Gender';
        document.getElementById('showDialog').showModal();
        document.getElementById('showGender').value = genderName; // Use unique ID for "show" dialog
    } else if (action === 'edit') {
        document.getElementById('editDialogTitle').textContent = 'Edit Gender';
        document.getElementById('editDialog').showModal();
        document.getElementById('editGender').value = genderName; // Use unique ID for "edit" dialog
        // Set the form action to include the gender ID
        document.getElementById('gender-form').action =
            '/gender/update/' + genderId;
    } else if (action === 'delete') {
        document.getElementById('deleteDialogTitle').textContent =
            'Delete Gender';
        document.getElementById('deleteDialog').showModal();
        document.getElementById('deleteGender').value = genderName; // Use unique ID for "delete" dialog
        // Set the form action to include the gender ID
        document.getElementById('deleteDialogForm').action =
            '/gender/destroy/' + genderId;
    }
}
