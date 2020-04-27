<h1>Hello Admin</h1>
<p>Enquiry</p>
<ul>
    <li>
        Name: {{$request_data['name'] ?? 'NA'}}
    </li>
    <li>
        Email: {{$request_data['email'] ?? 'NA'}}
    </li>
    <li>
        Message: {{$request_data['message'] ?? 'NA'}}
    </li>
</ul>
