<form action="{{route('contests.search')}}" method="post">
    {{csrf_field()}}
    <input type="text" name="address">
    <input type="submit" value="Search">
</form>