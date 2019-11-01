function insertStory() {
  var userStory =$("#writingArea").val();
  //var pass=$("#userPassword").val();
  //alert(userStory);
  //alert(pass);
  //if (name!="" && pass!="") {
  if (userStory!="") {
  //alert("Retriving Information");

    $.ajax({
      url: 'lib/php/interactStory.php',
      type: 'POST',
      async: false,
      data: {
        save: 1,
        storyType:userStory
      },
      success: function(response){
        console.log(response);
        //alert(response);
        if (response="success") {
          alert ("Story Saved");
          window.location.replace("https://lanterngrape.herokuapp.com/author.html");
        }
        else {
          alert ("Error, story not saved");
        }
      }
    });
  }

  else
  {
    alert("please fill in all details !");
  }
  return false;
}
