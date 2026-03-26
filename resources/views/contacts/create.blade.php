
<form action="{{ route('contacts.store')}}" method="POST">
@csrf
<label for="name">Name</label>
<input type="text" name="name">

<label for="email">Email</label>
<input type="email" name="email">

<label for="phone">Phone</label>
<input type="text" name="phone">

<button type="submit">Ajouter</button>
</form>
