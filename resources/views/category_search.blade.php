<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... -->
</head>
<body>

    @if (count($products) > 0)
        <table>
            <tr>
                <th>Name</th>
                <th>ID</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->id }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
            </tr>
            @endforeach
        </table>
    @else
        <p>No products found.</p>
    @endif
</body>
</html>
