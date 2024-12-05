

jQuery(document).ready(function($){
    console.warn(jQuery.fn.jquery);
    
    var searchContents = $('#keyword').val();
    var anyCatsChecked = false;
    var anyCatsChecked = checkForCatChecks();

    var anyTagsChecked = false;
    var anyTagsChecked = checkForTagChecks();

    if(typeof searchContents !== "undefined" && searchContents !=""){
        ajaxCall();
    }
    
    if(anyCatsChecked == true){
        
        ajaxCall();
    }

    if(anyTagsChecked == true){
        
        ajaxCall();
    }

function checkForCatChecks(){
  
    var ischecked=false;
    var checkboxes = $('.cat-list-item');
    checkboxes.each(function(i, obj) {
        if ($(this).prop("checked")) {
     
            ischecked = true;
        } 
    });
    return ischecked;
}

function checkForTagChecks(){
  
    var ischecked=false;
    var checkboxes = $('.tag-list-item');
    checkboxes.each(function(i, obj) {
        if ($(this).prop("checked")) {
         
            ischecked = true;
        } 
    });
    return ischecked;
}
     
$('#cat-additive').on('change', function() {
    ajaxCall();
});
$('#tag-additive').on('change', function() {
    ajaxCall();
});

$('.cat-list-item').on('change', function() {   
    ajaxCall();   
});

$('.tag-list-item').on('change', function() {
    /*if ($(this).prop("checked")) {
        $(this).addClass('active');
        
    }
    else{
        $(this).removeClass('active')
    }
console.log("inside"+$(this).val());*/

    ajaxCall();   
});

$('.search-box').on('keyup', function(){
    
    ajaxCall();
});

function getCategoryKeywords(){

    var divider = "+";
    if ($("#cat-additive").prop("checked")) {
        divider=","  
    }
    else{
        divider="+" 
    }
    

    var output = "";
    $('.cat-list-item:checkbox:checked').each(function(i, obj) {
        if(i==0){
            output = $(this).val();  
        }
        else{
            output = output + divider + $(this).val();
        }
        
        console.log(output);
    });
    
     return output;
}

function getTagKeywords(){

    var divider = "+";
    if ($("#tag-additive").prop("checked")) {
        divider=","  
    }
    else{
        divider="+" 
    }
    

    var output = "";
   $('.tag-list-item:checkbox:checked').each(function(i, obj) {
        if(i==0){
            output = $(this).val();  
        }
        else{
            output = output + divider + $(this).val();
        }
        
        console.log(output);
    });
    
     return output;
}


function ajaxCall(){

    var search = $('#keyword').val();
    var category = getCategoryKeywords();
    var tag = getTagKeywords();
    console.log("keyword:"+ keyword+ " category:"+category+" tag:"+tag);


    $.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      dataType: 'html',
      data: {
        action: 'filter_projects',
        category: category,
        s: search,
        tag: tag
       
      },
      success: function(res) {
        $('.project-tiles').html(res);
      }
    });

   //$("html, body").animate({ scrollTop: $("#main-header").offset.top }, "2000");
    $('html, body').animate({
        scrollTop: $("#main-header").offset().top -40
    }, 500);
  }
});