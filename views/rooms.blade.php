<ol>
    @foreach ($habitaciones as $habitacion)
        <li>
            <strong>Name:</strong> {{ $habitacion['name'] }}<br>
            <strong>Number:</strong> {{ $habitacion['number'] }}<br>
            <strong>Price:</strong> {{ $habitacion['price'] }}<br>
            <strong>Discount:</strong> {{ $habitacion['offerPrice'] }}
        </li>
    @endforeach
</ol>