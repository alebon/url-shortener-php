function submitForm() {
    var ajaxRequest = new XMLHttpRequest();

    ajaxRequest.onreadystatechange = function () {

        var successContent = document.getElementById('shortLink');
        var errorContent = document.getElementById('errorContainer');

        // Clear previous output
        successContent.innerHTML = '';
        errorContent.innerHTML = '';

        if (ajaxRequest.readyState == XMLHttpRequest.DONE) {
            if (ajaxRequest.status == 200) {
                console.log('Request was successful');

                var responseContent = JSON.parse(ajaxRequest.responseText);

                if (responseContent.link) {
                    successContent.innerHTML = responseContent.link;
                } else {
                    errorContent.innerHTML = responseContent.error.message;
                }
            }
            else {
                console.log('AJAX request failed with status ' + ajaxRequest.status);
            }
        }

    };

    ajaxRequest.open('POST', '/add');

    var hiddenTokenElement = document.getElementById('token_input');
    var urlElement = document.getElementById('url_input');

    var formData = new FormData();
    formData.append('token', hiddenTokenElement.value);
    formData.append('url', urlElement.value);

    ajaxRequest.send(formData);

    return false;
}