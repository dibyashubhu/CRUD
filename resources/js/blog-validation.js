$(document).ready(function () {
    $("blogForm").on("submit", function (e) {
        e.preventDefault();

        let form = $(this);

        // Remove old error styles
        form.find("input, textarea, select").removeClass("border-red-500");
        form.find(".error-message").remove();

        // Convert form to array
        let formArray = form.serializeArray();

        // Convert array → object for easy reading
        let formData = {};
        $.map(formArray, function (field) {
            formData[field.name] = field.value.trim();
        });

        // Validate Title
        if (!formData.title) {
            showError("input[name='title']", "Title is rakh rakh required");
        }

        // Validate Author Name
        if (!formData.name) {
            showError("input[name='name']", "Author name is required");
        }

        // Validate Category Text Field
        if (!formData.category) {
            showError("input[name='category']", "Category name is required");
        }

        // Validate Description
        if (!formData.description || formData.description.length < 10) {
            showError(
                "textarea[name='description']",
                "Description must be at least 10 characters"
            );
        }

        // Validate Content
        if (!formData.content || formData.content.length < 20) {
            showError(
                "textarea[name='content']",
                "Content must be at least 20 characters"
            );
        }

        // Validate Category Dropdown
        if (!formData.blog_category_id) {
            showError(
                "select[name='blog_category_id']",
                "Please select a blog category"
            );
        }

        // Validate Image
        let image = $("input[name='image']")[0];
        if (image.files.length === 0) {
            showError("input[name='image']", "Image is required");
        }

        // Stop submission if errors
        if (form.find(".error-message").length > 0) {
            return;
        }

        // If valid → console serialized data
        console.log("VALID! Data from serializeArray():", formArray);

        // Submit form
        e.currentTarget.submit();
    });

    // Helper function to show errors
    function showError(selector, message) {
        $(selector)
            .addClass("border-red-500")
            .after(
                `<p class='error-message text-red-500 text-sm mt-1'>${message}</p>`
            );
    }
});
