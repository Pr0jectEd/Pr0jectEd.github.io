$(document).ready(function (){
    $(".translation-form").submit(function (event){
        console.log("working");
        event.preventDefault();
        $.ajax({
            type: $(this).attr("method"),//here i retrive the method set in the HTML form.
             url: $(this).attr("action"),//here i retrive  the action set in the HTML form.
             data:$(this).serialize(), //here i retrive and transform the content of the method(an object), and put it into a string.
             dataType: "json",// here i select the dataType, in this case JSON, but it can be (xml, html, tet, script,jsonp)
        }).done(function(data){//from here on i start to interact with the data that i have treated with PHP.
            //Here i can put a function to access the data and treat it as a common JS object.
            console.log(data);
            $(".example").html(data);

        });
    }); 
});