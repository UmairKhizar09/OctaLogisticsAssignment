<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Delivery Form</title>
</head>

<body>
    <div class="container mt-5">
        <form method="POST" action="{{ url()->current() }}" id="myForm">
            @csrf
            <div class="row ">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <h1><strong>Book a Collection / Delivery</strong></h1>
                    <h3 style="text-align: center;" class="mb-5">From Any Store to Your Door.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="collectionPostalCode">Collection Postal Code</label>
                    <input type="text" class="form-control" id="collectionPostalCode" name="collecPostalCode"
                        placeholder="Collection Postal Code">
                    <span class="text-danger" id='collecPCError'></span>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="deliveryPostalCode">Delivery Postal Code</label>
                    <input type="text" class="form-control" id="deliveryPostalCode" name="delPostalCode"
                        placeholder="Delivery Postal Code">
                    <span class="text-danger" id='delPCError'></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="collectionDate">Collection Date</label>
                    <input type="date" class="form-control" id="collectionDate" name="collecDate">
                    <span class="text-danger" id='collecDateError'></span>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="deliveryDate">Delivery Date</label>
                    <input type="date" class="form-control" id="deliveryDate" name="delDate">
                    <span class="text-danger" id='delDateError'></span>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="item">Select an Item</label>
                <select class="form-control" id="item" name="itemSelected">
                    <option>The Magic Tree</option>
                    <option>Winter Fairy</option>
                    <option>Wizards of Ice</option>
                    <option>Call of the Forest</option>
                    <option>The Enchanted Ones</option>
                    <option>A Spell Too Far.</option>
                </select>
                <span class="text-danger" id='itemSelError'></span>
            </div>
            <div class="row mb-3">
                <div class="col-md-8">
                    <label for="discountCode">Enter Discount Code</label>
                    <input type="text" class="form-control" id="discountCode" name="disCode"
                        placeholder="Discount Code">
                    <span class="text-danger" id='disCodeError'></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="reset" class="btn btn-secondary px-5" value="Clear Form">
                </div>
                <div class="col-md-6 mb-3">
                    <button type="submit" class="btn btn-primary px-5" id="submitForm">Apply</button>
                </div>
            </div>
        </form>
        <div id="errorMessages" class="text-danger"></div>
    </div>
    <script>
        $(document).ready(function() {
    $('#submitForm').click(function(e) {
        e.preventDefault();
        // Serialize the form data
        var formData = $('#myForm').serialize();

        // Send an AJAX request
        $.ajax({
            type: 'POST',
            url: $('#myForm').attr('action'),
            data: formData,
            dataType: 'json', 
            success: function(response) {
                if (response.success) {
                    
                    alert('Data has been successfully submitted.');
                    $('#myForm')[0].reset(); 
                    $('#errorMessages').html = '';
                } else {
                    var errors = response.errors;
                    var errorHtml = '<ul>';
                    $.each(errors, function(key, value) {
                        errorHtml += '<li>' + value + '</li>';
                    });
                    errorHtml += '</ul>';
                    $('#errorMessages').html(errorHtml); // Display error messages
                }
            },
            //If there any error occur in AJAX Response
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error: ' + error);
            }
        });
    });
});
    </script>

</body>

</html>
