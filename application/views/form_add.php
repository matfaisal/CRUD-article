<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <h1>Tambah Artikel</h1>

   <form method="POST">
      <div>
         <label>Title</label>
         <input type="text" name="title">
      </div>
      <div>
         <label>Url</label>
         <input type="text" name="url">
      </div>
      <div>
         <label>Content</label>
         <textarea name="content" cols="30" rows="10"></textarea>
      </div>
      <button type="submit">Simpan Artikel</button>
   </form>
</body>
</html>