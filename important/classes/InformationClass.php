<?php

# Klasse für Informationen

class InformationClass {

  private $ID;
  private $title;
  private $description;
  private $author;
  private $published_at;
  private $updated_at;

  function __construct() {
    // code...
  }

  # Mehtode um alle Informationen aus der Datenbank zu bekommen
  public static function getAllInformation() {

    GLOBAL $db;

    $stmt = $db->prepare("SELECT * FROM information");
    $stmt->execute();

    return $stmt->fetchAll();

  }

  # Methode um eine Information zu erstellen und in der Datenbank zu speichern.
  public function createInformation($newTitle, $newDescription, $newAuthor, $newPublshedAt, $newUpdatedAt) {

    $this->title = $newTitle;
    $this->description = $newTitle;
    $this->author = $newAuthor;
    $this->published_at = $newPublshedAt;
    $this->updated_at = $newUpdatedAt;

    # Datenbankeintrag erstellen
    GLOBAL $db;

    $stmt = $db->prepare("INSERT INTO information (title, description, author) VALUES (:newTitle, :newDescription, :newAuthor)");
    $stmt->execute([
      "newTitle" => $newTitle,
      "newDescription" => $newDescription,
      "newAuthor" => $newAuthor
    ]);

    $this->ID = $db->lastInsertId();

    return "Information #{$this->ID} hinzugefügt";

  }

}
