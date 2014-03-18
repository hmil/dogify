<?php



if (isset($_POST['wow'])) {
  $text = $_POST['wow'];
} else if (isset($_GET['wow'])) {
  $text = $_GET['wow'];
}

if (isset($text)) {
  function getAdj () {
    $adjectives = array(
      "so", "very", "much", "many"
    );
    return $adjectives[array_rand($adjectives)];
  }

  function dogify ($str) {

    $words = preg_split("/( |')/", $str);

    $result = array();

    foreach ($words as $word) {
      if (!preg_match("/^([^0-9]{1,3}|this|there)$/i", $word)) {
        if (preg_match("/^.{4,}$/i", $word) && rand(0, 2) == 0) {
          $result[] = getAdj();
        }
        $result[] = $word;
      }
      if (rand(0, 20) == 0) {
        $result[] = "wow";
      }
    }

    return join(" ", $result);
  }
  echo dogify($text);
}
else {
  echo "you must specify a 'wow' post or get parameter";
}
?>
