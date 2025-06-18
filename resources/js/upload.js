document.addEventListener('DOMContentLoaded', function() {
    const uploadForm = document.querySelector('form#upload-form');
    if (!uploadForm) {
        return;
    }

    uploadForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);
        const button = form.querySelector('button');
        button.disabled = true;
        button.textContent = 'Uploading...';

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            }
        })
        .then(response => {
            // As soon as the server confirms the upload, redirect to dashboard.
            // The real-time listener on the dashboard will handle the rest.
            window.location.href = '/dashboard';
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred during upload. Please try again.');
            button.disabled = false;
            button.textContent = 'Upload';
        });
    });
});
