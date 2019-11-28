function resetEmail() {

  var userEmail =$("#userEmail").val();
  //var pass=$("#userPassword").val();
  //alert(userStory);
  //alert(pass);
  //if (name!="" && pass!="") {
  if (userEmail!="") {
  //alert("Retriving Information");

    $.ajax({
      url: 'lib/php/includes/reset-request.inc.php',
      type: 'POST',
      async: false,
      data: {
        resetEmail: 1,
        userEmail:userStory
      },
      success: function(response){
        console.log(response);
        //alert(response);
        if (response="success") {
          alert ("Story Saved");
          //window.location.replace("https://lanterngrape.herokuapp.com/author.html");
        }
        else {
          alert ("Error, story not saved");
        }
      }
    });
  }

  //else
  //{
  //  alert("please fill in all details !");
  //}
  return false;
}
