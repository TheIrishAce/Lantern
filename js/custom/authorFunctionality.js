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

function fetchStory() {
  var userStory = "ABC";
  //var pass=$("#userPassword").val();
  //alert(userStory);
  //alert(pass);
  //if (name!="" && pass!="") {
  //if (userStory!="") {
  //alert("Retriving Information");

    $.ajax({
      url: 'lib/php/interactStory.php',
      type: 'POST',
      async: false,
      cache: false,
      data: {
        load: 1,
        storyType:userStory
      },
      success: function(response){
        //console.log(response);

        try {
          var obj = JSON.parse(response);
          console.log(obj);

          if (obj.exit =="success") {
            //alert(obj.exit);
            //var test = $("#writingArea").val();
            $("#writingArea").val('');
            $("#writingArea").val(obj.UserStory.UserStory);
            //alert(obj.UserStory.UserStory);
            //document.getElementById('writingArea').innerHTML = "";
            //document.getElementById('writingArea').innerHTML = obj.UserStory.UserStory;
            alert ("Story Loaded");
          }
          else
          {
            alert ("Error, story doesn't exist or couldn't be loaded.");
          }
        }
        catch (e) {
          alert("NOTICE: This account doesn't have a story to load");
        }
        finally {

        }
      }
    });
  //}

  //else
  //{
  //  alert("please fill in all details !");
  //}
  return false;
}
