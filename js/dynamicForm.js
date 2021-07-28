// dynamic form ingredient
$(document).ready(function() {
    $(".add-more-bahan").click(function(){ 
        var html = $(".copy-bahan").html();
        $(".list-bahan").append(html);
    });

    $("body").on("click",".remove-bahan",function(){ 
        $(this).parents(".input-bahan").remove();
    });
});

// dynamic form step
$(document).ready(function() {
    $(".add-more-cara").click(function(){ 
        var html = $(".copy-cara").html();
        $(".list-cara").append(html);
    });

    $("body").on("click",".remove-cara",function(){ 
        $(this).parents(".input-cara").remove();
    });
});