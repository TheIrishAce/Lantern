function getInformation() {
  alert("Retriving Information");

  $.ajax({
    url: 'fetchCharacter.php',
    type: 'get',
    data: {},
    async: false,
    success: function(data){
      alert ("Information coming back: " + data);
    },
    cache: false
  })

  //document.getElementById("refrences").style.display = "none";
