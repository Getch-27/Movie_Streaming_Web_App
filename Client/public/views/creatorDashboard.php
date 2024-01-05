<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Content Creator Dashboard</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #1f1f1f;
      color: #fff;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 1em;
      text-align: center;
    }

    h1 {
      margin: 0;
    }

    .dashboard {
      max-width: 800px;
      margin: 20px auto;
      background-color: #333;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .upload-form {
      display: flex;
      flex-direction: column;
      margin-bottom: 20px;
    }

    .upload-form h2 {
      margin-bottom: 16px;
    }

    .upload-form label {
      margin-bottom: 8px;
    }

    .upload-form input,
    .upload-form textarea,
    .upload-form button {
      padding: 10px;
      margin-bottom: 16px;
    }

    .upload-form button {
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .upload-form button:hover {
      background-color: #45a049;
    }

    .manage-content {
      display: flex;
      flex-direction: column;
    }

    .content-item {
      border: 1px solid #555;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 4px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: background-color 0.3s ease;
    }

    .content-item:hover {
      background-color: #2c2c2c;
    }

    .content-item div {
      flex: 1;
    }

    .content-item .actions {
      display: flex;
    }

    .content-item button {
      padding: 8px;
      cursor: pointer;
      border: none;
      border-radius: 4px;
      margin-left: 8px;
      transition: background-color 0.3s ease;
    }

    .content-item button:hover {
      background-color: #4caf50;
    }
  </style>
</head>
<body>

  <header>
    <h1>Content Creator Dashboard</h1>
  </header>

  <div class="dashboard">
    <div class="upload-form">
      <h2>Upload New Content</h2>
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" required>

      <label for="description">Description:</label>
      <textarea id="description" name="description" required></textarea>

      <label for="genre">Genre:</label>
      <input type="text" id="genre" name="genre" required>

      <label for="year">Year of Production:</label>
      <input type="number" id="year" name="year" min="1800" max="9999" required>

      <label for="file">Upload File:</label>
      <input type="file" id="file" name="file" accept="video/*" required>

      <button type="submit">Upload</button>
    </div>

    <?php

$manageContent = array(
    array(
        'title' => 'Movie 1',
        'description' => 'A great movie',
        'genre' => 'Action',
        'year' => 2022,
    ),
    array(
        'title' => 'Movie 2',
        'description' => 'Another great movie',
        'genre' => 'Drama',
        'year' => 2021,
    ),
);
?>
<div class="manage-content">
    <h2>Manage Your Content</h2>

    <?php foreach ($manageContent as $contentItem) : ?>
        <div class="content-item">
            <div>
                <strong>Title:</strong> <?php echo $contentItem['title']; ?>
                <br>
                <strong>Description:</strong> <?php echo $contentItem['description']; ?>
                <br>
                <strong>Genre:</strong> <?php echo $contentItem['genre']; ?>
                <br>
                <strong>Year:</strong> <?php echo $contentItem['year']; ?>
            </div>
            <div class="actions">
                <button>Edit</button>
                <button>Delete</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>
  </div>

</body>
</html>
