<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <form action="{{ route('products.update', $products->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama">Nama Produk:</label><br>
        <input type="text" id="nama" name="nama" value="{{ $products->title }}"><br>
        <label for="deskripsi">Deskripsi Produk:</label><br>
        <input type="text" id="deskripsi" name="deskripsi" value="{{ $products->description }}"><br>
        <label for="harga">Harga Produk:</label><br>
        <input type="text" id="harga" name="harga" value="{{ $products->price }}"><br>
        <label for="stok">Stok Produk:</label><br>
        <input type="text" id="stok" name="stok" value="{{ $products->stock }}"><br><br>
        <input type="submit" value="Update">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
