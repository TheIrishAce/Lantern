function existingStoryCharacterNLP()
{
  //alert("hello");
  var story = $("#writingArea").val();
  var storyInput = nlp(story);

  var fName="";
  var lName="";
  var combinedNames = [];

  var fNames = storyInput.people().firstNames().data();
  var lNames = storyInput.people().lastNames().data();
  var counter=0;
  fNames.forEach(function(nestedArray) {
    //console.log(counter);
    fName = fNames[counter].text;
    lName = lNames[counter].text;
    combinedNames[counter] = fName + lName;
    //console.log(combinedNames[counter]);
    counter++
  });
  //console.log(combinedNames);
  counter=1;
  combinedNames.forEach(function(nestedArray){
    $("#refrences").append("<div id='counter' class='container-fluid'></div>");
    $("#refrences").append("Character " + counter + " : " + combinedNames[counter-1]);
    counter++;
  });

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
