$(document).ready(function (){
    $(".translation-form").submit(function (event){
        console.log("working");
        event.preventDefault();
        $.ajax({
            type: $(this).attr("method"),//here i retrive the method set in the HTML form.
             url: $(this).attr("action"),//here i retrive  the action set in the HTML form.
             data:$(this).serialize(), //here i retrive and transform the content of the method(an object), and put it into a string.
             dataType: "json",// here i select the dataType, in this case JSON, but it can be (xml, html, tet, script,jsonp)
        }).done(function(data) {
            if (data.success) {
                $("#example").html(`
                    <p>Original: ${data.original}</p>
                    <p>Translation: ${data.translation}</p>
                    <p>${data.message}</p>
                `);
            } else {
                $("#example").html(`
                    <p>Word not found: ${data.original}</p>
                    <p>${data.message}</p>
                `);
            }
        });
    }); 
});

