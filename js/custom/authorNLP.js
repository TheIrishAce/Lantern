function existingStoryCharacterNLP()
{
  //alert("hello");
  var story = $("#writingArea").val();

  var storyInput = nlp(story);

  var fName;
  var lName;
  var combinedNames = [];

  var fNames = storyInput.people().firstNames().data();
  var lNames = storyInput.people().lastNames().data();
  var counter=0;
  fNames.forEach(function(nestedArray) {
    //console.log(counter);
    fName = fNames[counter].text;
    lName = lNames[counter].text;
    combinedNames[counter] = fName+lName;
    //console.log(combinedNames[counter]);
    counter++
  });

  var jsonString = JSON.stringify(combinedNames);
  console.log(jsonString);

  $.ajax({
    url: 'lib/php/fetchCharacterNLP.php',
    type: 'POST',
    async: false,
    data: {
      keyPressed: 1,
      nameArrayData:jsonString
    },
    success: function(response){
      console.log(response);
      var obj = JSON.parse(response);
      //console.log(obj);
      //alert(response);
      if (obj.exit =="success") {
        //alert ("Story Saved");
        //window.location.replace("https://lanterngrape.herokuapp.com/author.html");
        var foundCharactersReturned = [obj.foundCharacters.CharacterName];
        console.log(obj);
        counter=1;
        foundCharactersReturned.forEach(function(nestedArray){
          $("#refrences").append("<div id='counter' class='container-fluid'></div>");
          $("#refrences").append("Character " + counter + " : " + foundCharactersReturned[counter-1]);
          counter++;
        });
      }
      else {
        alert ("Error, something went wrong");
      }
    }
  });

  /*
  //console.log(combinedNames);
  counter=1;
  combinedNames.forEach(function(nestedArray){
    $("#refrences").append("<div id='counter' class='container-fluid'></div>");
    $("#refrences").append("Character " + counter + " : " + combinedNames[counter-1]);
    counter++;
  });
*/
  /* DEBUG CODE IGNORE
  var testInput = nlp("Hello Earth and especially Ireland and London from Max Delaney");
  //First test
  console.log(testInput.data());

  //Tokenisation
  console.log(testInput.sentences().terms().out('array'));

  //POS + Entites
  console.log(testInput.sentences().terms().out('tags'));

  //Entites NER
  console.log(testInput.topics().data());

  //NER People
  console.log(testInput.topics().people().text());
  console.log(testInput.people().text());

  //NER Firstname & last name
  console.log(testInput.people().firstNames().text());
  console.log(testInput.people().lastNames().text());
  */
}
