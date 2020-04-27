<p>Hello {!! $request_data['name'] !!} </p>
<p> Thank you for contacting us. We'll get back to you soon.</p>
<p>
    <ul>
        <li>
            Email : {{$request_data['email'] ?? 'NA'}}
        </li>
    <li>
        Message: {!! $request_data['message'] !!}
    </li>
</ul>
</p>