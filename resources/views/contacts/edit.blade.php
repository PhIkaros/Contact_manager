
<form action="{{ route('contacts.update',$contact->id)}}" method="POST">
@csrf
@method('PUT')
<label for="name">Name</label>
<input type="text" name="name" value="{{$contact->name}}">

<label for="email">Email</label>
<input type="email" name="email" value="{{$contact->email}}">

<label for="phone">Phone</label>
<input type="text" name="phone" value="{{$contact->phone}}">

<button type="submit">Modify</button>
</form>
