<!DOCTYPE html>
<html>
<head>
  <script>
    function displayWords() {
      var fileInput = document.getElementById("fileInput").files[0];
      var reader = new FileReader();

      reader.onload = function (e) {
        var contents = e.target.result;

        var wordsStartingWithA = [];
        var allConsonants = [];
        var regexA = /\b[aA]\w+\b/g;
        var regexConsonants = /\b[b-df-hj-np-tv-zB-DF-HJ-NP-TV-Z]\w+\b/g;

        var match = regexA.exec(contents);
        while (match) {
          wordsStartingWithA.push(match[0]);
          match = regexA.exec(contents);
        }

        match = regexConsonants.exec(contents);
        while (match) {
          allConsonants.push(match[0]);
          match = regexConsonants.exec (contents);
        }

        document.getElementById("wordsStartingWithA").innerHTML = "<h1>Words starting with 'a':</h1><br>" + 
          wordsStartingWithA.map((word, index) => `${index + 1}. ${word}`).join("<br>");
        document.getElementById("allConsonants").innerHTML = "<h1>Words with all consonants:</h1><br>" + 
          allConsonants.map((word, index) => `${index + 1}. ${word}`).join("<br>");
      };

      reader.readAsText(fileInput);
    }
  </script>
</head>
<body>
  <form>
    <input type="file" id="fileInput" onchange="displayWords()" accept=".txt,.pdf"/>
  </form>
  <div id="wordsStartingWithA"></div>
  <br>
  <div id="allConsonants"></div>
</body>
</html>
<?php
  if (isset($_FILES["fileInput"])) {
    $file = $_FILES["fileInput"]["tmp_name"];
    $contents = file_get_contents($file);
    echo $contents;
  }
?>