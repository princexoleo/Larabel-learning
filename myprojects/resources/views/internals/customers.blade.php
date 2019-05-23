<h1>Customers Page</h1>

<ui>
    @foreach ($customers as $customer) <!-- blade syntax -->
     <li>{{ $customer }}</li>
    @endforeach
</ui>