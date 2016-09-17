    $("#add_area").validate({
        showErrors: function(errorMap, errorList) {
            $(".form-errors").html("All fields must be completed before you submit the form.");
        }
    });