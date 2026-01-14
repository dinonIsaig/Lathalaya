document.addEventListener('DOMContentLoaded', function () {
    const coverInput = document.getElementById('cover_input');
    const coverPreview = document.getElementById('cover_preview');

    if (coverInput && coverPreview) {
        coverInput.onchange = evt => {
            const [file] = coverInput.files;
            if (file) {
                coverPreview.src = URL.createObjectURL(file);
            }
        };
    }
});