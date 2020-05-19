/* ****************************
*  form verification
******************************/
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

  /********************************
   *  display pic after upload
   *********************************/

function readURL(input,idimg)
{
    if (input.files && input.files[0])
    {
        var reader = new FileReader();
        
      reader.onload = function(e)
      {
          $(idimg).attr('src',e.target.result);
      }
        
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
  

$(document).on('change','.up', function(){
            var names = [];
            var length = $(this).get(0).files.length;
                for (var i = 0; i < $(this).get(0).files.length; ++i) {
                    names.push($(this).get(0).files[i].name);
                }
                // $("input[name=file]").val(names);
                if(length>2){
                  var fileName = names.join(', ');
                  $(this).closest('.form-group').find('.form-control').attr("value",length+" files selected");
                }
                else{
                    $(this).closest('.form-group').find('.form-control').attr("value",names);
                }});
/*************************
 * pagination datatable
 *************************/
$(document).ready( function ()
{
     $('#tabemp').DataTable({"language":{"paginate":{"next": ">","previous": "<"}}});
     $('#tabstagaire').DataTable({"language":{"paginate":{"next": ">","previous": "<"}}});

});
/****************************
 * payment doc div
 ****************************/
$(document).ready(function()
{
  $("#Nombre").change(function()
  {
    $("#docfile .col").remove();
    $("#docfile .w-100").remove();
    $("#docfile .blah").remove();
    for (let i = 0; i < this.value; i++)
    {
      $( "#docfile" ).append( '<div class="col">\
      <div class="input-group-btn">\
        <span class="fileUpload btn btn-success">\
            <span class="upl" id="upload">document num '+i+'</span>\
            <input type="file" class="upload up" id="up" onchange="readURL(this,\'#pic'+i+'\');" />\
          </span>\
      </div></div>');
    }

    $("#docfile").append('<div class="w-100"></div>')
    for (let i = 0; i < this.value; i++)
    {
    $('#docfile').append('<div class="col"> <img class="blah" id="pic'+i+'" src="http://127.0.0.1:8000/img/image.png" alt="your image" /> </div>')
    }
  });

});
/**
 * calcul rest 
 */
$("#Avance").keyup(function(){
  var resulta;
  resulta =parseFloat( $("#montements").val() ) - parseFloat( $("#Avance").val() );
  if(resulta >= 0)
    $("#Reste").val(parseFloat(resulta));
  else
    alert("oooooooops")
});
/**
 *  display picture
*/

function display(img)
{
  $("#imgdisplay").attr("src",img.src);
}

$('#formedit input').prop("disabled", true);
$('#edit').click(function()
{
   if(this.textContent == "Edit")
  {
    $('#formedit input').prop("disabled", false);
    $('#summernote').prop("disabled", false);
    this.textContent = "Anullé Edit";
    $("#button").show();
    $("#newdoc").show();
    $("#olddoc").hide();
  }
  else
  {
    $('#button').hide();
    $("#newdoc").hide();
    $("#olddoc").show();
    this.textContent = "Edit";
    $('#formedit input').prop("disabled", true);
    $('#summernote').prop("disabled", true);


  }
});
setTimeout(function()
{
  $('.alert').hide();
},10000);

jQuery(document).ready(function ($) {
  $(".buy").on("click", function (e) {
    e.preventDefault();

    $("body").toggleClass("expanded");
  });
});


$(document).ready(function() {
  $('#summernote').summernote({
    height: 200,   //set editable area's height
    codemirror: { // codemirror options
      theme: 'monokai'
    }});
});

/**
 * get extention of file
 * 
 */
$(document).ready( function ()
{
  $("#your_form").submit( function(submitEvent)
  {
      var filename = $("#file_input").val();
      var extension = filename.replace(/^.*\./, '');
      if (extension == filename)
      {
          extension = '';
      }
      else
      {
          extension = extension.toLowerCase();
      }

      if(extension == "xlsx" || extension == "xml")
      {
        event.preventDefault();
        event.stopPropagation();
        form.classList.add('was-validated');
      }
  });
});