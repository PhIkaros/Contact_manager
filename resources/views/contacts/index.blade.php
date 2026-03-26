
<table border="1">

<thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>

@foreach($contacts as $contact)
<tr>
    <td>{{$contact->name}}</td>
    <td>{{$contact->email}}</td>
    <td>{{$contact->phone}}</td>
    <td>
<a href="{{ route('contacts.edit', $contact->id)}}">Modify</a>
<form action="{{route('contacts.destroy',$contact->id)}}" method="post">
    @csrf
    @method('DELETE')
<button type="submit">Delete</button>

</form>
</td>
</tr>
@endforeach
</tbody>
<a href="{{route('contacts.create')}}">Ajouter Personne</a>

</table>
